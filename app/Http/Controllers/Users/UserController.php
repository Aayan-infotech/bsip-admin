<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Http;

use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
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

        if ($request->password !== $request->password_confirmation) {
            return response()->json(['error' => 'Password and Confirm Password do not match!'], 422);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(['message' => 'User added successfully!']);
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at', 'status']);

            return DataTables::of($users)
                ->addColumn('status', function ($user) {
                    $checked = $user->status ? 'checked' : '';
                    $statusText = $user->status ? '<span class="badge badge-success" style="color: white;background: #2c751d;">Active</span>' : '<span class="badge badge-success" style="color: white;background: #df0d17;">Blocked</span>';
                    return '<input type="checkbox" class="toggle-status" data-id="' . $user->id . '" ' . $checked . '> ' . $statusText;
                })
                ->addColumn('action', function ($user) {
                    return '<button class="btn btn-sm btn-primary edit-user" data-id="' . $user->id . '">
                            <i class="fas fa-edit"></i>
                        </button>';
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
    }

    public function updateStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status updated successfully.']);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json(['message' => 'User updated successfully!']);
    }
}
