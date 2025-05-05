<?php
namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\ContactSetting;
use App\Models\Forms;
use App\Models\HeaderMenu;
use App\Models\ImportantLink;
use App\Models\LanguageSetting;
use App\Models\Logo;
use App\Models\MenuPage;
use App\Models\Notice;
use App\Models\RajBhashaPortal;
use App\Models\ResearchHighlights;
use App\Models\Slider;
use App\Models\SocialLink;
use App\Models\Staff;
use App\Models\Tender;
use App\Models\UsefulLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
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

    public function home()
    {
        $this->sharedData['sliders'] = Slider::where('is_active', 1)->orderBy('sequence', 'asc')->get();
        $this->sharedData['notices'] = Notice::where('status', '1')
            ->where('archived_status', 'No')
            ->orderBy('expiry_date', 'asc')
            ->limit(10)
            ->get();
        $director           = Staff::where('category_id', 1)->where('status', 1)->first();
        $researchHighlights = ResearchHighlights::where('status', 1)
            ->where('archived_status', 'No')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();

        // get latest 6 images of Rajbhasha Patal
        $photoGallery = RajBhashaPortal::where('status', 1)
            ->where('archived_status', 'No')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get()
            ->pluck('images')
            ->flatten()
            ->take(6);

        // dd($this->sharedData['lastModified']);
        // Pass shared data to the view
        return view('website.home', $this->sharedData, compact('director', 'researchHighlights', 'photoGallery'));
    }
    public function noticesSection()
    {

        $this->sharedData['notices'] = Notice::where('status', '1')
            ->where('archived_status', 'No')
            ->orderBy('expiry_date', 'asc')
        //->take(10) // Limit to 10 notices
            ->get();

        // Archived Notices
        $this->sharedData['archivedNotices'] = Notice::where('status', '1')
            ->where('archived_status', 'Yes')
            ->orderBy('expiry_date', 'asc')
            ->get();
        // Pass shared data to the view
        return view('website.notices', $this->sharedData);
    }

    public function historySection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.history', $this->sharedData);
    }
    public function parentalBackgroundSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.parentalBackground', $this->sharedData);
    }
    public function educationCareerSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.educationCareer', $this->sharedData);
    }

    public function generalInterestSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.generalInterest', $this->sharedData);
    }

    public function incidentofYouthSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.incidentofYouth', $this->sharedData);
    }
    public function livingSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.living', $this->sharedData);
    }
    public function fossilSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.fossil', $this->sharedData);
    }
    public function geologySection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.geology', $this->sharedData);
    }
    public function honoursSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.honours', $this->sharedData);
    }
    public function mrsSavitriSahniSection(Request $request)
    {

        // Get the current page based on the slug (path)
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
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
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.mrsSavitriSahni', $this->sharedData);
    }
    public function formsSection()
    {

        $this->sharedData['forms'] = Forms::where('status', 1)
            ->where('archived_status', 'No')
        //->take(10) // Limit to 10 forms
            ->get();
        // Pass shared data to the view
        return view('website.forms', $this->sharedData);
    }
    public function rtiSection()
    {
        return view('website.rti', $this->sharedData);
    }
    public function icCommitteeSection()
    {
        return view('website.icCommittee', $this->sharedData);
    }
    public function bsip_careerSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;

        $this->sharedData['career'] = Career::where('status', 1)
            ->where('archived_status', 'No')
            ->orderBy('last_date', 'asc')
            ->whereDate('last_date', '>=', Carbon::today())
        //->take(10) // Limit to 10 career
            ->get();
        // Pass shared data to the view
        return view('website.career', $this->sharedData);
    }
    public function bsip_tendersSection()
    {

        $this->sharedData['tenders'] = Tender::where('status', 1)
            ->where('archived_status', 'No')
            ->orderBy('created_at', 'desc')
            ->whereDate('end_date', '>=', Carbon::today())
        //->take(10) // Limit to 10 tender
            ->get();

        // Archived Tenders
        $this->sharedData['archivedTenders'] = Tender::where('status', 1)
            ->where('archived_status', 'Yes')
            ->orderBy('created_at', 'desc')
            ->get();
        // Pass shared data to the view
        return view('website.tender', $this->sharedData);
    }
    public function admissionToPhdSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;

        return view('website.admissionToPhd', $this->sharedData);
    }
    public function disserationSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;

        return view('website.disseration', $this->sharedData);
    }
    public function trainingSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;

        return view('website.training', $this->sharedData);
    }
    public function lemIssSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }
        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;
        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', $parentMenuId)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId'] = $currentPage->id;
        $this->sharedData['menuPages']     = $menuPages;

        return view('website.lemIss', $this->sharedData);
    }
}
