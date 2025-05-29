<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Annual_Report;
use App\Models\ContactSetting;
use App\Models\HeaderMenu;
use App\Models\ImportantLink;
use App\Models\Institute_Catalogue;
use App\Models\LanguageSetting;
use App\Models\Logo;
use App\Models\MenuPage;
use App\Models\MonthlyReport;
use App\Models\ResearchHighlights;
use App\Models\SocialLink;
use App\Models\UsefulLink;
use App\Traits\GettheSize;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PublicationManagement extends Controller
{
    use GettheSize;
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

        // Add the language to the shared data
        $this->sharedData['language'] = $language;

        // get the last modification in the database
        $result = DB::table('information_schema.tables')
            ->select('TABLE_NAME', 'UPDATE_TIME')
            ->where('TABLE_SCHEMA', env('DB_DATABASE'))
            ->orderByDesc('UPDATE_TIME')
            ->limit(1)
            ->first();

        $this->sharedData['lastModified'] = $result ? $result->UPDATE_TIME : null;

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

    public function thePaleobotanist(Request $request)
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

        return view('website.publications.thePaleobotanist', $this->sharedData);
    }

    public function pOnSale(Request $request)
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

        return view('website.publications.pOnSale', $this->sharedData);
    }

    public function annualReports(Request $request)
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

        // Fetch the annual reports
        $annualReports = Annual_Report::where('archived_status', 'No')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $archivedReports = Annual_Report::where('archived_status', 'Yes')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        // get the file size of each report of hindi and english
        // $annualReports->transform(function ($report) {
        //     // Extract relative path from URL if needed
        //     $relativePath = str_replace(url('storage') . '/', '', $report->report_file);
        //     $filePath = public_path('storage/' . $relativePath);

        //     $report->report_file_size = (file_exists($filePath))
        //         ? round(filesize($filePath) / 1024 / 1024, 2)
        //         : null;

        //     $relativeHinPath = str_replace(url('storage') . '/', '', $report->report_file_hin);
        //     $fileHinPath = public_path('storage/' . $relativeHinPath);

        //     $report->report_file_hin_size = (file_exists($fileHinPath))
        //         ? round(filesize($fileHinPath) / 1024 / 1024, 2)
        //         : null;

        //     return $report;
        // });

        // dd($annualReports);

        return view('website.publications.annualReports', $this->sharedData, compact('annualReports', 'archivedReports'));
    }

    public function catalogues(Request $request)
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

        // Fetch the catalogues
        $catalogues = Institute_Catalogue::where('archived_status', 'No')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('website.publications.catalogues', $this->sharedData, compact('catalogues'));
    }

    public function researchHighlightsAll(Request $request)
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

        // Fetch the research highlights
        $researchHighlights = ResearchHighlights::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('website.publications.researchHighlightsAll', $this->sharedData, compact('researchHighlights'));
    }

    public function monthlyReports(Request $request)
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

        $monthlyReports = MonthlyReport::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        $monthlyReports->transform(function ($report) {
            $report->report_month     = Carbon::parse($report->report_month)->format('F');
            $report->report_year      = Carbon::parse($report->report_month)->format('Y');
            $report->report_month_hin = Carbon::parse($report->report_month)->locale('hi')->translatedFormat('F');
            return $report;
        });

        return view('website.publications.monthlyReports', $this->sharedData, compact('monthlyReports'));
    }

    public function newsLetter(Request $request)
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

        $data = [];

        $baseFile = 'assets-new/assets/newsletter/';
        foreach (range(2003, 1998) as $year) {
            $filePage    = $baseFile . 'Newsletter' . $year . '.pdf';
            $fileSize    = GettheSize::getFileSizeInMB($filePage);
            $data[$year] = [
                'file' => url($filePage),
                'size' => $fileSize,
            ];
        }

        return view('website.publications.newsLetter', $this->sharedData, compact('data'));
    }

    public function epatrika(Request $request)
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

        $data     = [];
        $baseFile = 'assets-new/assets/epatrika/';
        $fileName = [
            [
                'year' => 2022,
                'file' => 'e patrika ank 1 2022.pdf',
            ],
            [
                'year' => 2023,
                'file' => 'e patrika ank 2 2023.pdf',
            ],
            [
                'year' => 2024,
                'file' => 'e patrika ank 3 2024.pdf',
            ],
        ];
        foreach ($fileName as $file) {
            $fileName    = $file['file'];
            $year        = $file['year'];
            $filePage    = $baseFile . $fileName;
            $fileSize    = GettheSize::getFileSizeInMB($filePage);
            $data[$year] = [
                'file' => url($filePage),
                'size' => $fileSize,
            ];
        }

        return view('website.publications.epatrika', $this->sharedData, compact('data'));
    }

}
