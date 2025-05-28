<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\HeaderMenu;
use App\Models\ImportantLink;
use App\Models\LanguageSetting;
use App\Models\Logo;
use App\Models\MenuPage;
use App\Models\SocialLink;
use App\Models\UsefulLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UnitsManagement extends Controller
{
    protected $sharedData = [];

    public function __construct(Request $request)
    {
        $language                           = $request->route('language', 'en'); // Default to 'en' if not provided
        $this->sharedData['visitorCount']   = Cache::increment('visitor_count', 1);
        $this->sharedData['headerMenus']    = HeaderMenu::with(['menuPages'=> function ($query) {
            $query->where('status', 'Active');
        }])->where('status', 'Active')->get();
        $this->sharedData['socialLinks']    = SocialLink::all();
        $this->sharedData['importantLinks'] = ImportantLink::all();
        $this->sharedData['usefulLinks']    = UsefulLink::all();
        $this->sharedData['logo']           = Logo::first();
        $this->sharedData['contact']        = ContactSetting::first();

        $validLanguage = LanguageSetting::where('language', $language)->exists();
        if (! $validLanguage) {
            abort(404, 'Language not supported');
        }
        // get the last modification in the database
        $result = DB::table('information_schema.tables')
            ->select('TABLE_NAME', 'UPDATE_TIME')
            ->where('TABLE_SCHEMA', env('DB_DATABASE'))
            ->orderByDesc('UPDATE_TIME')
            ->limit(1)
            ->first();

        $this->sharedData['lastModified'] = $result ? $result->UPDATE_TIME : null;

        // Add the language to the shared data
        $this->sharedData['language'] = $language;

        $pageUrl     = $request->segment(2);
        $currentPage = MenuPage::where('page_url', $pageUrl)->first();

        if ($currentPage) {
            $this->sharedData['pageTitle'] = $language === 'hi' ? $currentPage->hin_title : $currentPage->title;
        } else {
            // Default title if no specific page is found
            $this->sharedData['pageTitle'] = $language === 'hi'
            ? 'मुख्य पृष्ठ'
            : 'Home';
        }
    }

    public function museum(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', $parentMenuId)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.units.museum', $this->sharedData);
    }

    public function library(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', $parentMenuId)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.units.library', $this->sharedData);
    }

    public function computerSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', $parentMenuId)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.units.computerSection', $this->sharedData);
    }

    public function geoHeritage(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', $parentMenuId)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.units.geoHeritage', $this->sharedData);
    }

    public function amberAnalysis(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', $parentMenuId)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.units.amberAnalysis', $this->sharedData);
    }
}
