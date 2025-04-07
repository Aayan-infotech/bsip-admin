<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderMenu;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class HeaderMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = HeaderMenu::orderBy('sequence', 'asc')->get();
            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    return '<button class="btn btn-sm btn-primary editHeaderMenu" data-id="' . $row->id . '">Edit</button>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('headerMenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'menuHas' => 'required|in:Page,URL',
            'url' => 'nullable|required_if:menuHas,URL|string',
            'sequence' => 'required|integer|min:1'
        ]);

        HeaderMenu::create($request->all());

        return response()->json(['message' => 'Header menu added successfully!']);
    }

    public function edit($id)
    {
        $menu = HeaderMenu::findOrFail($id);
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'menuHas' => 'required|in:Page,URL',
            'url' => 'nullable|required_if:menuHas,URL|string',
            'sequence' => 'required|integer|min:1'
        ]);

        $menu = HeaderMenu::findOrFail($id);
        $menu->update($request->all());

        return response()->json(['message' => 'Header menu updated successfully!']);
    }

    public function toggleStatus($id)
    {
        $menu = HeaderMenu::findOrFail($id);
        $menu->status = $menu->status === 'Active' ? 'Inactive' : 'Active';
        $menu->save();

        return response()->json(['message' => 'Status updated successfully!']);
    }
}
