<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ActivitiesName;
use App\Models\ContactSetting;
use App\Models\HeaderMenu;
use App\Models\ImportantLink;
use App\Models\LanguageSetting;
use App\Models\Logo;
use App\Models\MenuPage;
use App\Models\PastDirectors;
use App\Models\PastHeads;
use App\Models\SocialLink;
use App\Models\SponsoredProjects;
use App\Models\Staff;
use App\Models\StaffSubCategory;
use App\Models\UsefulLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Lectures;
use App\Models\Lecturers;

class StructureManagement extends Controller
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

    public function governingBody(Request $request)
    {

        // Get the current page based on the slug (path)
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

        $governingBody = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 5)->get();

        return view('website.structure.governingBody', $this->sharedData, compact('governingBody'));
    }

    public function researchAdvisoryCouncil(Request $request)
    {
        // Get the current page based on the slug (path)
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

        $researchAdvisoryCouncil = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 6)->get();

        return view('website.structure.researchAdvisoryCouncil', $this->sharedData, compact('researchAdvisoryCouncil'));
    }

    public function financeAndBuildingCommittee(Request $request)
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

        $financeAndBuildingCommittee = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 7)->get();

        return view('website.structure.financeAndBuildingCommittee', $this->sharedData, compact('financeAndBuildingCommittee'));
    }

    public function buildingCommittee(Request $request)
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

        $buildingCommittee = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 11)->get();

        return view('website.structure.buildingCommittee', $this->sharedData, compact('buildingCommittee'));
    }

    public function pastInstituteHeads(Request $request)
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

        $pastHeads = PastHeads::where('status', 1)->orderBy('id', 'asc')->get();

        return view('website.structure.pastInstituteHeads', $this->sharedData, compact('pastHeads'));
    }

    public function pastInstitutePresidents(Request $request)
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

        $pastDirectors = PastDirectors::where('status', 1)->orderBy('id', 'asc')->get();

        return view('website.structure.pastInstitutePresidents', $this->sharedData, compact('pastDirectors'));
    }

    public function organizationalSetup(Request $request)
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

        return view('website.structure.organizationalSetup', $this->sharedData);
    }

    public function director(Request $request)
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

        $director = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }, 'staff.awardsHonors', 'staff.fellowships'])->where('status', 1)->where('category_id', 1)->get();
        // dd($director);
        return view('website.structure.director', $this->sharedData, compact('director'));
    }

    public function scientificSection(Request $request)
    {
        $currentPage = MenuPage::where('page_url', $request->segment(2))->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', 4)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', 4)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        $scientificSection = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 2)->get();

        return view('website.staff.scientificSection', $this->sharedData, compact('scientificSection'));
    }

    public function profileDetails(Request $request, $language, $staffid)
    {
        $currentPage = MenuPage::where('page_url', 'bsip_scientific')->first();
        if (! $currentPage) {
            abort(404, 'Page not found');
        }

        // Get the parent_menu_id from the current page
        $parentMenuId = $currentPage->parent_menu_id;

        // Current Headermenu
        $currentHeaderMenu = HeaderMenu::where('id', 4)->first();
        if (! $currentHeaderMenu) {
            $currentHeaderMenu              = [];
            $currentHeaderMenu['title']     = $this->sharedData['pageTitle'];
            $currentHeaderMenu['hin_title'] = $this->sharedData['pageTitle'];
        }

        // Fetch all menu pages under the same parent_menu_id
        $menuPages = MenuPage::where('parent_menu_id', 4)
            ->where('status', 1)
            ->orderBy('sequence', 'asc')
            ->get();

        // Fetch the staff member by ID
        $staff = Staff::with('fellowships', 'awardsHonors')->where('employee_id', $staffid)->first();

        // Pass data to the view
        $this->sharedData['currentPageId']     = $currentPage->id;
        $this->sharedData['menuPages']         = $menuPages;
        $this->sharedData['currentHeaderMenu'] = $currentHeaderMenu;
        $this->sharedData['currentPage']       = $currentPage;

        return view('website.staff.profileDetails', $this->sharedData, compact('staff'));
    }

    public function technicalStaff(Request $request)
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

        $technicalStaff = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 3)->get();

        return view('website.staff.technicalStaff', $this->sharedData, compact('technicalStaff'));
    }

    public function administrativeStaff(Request $request)
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

        $administrativeStaff = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 4)->get();

        return view('website.staff.administrativeStaff', $this->sharedData, compact('administrativeStaff'));
    }

    public function acsir(Request $request)
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

        $acSIRStaff = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 12)->get();

        return view('website.staff.acsir', $this->sharedData, compact('acSIRStaff'));
    }

    public function superannuatedEmployee(Request $request)
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

        $superannuatedEmployee = StaffSubCategory::with(['staff' => function ($query) {
            $query->where('status', 1)->orderBy('id', 'asc');
        }])->where('status', 1)->where('category_id', 9)->first();

        return view('website.staff.superannuatedEmployee', $this->sharedData, compact('superannuatedEmployee'));
    }

    public function collaboration(Request $request)
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

        return view('website.research.collaboration', $this->sharedData);
    }

    public function fellowship(Request $request)
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

        return view('website.research.fellowship', $this->sharedData);
    }

    public function medalsAndAwards(Request $request)
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

        return view('website.research.medalsAndAwards', $this->sharedData);
    }

    public function consultancy(Request $request)
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

        return view('website.research.consultancy', $this->sharedData);
    }

    public function researchActivities(Request $request)
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

        $researchActivities = ActivitiesName::with(['activities' => function ($query) {
            $query->where('status', 1);
        }, 'activities.projects'])->where('status', 1)->orderBy('id', 'asc')->get();

        // dd($researchActivities);

        return view('website.research.researchActivities', $this->sharedData, compact('researchActivities'));
    }

    public function sponsoredProject(Request $request)
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

        $sponsoredProjects = SponsoredProjects::where('status', 1)->orderBy('id', 'asc')->get();

        return view('website.research.sponsoredProject', $this->sharedData, compact('sponsoredProjects'));
    }

    public function lectures(Request $request){
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

        $lectures = Lecturers::with(['lectures' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->orderBy('id', 'asc')->get();
        // dd($lectures);


        return view('website.research.lectures', $this->sharedData, compact('lectures'));
    }

}
