<?php
namespace App\Http\Controllers;

use App\Models\News;
use App\Models\OutreachProgram;
use App\Models\RajBhashaPortal;
use App\Models\GeoHeritage;
use App\Traits\UploadFilesTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class FooterManagementController extends Controller
{
    use UploadFilesTraits;

    public function manageNews()
    {
        // Logic to manage news
        return view('footer_management.news');
    }

    public function getNews(Request $request)
    {
        if ($request->ajax()) {
            $news = News::get();
            return DataTables::of($news)
            // ->addColumn('image', function ($news) {
            //     $images    = $news->image;
            //     $imageHtml = '';
            //     if ($images) {
            //         foreach ($images as $image) {
            //             $imageHtml .= '<a href="' . $image . '" target="_blank"><i class="fas fa-image m-1 text-primary"></i></i></a>';
            //         }
            //     } else {
            //         $imageHtml = '-';
            //     }
            //     return $imageHtml;
            // })
                ->addColumn('status', function ($news) {
                    $checked    = $news->status ? 'checked' : '';
                    $statusText = $news->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    $checked1    = $news->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $news->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $news->id . '" ' . $checked . '> ' . $statusText . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $news->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
                })
                ->addColumn('action', function ($news) {
                    return '<button class="btn btn-sm btn-primary edit-news" data-id="' . $news->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
    }

    public function storeNews(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'                => 'required|string|max:255',
            'title_hin'            => 'required|string|max:255',
            'published_at'         => 'required|date',
            'description'          => 'nullable|string',
            'description_hin'      => 'nullable|string',
            'image'                => 'nullable|array',
            'image.*'              => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'             => 'nullable|mimes:pdf|max:61440',
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

        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $file) {
                $path     = $this->uploadFile($file, 'news_images');
                $images[] = $path;
            }
            $validatedData['image'] = json_encode($images);
        }
        if ($request->hasFile('pdf_file')) {
            $file                  = $request->file('pdf_file');
            $path                  = $this->uploadFile($file, 'news_files');
            $validatedData['file'] = $path;
        }

        News::create($validatedData);
        return response()->json(['success' => 'News created successfully!'], 201);
    }

    public function toggleNewsStatus(Request $request)
    {
        $news = News::findOrFail($request->id);
        if ($news) {
            $news->status = $request->status;
            $news->save();
            return response()->json(['success' => 'News status updated successfully!']);
        }
        return response()->json(['error' => 'News not found!'], 404);
    }

    public function toggleNewsArchivedStatus(Request $request)
    {
        $news = News::findOrFail($request->id);
        if ($news) {

            $news->archived_status = $request->status == 1 ? 'Yes' : 'No';
            $news->save();
            return response()->json(['success' => 'News archived status updated successfully!']);
        }
        return response()->json(['error' => 'News not found!'], 404);
    }

    public function editNews($id)
    {
        $news = News::findOrFail($id);
        if ($news) {
            return response()->json($news);
        }
        return response()->json(['errors' => 'News not found!'], 404);
    }

    public function updateNews(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'            => 'required|string|max:255',
            'title_hin'        => 'required|string|max:255',
            'published_at'     => 'required|date',
            'description'      => 'nullable|string',
            'description_hin'  => 'nullable|string',
            'image'            => 'nullable|array',
            'image.*'          => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'         => 'nullable|mimes:pdf|max:61440',
            'removed_images'   => 'nullable|array',
            'removed_images.*' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = News::findOrFail($id);
        if (! $data) {
            return response()->json(['errors' => 'News not found!'], 404);
        }

        $validatedData = $validator->validated();

        if ($request->has('removed_images')) {
            $removedImages = $request->removed_images;
            if ($removedImages) {
                foreach ($removedImages as $image) {
                    $this->deleteFile($image);
                }
                $existingImages = $data->image;
                if ($existingImages) {
                    $existingImages         = array_diff($existingImages, $removedImages);
                    $validatedData['image'] = json_encode(array_values($existingImages));
                }
            }
        }

        if ($request->hasFile('image')) {
            $images = $data->image ?? [];
            foreach ($request->file('image') as $file) {
                $path     = $this->uploadFile($file, 'news_images');
                $images[] = $path;
            }
            $validatedData['image'] = json_encode(array_values($images));
        }
        if ($request->hasFile('pdf_file')) {

            $existingFile = $data->file;
            if ($existingFile) {
                $this->deleteFile($existingFile);
            }

            $file                  = $request->file('pdf_file');
            $path                  = $this->uploadFile($file, 'news_files');
            $validatedData['file'] = $path;
        }

        unset($validatedData['removed_images']);

        $data->fill($validatedData);
        $data->save();
        return response()->json(['success' => true, 'message' => "News updated successfully!", 'data' => $data]);
    }

    // ==============================================
    // OutReach Program
    // ==============================================

    public function outreachProgram()
    {
        return view('footer_management.outreach_program');
    }

    public function getOutreachProgram(Request $request)
    {
        if ($request->ajax()) {
            $outreachPrograms = OutreachProgram::get();
            return DataTables::of($outreachPrograms)
                ->addColumn('status', function ($outreachPrograms) {
                    $checked    = $outreachPrograms->status ? 'checked' : '';
                    $statusText = $outreachPrograms->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

                    $checked1    = $outreachPrograms->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $outreachPrograms->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $outreachPrograms->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $outreachPrograms->id . '" ' . $checked . '> ' . $statusText . '</div>';

                })
                ->addColumn('action', function ($outreachPrograms) {
                    return '<button class="btn btn-sm btn-primary edit-outreach-program" data-id="' . $outreachPrograms->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeOutreachProgram(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'                => 'required|string|max:255',
            'title_hin'            => 'required|string|max:255',
            'date'                 => 'required|date',
            'description'          => 'nullable|string',
            'description_hin'      => 'nullable|string',
            'images'               => 'nullable|array',
            'images.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'             => 'nullable|mimes:pdf|max:61440',
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
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'outreach_program_images');
                $images[] = $path;
            }
            $validatedData['images'] = json_encode($images);
        }
        if ($request->hasFile('pdf_file')) {
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'outreach_program_files');
            $validatedData['pdf_file'] = $path;
        }

        OutreachProgram::create($validatedData);
        return response()->json(['success' => 'Outreach Program created successfully!'], 201);
    }

    public function toggleOutreachProgramStatus(Request $request)
    {
        $outreachProgram = OutreachProgram::findOrFail($request->id);
        if ($outreachProgram) {
            $outreachProgram->status = $request->status;
            $outreachProgram->save();
            return response()->json(['success' => 'Outreach Program status updated successfully!']);
        }
        return response()->json(['error' => 'Outreach Program not found!'], 404);
    }

    public function toggleOutreachProgramArchivedStatus(Request $request)
    {
        $outreachProgram = OutreachProgram::findOrFail($request->id);
        if ($outreachProgram) {
            $outreachProgram->archived_status = $request->status == 1 ? 'Yes' : 'No';
            $outreachProgram->save();
            return response()->json(['success' => 'Outreach Program archived status updated successfully!']);
        }
        return response()->json(['error' => 'Outreach Program not found!'], 404);
    }

    public function editOutreachProgram($id)
    {
        $outreachProgram = OutreachProgram::findOrFail($id);
        if ($outreachProgram) {
            return response()->json($outreachProgram);
        }
        return response()->json(['errors' => 'Outreach Program not found!'], 404);
    }

    public function updateOutreachProgram(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'            => 'required|string|max:255',
            'title_hin'        => 'required|string|max:255',
            'date'             => 'required|date',
            'description'      => 'nullable|string',
            'description_hin'  => 'nullable|string',
            'images'           => 'nullable|array',
            'images.*'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'         => 'nullable|mimes:pdf|max:61440',
            'removed_images'   => 'nullable|array',
            'removed_images.*' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = OutreachProgram::findOrFail($id);

        if (! $data) {
            return response()->json(['errors' => 'Outreach Program not found!'], 404);
        }
        $validatedData = $validator->validated();
        // dd($validatedData);
        $existingImages = $data->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'outreach_program_images');
                $images[] = $path;
            }
            $existingImages = array_merge($existingImages, $images);
        }
        if ($request->has('removed_images')) {
            $removedImages = $request->removed_images;
            if ($removedImages) {
                foreach ($removedImages as $image) {
                    $this->deleteFile($image);
                }
                if ($existingImages) {
                    $existingImages = array_diff($existingImages, $removedImages);
                }
            }
        }

        $validatedData['images'] = json_encode(array_values($existingImages));

        if ($request->hasFile('pdf_file')) {
            $existingFile = $data->pdf_file;
            if ($existingFile) {
                $this->deleteFile($existingFile);
            }
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'outreach_program_files');
            $validatedData['pdf_file'] = $path;
        }
        unset($validatedData['removed_images']);
        $data->fill($validatedData);
        $data->save();
        return response()->json(['success' => true, 'message' => "Outreach Program updated successfully!", 'data' => $data]);

    }

    // ==============================================
    // OutReach Program End
    // ==============================================

    // ==============================================
    // RajBhasha Portal Code Started
    // ==============================================

    public function bsipRajbhashaPortal()
    {
        return view('footer_management.raj_bhasha_portal');
    }

    public function getBsipRajbhashaPortal(Request $request)
    {
        if ($request->ajax()) {
            $rajBhashaPortal = RajBhashaPortal::get();
            return DataTables::of($rajBhashaPortal)
                ->addColumn('status', function ($rajBhashaPortal) {
                    $checked    = $rajBhashaPortal->status ? 'checked' : '';
                    $statusText = $rajBhashaPortal->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    $checked1    = $rajBhashaPortal->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $rajBhashaPortal->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $rajBhashaPortal->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $rajBhashaPortal->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($rajBhashaPortal) {
                    return '<button class="btn btn-sm btn-primary edit-bsip-rajbhasha-portal" data-id="' . $rajBhashaPortal->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function storeBsipRajbhashaPortal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'                => 'required|string|max:255',
            'title_hin'            => 'required|string|max:255',
            'description'          => 'nullable|string',
            'description_hin'      => 'nullable|string',
            'images'               => 'nullable|array',
            'images.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'             => 'nullable|mimes:pdf|max:61440',
            'date'                 => 'required|date',
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
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'raj_bhasha_portal_images');
                $images[] = $path;
            }
            $validatedData['images'] = json_encode($images);
        }
        if ($request->hasFile('pdf_file')) {
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'raj_bhasha_portal_files');
            $validatedData['pdf_file'] = $path;
        }
        RajBhashaPortal::create($validatedData);
        return response()->json(['success' => 'Raj Bhasha Portal created successfully!'], 201);
    }

    public function toggleBsipRajbhashaPortalStatus(Request $request)
    {
        $rajBhashaPortal = RajBhashaPortal::findOrFail($request->id);
        if ($rajBhashaPortal) {
            $rajBhashaPortal->status = $request->status;
            $rajBhashaPortal->save();
            return response()->json(['success' => 'Raj Bhasha Portal status updated successfully!']);
        }
        return response()->json(['error' => 'Raj Bhasha Portal not found!'], 404);
    }
    public function toggleBsipRajbhashaPortalArchivedStatus(Request $request)
    {
        $rajBhashaPortal = RajBhashaPortal::findOrFail($request->id);
        if ($rajBhashaPortal) {
            $rajBhashaPortal->archived_status = $request->status == 1 ? 'Yes' : 'No';
            $rajBhashaPortal->save();
            return response()->json(['success' => 'Raj Bhasha Portal archived status updated successfully!']);
        }
        return response()->json(['error' => 'Raj Bhasha Portal not found!'], 404);
    }
    public function editBsipRajbhashaPortal($id)
    {
        $rajBhashaPortal = RajBhashaPortal::findOrFail($id);
        if ($rajBhashaPortal) {
            return response()->json($rajBhashaPortal);
        }
        return response()->json(['errors' => 'Raj Bhasha Portal not found!'], 404);
    }

    public function updateBsipRajbhashaPortal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'            => 'required|string|max:255',
            'title_hin'        => 'required|string|max:255',
            'description'      => 'nullable|string',
            'description_hin'  => 'nullable|string',
            'images'           => 'nullable|array',
            'images.*'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'         => 'nullable|mimes:pdf|max:61440',
            'date'             => 'required|date',
            'removed_images'   => 'nullable|array',
            'removed_images.*' => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = RajBhashaPortal::findOrFail($request->id);
        if (! $data) {
            return response()->json(['errors' => 'Raj Bhasha Portal not found!'], 404);
        }

        $validatedData  = $validator->validated();
        $existingImages = $data->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'raj_bhasha_portal_images');
                $images[] = $path;
            }
            $existingImages = array_merge($existingImages, $images);
        }
        if ($request->has('removed_images')) {
            $removedImages = $request->removed_images;
            if ($removedImages) {
                foreach ($removedImages as $image) {
                    $this->deleteFile($image);
                }
                if ($existingImages) {
                    $existingImages = array_diff($existingImages, $removedImages);
                }
            }
        }
        $validatedData['images'] = json_encode(array_values($existingImages));
        if ($request->hasFile('pdf_file')) {
            $existingFile = $data->pdf_file;
            if ($existingFile) {
                $this->deleteFile($existingFile);
            }
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'raj_bhasha_portal_files');
            $validatedData['pdf_file'] = $path;
        }
        unset($validatedData['removed_images']);
        $data->fill($validatedData);
        $data->save();
        return response()->json(['success' => true, 'message' => "Raj Bhasha Portal updated successfully!", 'data' => $data]);
    }

    // ==============================================
    // RajBhasha Portal Code Ended
    // ==============================================

    // ==============================================
    // Geo Hertiage Code Started
    // ==============================================


    public function bsipGeoHeritage()
    {
        return view('footer_management.geo_heritage');
    }

    public function getBsipGeoHeritage(Request $request){
        if ($request->ajax()) {
            $geoHeritage = GeoHeritage::get();
            return DataTables::of($geoHeritage)
                ->addColumn('status', function ($geoHeritage) {
                    $checked    = $geoHeritage->status ? 'checked' : '';
                    $statusText = $geoHeritage->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    $checked1    = $geoHeritage->archived_status === 'Yes' ? 'checked' : '';
                    $statusText1 = $geoHeritage->archived_status === 'Yes'
                    ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
                    : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $geoHeritage->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>' .
                    '<br><div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $geoHeritage->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($geoHeritage) {
                    return '<button class="btn btn-sm btn-primary edit-bsip-geo-heritage" data-id="' . $geoHeritage->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }


    public function storeBsipGeoHeritage(Request $request){
        $validator = Validator::make($request->all(), [
            'title'                => 'required|string|max:255',
            'title_hin'            => 'required|string|max:255',
            'description'          => 'nullable|string',
            'description_hin'      => 'nullable|string',
            'images'               => 'nullable|array',
            'images.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'             => 'nullable|mimes:pdf|max:61440',
            'date'                 => 'required|date',
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
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'geo_heritage_images');
                $images[] = $path;
            }
            $validatedData['images'] = json_encode($images);
        }
        if ($request->hasFile('pdf_file')) {
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'geo_heritage_files');
            $validatedData['pdf_file'] = $path;
        }
        GeoHeritage::create($validatedData);
        return response()->json(['success' => 'Geo Heritage created successfully!'], 201);
    }


    public function editBsipGeoHeritage($id)
    {
        $geoHeritage = GeoHeritage::findOrFail($id);
        if ($geoHeritage) {
            return response()->json($geoHeritage);
        }
        return response()->json(['errors' => 'Geo Heritage not found!'], 404);
    }

    public function updateBsipGeoHeritage(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'title'                => 'required|string|max:255',
            'title_hin'            => 'required|string|max:255',
            'description'          => 'nullable|string',
            'description_hin'      => 'nullable|string',
            'images'               => 'nullable|array',
            'images.*'             => 'image|mimes:jpeg,png,jpg,gif,svg|max:61440',
            'pdf_file'             => 'nullable|mimes:pdf|max:61440',
            'date'                 => 'required|date',
            'removed_images'       => 'nullable|array',
            'removed_images.*'     => 'string',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = GeoHeritage::findOrFail($id);
        if (! $data) {
            return response()->json(['errors' => 'Geo Heritage not found!'], 404);
        }

        $validatedData  = $validator->validated();
        $existingImages = $data->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path     = $this->uploadFile($file, 'geo_heritage_images');
                $images[] = $path;
            }
            $existingImages = array_merge($existingImages, $images);
        }
        if ($request->has('removed_images')) {
            $removedImages = $request->removed_images;
            if ($removedImages) {
                foreach ($removedImages as $image) {
                    $this->deleteFile($image);
                }
                if ($existingImages) {
                    $existingImages = array_diff($existingImages, $removedImages);
                }
            }
        }
        $validatedData['images'] = json_encode(array_values($existingImages));
        if ($request->hasFile('pdf_file')) {
            $existingFile = $data->pdf_file;
            if ($existingFile) {
                $this->deleteFile($existingFile);
            }
            $file                      = $request->file('pdf_file');
            $path                      = $this->uploadFile($file, 'geo_heritage_files');
            $validatedData['pdf_file'] = $path;
        }

        unset($validatedData['removed_images']);
        $data->fill($validatedData);
        $data->save();

        return response()->json(['success' => true, 'message' => "Geo Heritage updated successfully!", 'data' => $data]);

    }


    public function toggleBsipGeoHeritageStatus(Request $request)
    {
        $geoHeritage = GeoHeritage::findOrFail($request->id);
        if ($geoHeritage) {
            $geoHeritage->status = $request->status;
            $geoHeritage->save();
            return response()->json(['success' => 'Geo Heritage status updated successfully!']);
        }
        return response()->json(['error' => 'Geo Heritage not found!'], 404);
    }
    public function toggleBsipGeoHeritageArchivedStatus(Request $request)
    {
        $geoHeritage = GeoHeritage::findOrFail($request->id);
        if ($geoHeritage) {
            $geoHeritage->archived_status = $request->status == 1 ? 'Yes' : 'No';
            $geoHeritage->save();
            return response()->json(['success' => 'Geo Heritage archived status updated successfully!']);
        }
        return response()->json(['error' => 'Geo Heritage not found!'], 404);
    }



    // ==============================================
    // Geo Hertiage Code Ended
    // ==============================================

}
