<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuPage;
use App\Models\HeaderMenu;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MenuPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
{
    if ($request->ajax()) {
        try {
            // Fetch data with parent menu relationship
            $data = MenuPage::with('parentMenu')
                ->orderBy('parent_menu_id', 'asc') // Group by parent menu
                ->orderBy('sequence', 'asc') // Order by sequence within each group
                ->get();

            return DataTables::of($data)
            ->addColumn('menu_name', function ($row) {
                return $row->parentMenu 
                    ? $row->parentMenu->title . '<br><span class="text-muted" style="font-size:11px">' . $row->parentMenu->hin_title . '</span>' 
                    : 'N/A'; // Display parent menu name with styled Hindi title
            })
                ->addColumn('actions', function ($row) {
                    return '<button class="btn btn-sm btn-primary editMenuPage" data-id="' . $row->id . '">Edit</button>';
                })
                ->rawColumns(['menu_name', 'actions', 'status'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    $menus = HeaderMenu::where('menuHas', 'Page')->get(); // Fetch menus with menuHas = Page
    return view('menuPages', compact('menus'));
}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_url' => 'required|string',
            'sequence' => 'required|integer|min:1',
            'parent_menu_id' => 'required|exists:header_menus,id'
        ]);

        MenuPage::create($request->all());

        return response()->json(['message' => 'Menu page added successfully!']);
    }

    public function edit($id)
    {
        $menuPage = MenuPage::findOrFail($id);
        return response()->json($menuPage);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_url' => 'required|string',
            'sequence' => 'required|integer|min:1',
            'parent_menu_id' => 'required|exists:header_menus,id'
        ]);

        $menuPage = MenuPage::findOrFail($id);
        $menuPage->update($request->all());

        return response()->json(['message' => 'Menu page updated successfully!']);
    }

    public function toggleStatus($id)
    {
        $menuPage = MenuPage::findOrFail($id);
        $menuPage->status = $menuPage->status === 'Active' ? 'Inactive' : 'Active';
        $menuPage->save();

        return response()->json(['message' => 'Status updated successfully!']);
    }
}
