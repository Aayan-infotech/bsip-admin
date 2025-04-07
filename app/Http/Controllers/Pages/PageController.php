<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Module;
use Illuminate\Http\Request;
//ineverything
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $modules = Module::where('status', 1)->get(); // Fetch active modules
        return view('page', compact('modules'));
    }

    public function getPages1(Request $request)
    {
        if ($request->ajax()) {
            $pages = Page::with('module')->select(['id', 'name', 'module_id', 'page_url', 'sequence', 'status', 'created_at', 'updated_at']);
            return DataTables::of($pages)
                ->addColumn('module', function ($page) {
                    return $page->module->name ?? 'N/A';
                })
                ->addColumn('status', function ($page) {
                    $checked = $page->status ? 'checked' : '';
                    $statusText = $page->status ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>' : '<span class="badge badge-success" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $page->id . '" ' . $checked . '> ' . $statusText;
                })
                ->addColumn('action', function ($page) {
                    return '<button class="btn btn-sm btn-primary edit-page" data-id="' . $page->id . '">
                                <i class="fas fa-edit"></i> Edit
                            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function getPages(Request $request)
    {
        if ($request->ajax()) {
            $pages = Page::with('module')->select(['id', 'name', 'module_id', 'page_url', 'sequence', 'status', 'created_at', 'updated_at']);
            return DataTables::of($pages)
                ->addColumn('module', function ($page) {
                    return $page->module->name ?? 'N/A'; // Display the module name or 'N/A' if not found
                })
                ->addColumn('status', function ($page) {
                    $checked = $page->status ? 'checked' : '';
                    $statusText = $page->status ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>' : '<span class="badge badge-success" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $page->id . '" ' . $checked . '> ' . $statusText;
                })
                ->addColumn('action', function ($page) {
                    return '<button class="btn btn-sm btn-primary edit-page" data-id="' . $page->id . '">
                            <i class="fas fa-edit"></i> Edit
                        </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pages,name',
            'module_id' => 'required|exists:modules,id',
            'page_url' => 'required|string|unique:pages,page_url',
            'sequence' => 'required|integer|unique:pages,sequence,NULL,id,module_id,' . $request->module_id,
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

        $page = new Page();
        $page->name = $request->name;
        $page->module_id = $request->module_id;
        $page->page_url = $request->page_url;
        $page->sequence = $request->sequence;
        $page->save();

        // Page::create($request->all());

        return response()->json(['message' => 'Page added successfully!']);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return response()->json($page);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:pages,name,' . $id,
            'module_id' => 'required|exists:modules,id',
            'page_url' => 'required|string|unique:pages,page_url,' . $id,
            'sequence' => 'required|integer|unique:pages,sequence,' . $id . ',id,module_id,' . $request->module_id,
        ]);

        $page = Page::findOrFail($id);
        $page->update($request->all());

        return response()->json(['message' => 'Page updated successfully!']);
    }

    public function updateStatus(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->status = $request->status;
        $page->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
}
