<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

//ineverything
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('module');
    }

    public function getModules(Request $request)
    {
        if ($request->ajax()) {
            $modules = Module::select(['id', 'name', 'module_url', 'sequence', 'status', 'created_at', 'updated_at']);
            return DataTables::of($modules)
                ->addColumn('status', function ($module) {
                    $checked = $module->status ? 'checked' : '';
                    $statusText = $module->status ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>' : '<span class="badge badge-success" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $module->id . '" ' . $checked . '> '.$statusText;
                })
                ->addColumn('action', function ($module) {
                    return '<button class="btn btn-sm btn-primary edit-module" data-id="' . $module->id . '">
                                <i class="fas fa-edit"></i>
                            </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'module_url' => 'required|string',
        //     'sequence' => 'required|integer',
        // ]);

        // Module::create($request->all());

        // return response()->json(['message' => 'Module added successfully!']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:modules,name',
            'module_url' => 'required|string',
            'sequence' => 'required|integer|unique:modules,sequence',
            'g-recaptcha-response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (!isset($result['success']) || !$result['success'] || !isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }


        $module = new Module();
        $module->name = $request->name;
        $module->module_url = $request->module_url;
        $module->sequence = $request->sequence;
        $module->save();

        return response()->json(['message' => 'Module added successfully!']);
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return response()->json($module);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:modules,name,' . $id,
            'module_url' => 'required|string',
            'sequence' => 'required|integer|unique:modules,sequence,' . $id,
        ]);

        $module = Module::findOrFail($id);
        $module->update($request->all());

        return response()->json(['message' => 'Module updated successfully!']);
    }

    public function updateStatus(Request $request)
    {
        $module = Module::findOrFail($request->id);
        $module->status = $request->status;
        $module->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }
}
