<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Module;
use App\Models\UserRight;

class HomeController extends Controller
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
        // return view('home');

        $userId = Auth::id();
        // Fetch modules and pages the user has rights to
        $modules = Module::with(['pages' => function ($query) use ($userId) {
            $query->whereIn('id', function ($subQuery) use ($userId) {
                $subQuery->select('page_id')
                    ->from('user_rights')
                    ->where('user_id', $userId);
            });
        }])->whereHas('pages', function ($query) use ($userId) {
            $query->whereIn('id', function ($subQuery) use ($userId) {
                $subQuery->select('page_id')
                    ->from('user_rights')
                    ->where('user_id', $userId);
            });
        })->get();

        return view('home', compact('modules'));
    }
}
