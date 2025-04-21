<?php
namespace App\Http\Controllers;

use App\Models\Annual_Report;
use App\Models\MonthlyReport;
use App\Models\Institute_catalogue;
use App\Traits\UploadFilesTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PublicationManagementController extends Controller
{
    use UploadFilesTraits;

    public function annualReport()
    {
        return view('publication_management.annualReport');
    }

    public function getAnnualReport(Request $request)
    {
        if ($request->ajax()) {
            $reports = Annual_Report::all();
            return DataTables::of($reports)
                ->addColumn('status', function ($report) {
                    $checked    = $report->status ? 'checked' : '';
                    $statusText = $report->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $report->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $report->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $report->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $report->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($report) {
                    return '<button class="btn btn-sm btn-primary edit-report" data-id="' . $report->id . '">
                <i class="fas fa-edit"></i>
            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeAnnualReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_name'          => 'required|string|max:255',
            'report_hin_name'      => 'required|string|max:255',
            'report_file'          => 'required|file|mimes:pdf|max:2048',
            'report_file_hin'      => 'required|file|mimes:pdf|max:2048',
            'more_info'            => 'nullable|string|max:255',
            'more_info_hin'        => 'nullable|string|max:255',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);

        if ($request->hasFile('report_file')) {
            $validatedData['report_file'] = $this->uploadFile($request->file('report_file'), 'annual_reports/english');
        }
        if ($request->hasFile('report_file_hin')) {
            $validatedData['report_file_hin'] = $this->uploadFile($request->file('report_file_hin'), 'annual_reports/hindi');
        }

        Annual_Report::create($validatedData);
        return response()->json(['message' => 'Annual report added successfully!']);

    }

    public function toggleAnnualReportStatus(Request $request)
    {
        $report = Annual_Report::find($request->id);
        if ($report) {
            $report->status = $request->status;
            $report->save();
            return response()->json(['success' => 'Status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }
    public function toggleAnnualReportArchivedStatus(Request $request)
    {
        $report = Annual_Report::find($request->id);
        if ($report) {
            $report->archived_status = $report->archived_status === 'Yes' ? 'No' : 'Yes';
            $report->save();
            return response()->json(['success' => 'Archived status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }
    public function editAnnualReport(Request $request)
    {
        $report = Annual_Report::find($request->id);
        if ($report) {
            return response()->json($report);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }

    public function updateAnnualReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_name'     => 'required|string|max:255',
            'report_hin_name' => 'required|string|max:255',
            'report_file'     => 'nullable|file|mimes:pdf|max:2048',
            'report_file_hin' => 'nullable|file|mimes:pdf|max:2048',
            'more_info'       => 'nullable|string|max:255',
            'more_info_hin'   => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $report = Annual_Report::find($request->id);
        if ($report) {
            if ($request->hasFile('report_file')) {
                // Delete the old file if it exists
                if ($report->report_file) {
                    $this->deleteFile($report->report_file);
                }
                $validatedData['report_file'] = $this->uploadFile($request->file('report_file'), 'annual_reports/english');
            }
            if ($request->hasFile('report_file_hin')) {
                // Delete the old file if it exists
                if ($report->report_file_hin) {
                    $this->deleteFile($report->report_file_hin);
                }
                $validatedData['report_file_hin'] = $this->uploadFile($request->file('report_file_hin'), 'annual_reports/hindi');
            }
            $report->update($validatedData);
            return response()->json(['message' => 'Annual report updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }

    // ==========================
    // ==========================
    //  Monthly Report
    // ==========================
    // ==========================
    public function monthlyReport()
    {
        return view('publication_management.monthlyReport');
    }

    public function getMonthlyReport(Request $request)
    {
        if ($request->ajax()) {
            $reports = MonthlyReport::all();
            return DataTables::of($reports)
                ->addColumn('status', function ($report) {

                    $checked    = $report->status ? 'checked' : '';
                    $statusText = $report->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $report->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $report->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $report->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $report->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';

                })
                ->addColumn('action', function ($report) {
                    return '<button class="btn btn-sm btn-primary edit-report" data-id="' . $report->id . '">
                <i class="fas fa-edit"></i>
            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

    }

    public function storeMonthlyReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_name'          => 'required|string|max:255',
            'report_hin_name'      => 'required|string|max:255',
            'report_file'          => 'required|file|mimes:pdf|max:2048',
            'report_file_hin'      => 'required|file|mimes:pdf|max:2048',
            'report_month'         => 'required|string|max:255',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);

        if ($request->hasFile('report_file')) {
            $validatedData['report_file'] = $this->uploadFile($request->file('report_file'), 'monthly_reports/english');
        }
        if ($request->hasFile('report_file_hin')) {
            $validatedData['report_file_hin'] = $this->uploadFile($request->file('report_file_hin'), 'monthly_reports/hindi');
        }

        MonthlyReport::create($validatedData);
        return response()->json(['message' => 'Monthly report added successfully!']);

    }
    public function toggleMonthlyReportStatus(Request $request)
    {
        $report = MonthlyReport::find($request->id);
        if ($report) {
            $report->status = $request->status;
            $report->save();
            return response()->json(['success' => 'Status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }
    public function editMonthlyReport(Request $request)
    {
        $report = MonthlyReport::find($request->id);
        if ($report) {
            return response()->json($report);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }

    public function updateMonthlyReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'report_name'     => 'required|string|max:255',
            'report_hin_name' => 'required|string|max:255',
            'report_file'     => 'nullable|file|mimes:pdf|max:2048',
            'report_file_hin' => 'nullable|file|mimes:pdf|max:2048',
            'report_month'    => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $report = MonthlyReport::find($request->id);
        if ($report) {
            if ($request->hasFile('report_file')) {
                // Delete the old file if it exists
                if ($report->report_file) {
                    $this->deleteFile($report->report_file);
                }
                $validatedData['report_file'] = $this->uploadFile($request->file('report_file'), 'monthly_reports/english');
            }
            if ($request->hasFile('report_file_hin')) {
                // Delete the old file if it exists
                if ($report->report_file_hin) {
                    $this->deleteFile($report->report_file_hin);
                }
                $validatedData['report_file_hin'] = $this->uploadFile($request->file('report_file_hin'), 'monthly_reports/hindi');
            }
            $report->update($validatedData);
            return response()->json(['message' => 'Monthly report updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }

    public function toggleMonthlyReportArchivedStatus(Request $request)
    {
        $report = MonthlyReport::find($request->id);
        if ($report) {
            $report->archived_status = $report->archived_status === 'Yes' ? 'No' : 'Yes';
            $report->save();
            return response()->json(['success' => 'Archived status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }


    // ==========================
    // ==========================
    // Insititute Catalogue
    // ==========================
    // ==========================

    public function instituteCatalogue()
    {
        return view('publication_management.instituteCatalogue');
    }

    public function getInstituteCatalogue(Request $request)
    {
        if ($request->ajax()) {
            $reports = Institute_Catalogue::all();
            return DataTables::of($reports)
                ->addColumn('status', function ($report) {

                    $checked    = $report->status ? 'checked' : '';
                    $statusText = $report->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $report->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $report->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $report->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $report->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($report) {
                    return '<button class="btn btn-sm btn-primary edit-report" data-id="' . $report->id . '">
                <i class="fas fa-edit"></i>
            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        return response()->json(['error' => 'Catalogue not found.'], 404);
    }


    public function storeInstituteCatalogue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'catalogue_name'     => 'required|string|max:255',
            'catalogue_hin_name' => 'required|string|max:255',
            'writer_name'        => 'nullable|string|max:255',
            'writer_hin_name'    => 'nullable|string|max:255',
            'cover_image'        => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'cover_image_hin'    => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'catalogue_file'     => 'required|file|mimes:pdf|max:2048',
            'catalogue_file_hin' => 'required|file|mimes:pdf|max:2048',
            'more_info'          => 'nullable|string|max:255',
            'more_info_hin'      => 'nullable|string|max:255',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);


        if ($request->hasFile('catalogue_file')) {
            $validatedData['catalogue_file'] = $this->uploadFile($request->file('catalogue_file'), 'institute_catalogue/english');
        }
        if ($request->hasFile('catalogue_file_hin')) {
            $validatedData['catalogue_file_hin'] = $this->uploadFile($request->file('catalogue_file_hin'), 'institute_catalogue/hindi');
        }
        if ($request->hasFile('cover_image')) {
            $validatedData['cover_image'] = $this->uploadFile($request->file('cover_image'), 'institute_catalogue/english');
        }
        if ($request->hasFile('cover_image_hin')) {
            $validatedData['cover_image_hin'] = $this->uploadFile($request->file('cover_image_hin'), 'institute_catalogue/hindi');
        }

        Institute_Catalogue::create($validatedData);
        return response()->json(['message' => 'Institute catalogue added successfully!']);

    }


    public function toggleInstituteCatalogueStatus(Request $request)
    {
        $report = Institute_Catalogue::find($request->id);
        if ($report) {
            $report->status = $request->status;
            $report->save();
            return response()->json(['success' => 'Status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }
    public function editInstituteCatalogue(Request $request)
    {
        $report = Institute_Catalogue::find($request->id);
        if ($report) {
            return response()->json($report);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }


    public function updateInstituteCatalogue(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'catalogue_name'     => 'required|string|max:255',
            'catalogue_hin_name' => 'required|string|max:255',
            'writer_name'        => 'nullable|string|max:255',
            'writer_hin_name'    => 'nullable|string|max:255',
            'cover_image'        => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'cover_image_hin'    => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'catalogue_file'     => 'nullable|file|mimes:pdf|max:2048',
            'catalogue_file_hin' => 'nullable|file|mimes:pdf|max:2048',
            'more_info'          => 'nullable|string|max:255',
            'more_info_hin'      => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $report = Institute_Catalogue::find($request->id);
        if($report){
            if ($request->hasFile('catalogue_file')) {
                // Delete the old file if it exists
                if ($report->catalogue_file) {
                    $this->deleteFile($report->catalogue_file);
                }
                $validatedData['catalogue_file'] = $this->uploadFile($request->file('catalogue_file'), 'institute_catalogue/english');
            }
            if ($request->hasFile('catalogue_file_hin')) {
                // Delete the old file if it exists
                if ($report->catalogue_file_hin) {
                    $this->deleteFile($report->catalogue_file_hin);
                }
                $validatedData['catalogue_file_hin'] = $this->uploadFile($request->file('catalogue_file_hin'), 'institute_catalogue/hindi');
            }
            if ($request->hasFile('cover_image')) {
                // Delete the old file if it exists
                if ($report->cover_image) {
                    $this->deleteFile($report->cover_image);
                }
                $validatedData['cover_image'] = $this->uploadFile($request->file('cover_image'), 'institute_catalogue/english');
            }
            if ($request->hasFile('cover_image_hin')) {
                // Delete the old file if it exists
                if ($report->cover_image_hin) {
                    $this->deleteFile($report->cover_image_hin);
                }
                $validatedData['cover_image_hin'] = $this->uploadFile($request->file('cover_image_hin'), 'institute_catalogue/hindi');
            }
            $report->update($validatedData);
            return response()->json(['message' => 'Institute catalogue updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }

    public function toggleInstituteCatalogueArchivedStatus(Request $request)
    {
        $report = Institute_Catalogue::find($request->id);
        if ($report) {
            $report->archived_status = $report->archived_status === 'Yes' ? 'No' : 'Yes';
            $report->save();
            return response()->json(['success' => 'Archived status updated successfully!']);
        }
        return response()->json(['errors' => 'Report not found!'], 404);
    }



}

