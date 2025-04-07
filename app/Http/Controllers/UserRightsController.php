<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRightsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::select('id', 'name', 'email')->where('status', 1)->get(); // Fetch all users
        return view('userRights', compact('users'));
    }

    public function fetchUserRights(Request $request)
    {
        $userId = $request->user_id;

        // Fetch modules and pages
        $modules = Module::with(['pages'])->where('status', 1)->get();

        // Fetch assigned rights for the user
        $assignedRights = DB::table('user_rights')
            ->where('user_id', $userId)
            ->pluck('page_id')
            ->toArray();

        return response()->json([
            'modules' => $modules,
            'assignedRights' => $assignedRights,
        ]);
    }

    public function updateUserRights(Request $request)
    {
        $userId = $request->user_id;
        $moduleId = $request->module_id; // Get module_id from the request
        $pageIds = $request->page_ids;

        // Remove existing rights for the user
        DB::table('user_rights')->where('user_id', $userId)->delete();

        // Assign new rights
        foreach ($pageIds as $pageId) {
            DB::table('user_rights')->insert([
                'user_id' => $userId,
                'module_id' => $moduleId, // Save module_id
                'page_id' => $pageId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return response()->json(['message' => 'User rights updated successfully!']);
    }
}
