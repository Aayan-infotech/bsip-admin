<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

use App\Models\Slider;
use App\Models\Notice;
use App\Models\Career;
use Carbon\Carbon;


class WebContentManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('sliders');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $sliders = Slider::query();
            return DataTables::of($sliders)
                ->addColumn('status', function ($slider) {
                    $checked = $slider->is_active ? 'checked' : '';
                    $statusText = $slider->is_active ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>' : '<span class="badge badge-success" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $slider->id . '" ' . $checked . '> ' . $statusText;
                })
                ->addColumn('action', function ($slider) {
                    return '<button class="btn btn-sm btn-primary edit-slider" data-id="' . $slider->id . '">
                                <i class="fas fa-edit"></i>
                            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'sequence' => 'required|numeric|unique:sliders,sequence',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1450,height=510',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (!isset($result['success']) || !$result['success'] || !isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'title' => $request->title,
            'sequence' => $request->sequence,
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Slider added successfully!']);
    }

    public function toggleStatus(Request $request)
    {
        $module = Slider::findOrFail($request->id);
        $module->is_active = $request->status;
        $module->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function toggleStatus1($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->is_active = !$slider->is_active;
        $slider->save();

        return response()->json(['message' => 'Slider status updated successfully!']);
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'sequence' => 'required|numeric|unique:sliders,sequence,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1450,height=510',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::delete('public/' . $slider->image);

            // Store new image
            $slider->image = $request->file('image')->store('sliders', 'public');
        }

        $slider->update([
            'title' => $request->title,
            'sequence' => $request->sequence,
            'image' => $slider->image ?? $slider->image, // Keep the current image if not updated
        ]);

        return response()->json(['message' => 'Slider updated successfully!']);
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return response()->json($slider);
    }

    // Display Notices Page
    public function noticesIndex()
    {
        return view('notices');
    }

    // Fetch Notices Data for Yajra Table
    public function getNoticesData(Request $request)
    {
        if ($request->ajax()) {
            // $sliders = Notice::where('archived_status', 'No')->get();
            $sliders = Notice::get();
            return DataTables::of($sliders)
                ->addColumn('status', function ($slider) {
                    $checked = $slider->status ? 'checked' : '';
                    $statusText = $slider->status
                        ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                        : '<span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1 = $slider->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $slider->archived_status === 'Yes'
                        ? '<span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                        : '<span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $slider->id . '" ' . $checked . '> ' . $statusText .
                        ' <input type="checkbox" class="toggle-archived-status" data-id="' . $slider->id . '" ' . $checked1 . '> ' . $statusText1;
                })
                ->addColumn('action', function ($slider) {
                    return '<button class="btn btn-sm btn-primary edit-notice" data-id="' . $slider->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->editColumn('expiry_date', function ($slider) {
                    return Carbon::parse($slider->expiry_date)->format('d-m-Y');
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    // Store Notice
    public function storeNotice(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'url' => 'nullable|url',
            'expiry_date' => 'required|date|after:today',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (!isset($result['success']) || !$result['success'] || !isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }


        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('notices', 'public');
        }

        Notice::create([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'pdf' => $pdfPath,
            'url' => $request->url,
            'expiry_date' => $request->expiry_date,
            'archived_status' => 'No',
        ]);

        return redirect()->back()->with('success', 'Notice added successfully.');
    }

    // Edit Notice
    public function editNotice($id)
    {
        $notice = Notice::findOrFail($id);
        return response()->json($notice);
    }

    // Update Notice
    public function updateNotice(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'url' => 'nullable|url',
            'expiry_date' => 'required|date|after:today',
        ]);

        $notice = Notice::findOrFail($id);

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('notices', 'public');
            $notice->pdf = $pdfPath;
        }

        $notice->update([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'url' => $request->url,
            'expiry_date' => $request->expiry_date,
        ]);

        return redirect()->back()->with('success', 'Notice updated successfully.');
    }

    // Toggle Archived Status
    public function toggleNoticeStatus(Request $request)
    {

        $module = Notice::findOrFail($request->id);
        $module->status = $request->status;
        $module->save();
    }
    public function archiveNoticeStatus($id)
    {
        $notice = Notice::findOrFail($id);
        $notice->archived_status = $notice->archived_status === 'Yes' ? 'No' : 'Yes';
        $notice->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function toggleArchivedStatus(Request $request)
    {
        $notice = Notice::findOrFail($request->id);
        $notice->archived_status = $notice->archived_status === 'Yes' ? 'No' : 'Yes';
        $notice->save();

        return response()->json(['success' => 'Archived status updated successfully.']);
    }

    // Automatically Archive Expired Notices
    public function archiveExpiredNotices()
    {
        $expiredNotices = Notice::where('expiry_date', '<', Carbon::now())->where('archived_status', 'No')->get();

        foreach ($expiredNotices as $notice) {
            $notice->archived_status = 'Yes';
            $notice->save();
        }

        return response()->json(['success' => 'Expired notices archived successfully.']);
    }
    // Display Careers Page
    public function careersIndex()
    {
        return view('careers');
    }

    // Fetch Careers Data for DataTable
    public function getCareersData(Request $request)
    {
        if ($request->ajax()) {
            // $sliders = Notice::where('archived_status', 'No')->get();
            $sliders = Career::get();
            return DataTables::of($sliders)
                ->addColumn('status', function ($slider) {
                    $checked = $slider->status ? 'checked' : '';
                    $statusText = $slider->status
                        ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                        : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1 = $slider->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $slider->archived_status === 'Yes'
                        ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                        : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $slider->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                        '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $slider->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($slider) {
                    return '<button class="btn btn-sm btn-primary edit-career" data-id="' . $slider->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->editColumn('expiry_date', function ($slider) {
                    return Carbon::parse($slider->expiry_date)->format('d-m-Y');
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

      
    }

    // Store Career
    public function storeCareer(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'url' => 'nullable|url',
            'interview_date' => 'required|date',
            'last_date' => 'required|date',
            'hour' => 'required|integer|min:1|max:12',
            'minute' => 'required|integer|min:0|max:59',
            'ampm' => 'required|in:AM,PM',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (!isset($result['success']) || !$result['success'] || !isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('careers', 'public');
        }

        Career::create([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'pdf' => $pdfPath,
            'url' => $request->url,
            'interview_date' => $request->interview_date,
            'last_date' => $request->last_date,
            'interview_time' => $request->hour . ':' . $request->minute . ' ' . $request->ampm,
            'status' => 1,
            'archived_status' => 'No',
        ]);

        return response()->json(['message' => 'Career added successfully.']);
    }

    // Edit Career
    public function editCareer($id)
    {
        $career = Career::findOrFail($id);
        $timeParts = explode(':', $career->interview_time);
        $hour = $timeParts[0];
        $minuteAmpm = explode(' ', $timeParts[1]);
        $minute = $minuteAmpm[0];
        $ampm = $minuteAmpm[1];

        return response()->json([
            'id' => $career->id,
            'title' => $career->title,
            'hin_title' => $career->hin_title,
            'url' => $career->url,
            'interview_date' => $career->interview_date,
            'last_date' => $career->last_date,
            'hour' => $hour,
            'minute' => $minute,
            'ampm' => $ampm,
        ]);
    }

    // Update Career
    public function updateCareer(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'url' => 'nullable|url',
            'interview_date' => 'required|date',
            'last_date' => 'required|date',
            'hour' => 'required|integer|min:1|max:12',
            'minute' => 'required|integer|min:0|max:59',
            'ampm' => 'required|in:AM,PM',
        ]);

        $career = Career::findOrFail($id);

        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('careers', 'public');
            $career->pdf = $pdfPath;
        }

        $career->update([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'url' => $request->url,
            'interview_date' => $request->interview_date,
            'last_date' => $request->last_date,
            'interview_time' => $request->hour . ':' . $request->minute . ' ' . $request->ampm,
        ]);

        return response()->json(['message' => 'Career updated successfully.']);
    }

    // Toggle Career Status
    public function toggleCareerStatus(Request $request)
    {
        $career = Career::findOrFail($request->id);
        $career->status = $request->status;
        $career->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    // Toggle Archived Status
    public function toggleCareerArchivedStatus(Request $request)
    {
        $career = Career::findOrFail($request->id);
        $career->archived_status = $request->status === 'Yes' ? 'Yes' : 'No';
        $career->save();

        return response()->json(['success' => 'Archived status updated successfully.']);
    }
}
