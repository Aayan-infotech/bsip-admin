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
use App\Models\SAIF;

class Facilities extends Controller
{
    //
    protected $sharedData = [];

    public function __construct(Request $request)
    {
        $language                           = $request->route('language', 'en'); // Default to 'en' if not provided
        $this->sharedData['visitorCount']   = Cache::increment('visitor_count', 1);
        $this->sharedData['headerMenus']    = HeaderMenu::with(['menuPages'])->where('status', 'Active')->get();
        $this->sharedData['socialLinks']    = SocialLink::all();
        $this->sharedData['importantLinks'] = ImportantLink::all();
        $this->sharedData['usefulLinks']    = UsefulLink::all();
        $this->sharedData['logo']           = Logo::first();
        $this->sharedData['contact']        = ContactSetting::first();

        $validLanguage = LanguageSetting::where('language', $language)->exists();
        if (! $validLanguage) {
            abort(404, 'Language not supported');
        }

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

    public function saif(Request $request)
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

        // Fetch SAIF data
        $saifData = SAIF::with(['scientist' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();

        return view('website.facilities.saif', $this->sharedData, compact('saifData'));
    }

    public function dnaLab(Request $request){
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

        return view('website.facilities.dnaLab', $this->sharedData);
    }

    public function sem(Request $request){
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

        return view('website.facilities.sem', $this->sharedData);
    }

    public function c14(Request $request){
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

        return view('website.facilities.c14', $this->sharedData);
    }

    public function sectionCutting(Request $request){
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

        return view('website.facilities.sectionCutting', $this->sharedData);
    }

    public function maceration(Request $request){
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

        return view('website.facilities.maceration', $this->sharedData);
    }
}
