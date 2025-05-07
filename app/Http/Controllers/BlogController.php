<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Traits\UploadFilesTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use UploadFilesTraits;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function index()
    // {
    //     return view('research-management.add_research_highlights');
    // }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'year'                 => 'required|integer|min:1900|max:' . date('Y'),
    //         'link'                 => 'nullable|string',
    //         'title'                => 'required|string|max:255',
    //         'hin_title'            => 'required|string|max:255',
    //         'hindi_file'           => 'nullable|mimes:pdf|max:2048',
    //         'english_file'         => 'nullable|mimes:pdf|max:2048',
    //         'g-recaptcha-response' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
    //         'secret'   => env('RECAPTCHA_SECRET_KEY'),
    //         'response' => $request->input('g-recaptcha-response'),
    //     ]);

    //     $result = $response->json();

    //     if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
    //         return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
    //     }

    //     $validatedData = $validator->validated();

    //     unset($validatedData['g-recaptcha-response']);

    //     if ($request->hasFile('hindi_file')) {
    //         $validatedData['hindi_file'] = $this->uploadFile($request->file('hindi_file'), 'research_highlights/hindi');
    //     }
    //     if ($request->hasFile('english_file')) {
    //         $validatedData['english_file'] = $this->uploadFile($request->file('english_file'), 'research_highlights/english');
    //     }

    //     $researchHighlight = new ResearchHighlights($validatedData);
    //     $status            = $researchHighlight->save();

    //     if (! $status) {
    //         return response()->json(['error' => 'Failed to create research highlight!'], 500);
    //     }

    //     return response()->json(['message' => 'Research highlight created successfully!'], 201);
    // }

    // public function getResearchHighlights(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $researchHighlights = ResearchHighlights::get();
    //         return DataTables::of($researchHighlights)
    //             ->addColumn('status', function ($researchHighlight) {
    //                 $checked    = $researchHighlight->status ? 'checked' : '';
    //                 $statusText = $researchHighlight->status
    //                 ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
    //                 : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';

    //                 $checked1    = $researchHighlight->archived_status === 'Yes' ? 'checked' : '';
    //                 $statusText1 = $researchHighlight->archived_status === 'Yes'
    //                 ? ' <span class="badge badge-warning" style="color: white;background:rgb(180, 5, 151);">Archived</span>'
    //                 : ' <span class="badge badge-info" style="color: white;background: #053479;">Un-Archived</span>';
    //                 return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $researchHighlight->id . '" ' . $checked . '> ' . $statusText . '</div>' .
    //                 '<br><div class="d-flex"> <input type="checkbox" class="toggle-archived-status me-2" data-id="' . $researchHighlight->id . '" ' . $checked1 . '> ' . $statusText1 . '</div>';
    //             })
    //             ->addColumn('action', function ($researchHighlight) {
    //                 return '<button class="btn btn-sm btn-primary edit-research-highlight" data-id="' . $researchHighlight->id . '">
    //                 <i class="fas fa-edit"></i>
    //             </button>';
    //             })
    //             ->rawColumns(['status', 'action'])
    //             ->make(true);
    //     }
    // }

    // public function toggleStatus(Request $request)
    // {
    //     $researchHighlight         = ResearchHighlights::findOrFail($request->id);
    //     $researchHighlight->status = $request->status;
    //     $researchHighlight->save();

    //     return response()->json(['success' => 'Status updated successfully.']);
    // }
    // public function toggleArchivedStatus(Request $request)
    // {
    //     if ($request->status == 1) {
    //         $request->archived_status = 'Yes';
    //     } else {
    //         $request->archived_status = 'No';
    //     }
    //     $researchHighlight                  = ResearchHighlights::findOrFail($request->id);
    //     $researchHighlight->archived_status = $request->archived_status;
    //     $researchHighlight->save();

    //     return response()->json(['success' => 'Archived status updated successfully.']);
    // }

    // public function edit($id)
    // {
    //     $researchHighlight = ResearchHighlights::findOrFail($id);
    //     return response()->json($researchHighlight);
    // }

    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'year'         => 'required|integer|min:1900|max:' . date('Y'),
    //         'link'         => 'nullable|string',
    //         'title'        => 'required|string|max:255',
    //         'hin_title'    => 'required|string|max:255',
    //         'hindi_file'   => 'nullable|mimes:pdf|max:2048',
    //         'english_file' => 'nullable|mimes:pdf|max:2048',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $validatedData = $validator->validated();

    //     $data = ResearchHighlights::findOrFail($id);

    //     if ($request->hasFile('hindi_file')) {
    //         // Delete the old file if it exists
    //         $oldHindiFile = $data->hindi_file;

    //         if ($oldHindiFile) {
    //             $this->deleteFile($oldHindiFile);
    //         }
    //         $validatedData['hindi_file'] = $this->uploadFile($request->file('hindi_file'), 'research_highlights/hindi');
    //     }
    //     if ($request->hasFile('english_file')) {

    //         $oldEnglishFile = $data->english_file;
    //         if ($oldEnglishFile) {
    //             $this->deleteFile($oldEnglishFile);
    //         }
    //         $validatedData['english_file'] = $this->uploadFile($request->file('english_file'), 'research_highlights/english');
    //     }

    //     $data->update($validatedData);

    //     return response()->json(['message' => 'Research highlight updated successfully!'], 200);
    // }

    public function index()
    {
        return view('blog.index');
    }

    public function store(Request $request)
    {
        $slug         = Str::slug($request->title, '-');
        $originalSlug = $slug;

        $count = Blog::where('slug', 'like', $slug . '%')->count();
        if ($count > 0) {
            $slug = $originalSlug . '-' . ($count);
        }
        $request->merge([
            'slug' => $slug,
        ]);

        $validator = Validator::make($request->all(), [
            'title'           => 'required|string|max:255',
            'hin_title'       => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:blogs,slug',
            'description'     => 'nullable|string',
            'hin_description' => 'nullable|string',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:10240',
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
            $validatedData['image'] = $this->uploadFile($request->file('image'), 'blog');
        }

        $blog   = new Blog($validatedData);
        $status = $blog->save();

        if (! $status) {
            return response()->json(['error' => 'Failed to create blog!'], 500);
        }

        return response()->json(['message' => 'Blog created successfully!'], 201);
    }

    public function getBlogs(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::get();
            return DataTables()->of($blogs)
                ->addColumn('status', function ($blog) {
                    $checked    = $blog->status ? 'checked' : '';
                    $statusText = $blog->status
                    ? ' <span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>'
                    : ' <span class="badge badge-danger" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<div class="d-flex"> <input type="checkbox" class="toggle-status me-2" data-id="' . $blog->id . '" ' . $checked . '> ' . $statusText . '</div>';
                })
                ->addColumn('action', function ($blog) {
                    return '<button class="btn btn-sm btn-primary edit-blog" data-id="' . $blog->id . '">
                    <i class="fas fa-edit"></i>
                </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function toggleStatus(Request $request)
    {
        $blog         = Blog::findOrFail($request->id);
        $blog->status = $request->status;
        $blog->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return response()->json($blog);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        // Only generate new slug if title is changed
        if ($request->title && $request->title !== $blog->title) {
            $slug         = Str::slug($request->title, '-');
            $originalSlug = $slug;
            $count        = Blog::where('slug', 'like', $slug . '%')
                ->where('id', '!=', $id) // exclude current blog
                ->count();

            if ($count > 0) {
                $slug = $originalSlug . '-' . ($count);
            }

            $request->merge([
                'slug' => $slug,
            ]);
        } else {
            // Keep the existing slug
            $request->merge([
                'slug' => $blog->slug,
            ]);
        }
        $validator = Validator::make($request->all(), [
            'title'           => 'required|string|max:255',
            'hin_title'       => 'required|string|max:255',
            'slug'            => 'required|string|max:255|unique:blogs,slug,' . $id,
            'description'     => 'nullable|string',
            'hin_description' => 'nullable|string',
            'image'           => 'nullable|mimes:jpg,jpeg,png|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old file if it exists
            $oldImage = $blog->image;

            if ($oldImage) {
                $this->deleteFile($oldImage);
            }
            $validatedData['image'] = $this->uploadFile($request->file('image'), 'blog');
        }

        $blog->update($validatedData);

        return response()->json(['message' => 'Blog updated successfully!'], 200);
    }
}
