<?php
namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class SearchController extends Controller
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

    public function search(Request $request)
    {
        $search      = $request->input('search');
        $searchLower = strtolower($search);

        // Step 1: Search public GET routes
        $routes       = Route::getRoutes();
        $matchedPages = [];

        // Step 2: Search all tables
        $tables        = DB::select('SHOW TABLES');
        $matchedTables = [];

        foreach ($tables as $tableObj) {
            $tableName = array_values((array) $tableObj)[0];
            // dd($tableName === 'raj_bhasha_portals');

            $query = null;

            // Tables with title and hin_title columns
            if (Schema::hasColumn($tableName, 'title') && (Schema::hasColumn($tableName, 'hin_title'))) {

                $query = DB::table($tableName)
                    ->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('hin_title', 'LIKE', "%{$search}%");

            }
            if (Schema::hasColumn($tableName, 'title') && (Schema::hasColumn($tableName, 'title_hin'))) {
                if (! $query) {
                    $query = DB::table($tableName);
                }
                $query->orWhere(function ($q) use ($search, $tableName) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('title_hin', 'LIKE', "%{$search}%");
                });
            }

            // Table with description and hin_description columns
            if (Schema::hasColumn($tableName, 'description') && Schema::hasColumn($tableName, 'hin_description')) {
                if (! $query) {
                    $query = DB::table($tableName);
                }
                $query->orWhere(function ($q) use ($search, $tableName) {
                    $q->where('description', 'LIKE', "%{$search}%")
                        ->orWhere('hin_description', 'LIKE', "%{$search}%");
                });
            }

            if (Schema::hasColumn($tableName, 'lecture_title') && Schema::hasColumn($tableName, 'hin_lecture_title') && Schema::hasColumn($tableName, 'lecture_description') && Schema::hasColumn($tableName, 'hin_lecture_description')) {
                if (! $query) {
                    $query = DB::table($tableName);
                }
                $query->orWhere(function ($q) use ($search, $tableName) {
                    $q->where('lecture_title', 'LIKE', "%{$search}%")
                        ->orWhere('hin_lecture_title', 'LIKE', "%{$search}%")
                        ->orWhere('lecture_description', 'LIKE', "%{$search}%")
                        ->orWhere('hin_lecture_description', 'LIKE', "%{$search}%");
                });
            }

            // Special case: projects table
            if ($tableName === 'projects') {
                if (! $query) {
                    $query = DB::table($tableName);
                }

                $query->orWhere(function ($q) use ($search, $tableName) {
                    if (Schema::hasColumn($tableName, 'component_title')) {
                        $q->orWhere('component_title', 'LIKE', "%{$search}%");
                    }
                    if (Schema::hasColumn($tableName, 'component_hin_title')) {
                        $q->orWhere('component_hin_title', 'LIKE', "%{$search}%");
                    }
                    if (Schema::hasColumn($tableName, 'personnel')) {
                        $q->orWhere('personnel', 'LIKE', "%{$search}%");
                    }
                    if (Schema::hasColumn($tableName, 'hin_personnel')) {
                        $q->orWhere('hin_personnel', 'LIKE', "%{$search}%");
                    }
                });
            }

            if ($query) {
                $records = $query->exists();

                if ($records) {
                    $matchedTables[$tableName] = $records;
                }
            }
        }

        foreach ($routes as $route) {
            $middleware        = $route->gatherMiddleware();
            $hasAuthMiddleware = collect($middleware)->contains(function ($m) {
                return str_contains($m, 'auth');
            });

            if (! $hasAuthMiddleware && in_array('GET', $route->methods())) {
                $uri  = $route->uri();
                $name = $route->getName();
                // dd($matchedTables);

                $normalizedUri  = strtolower(str_replace(['_', '{', '}', '/'], ' ', $uri));
                $normalizedName = $name ? strtolower(str_replace('_', ' ', $name)) : '';

                $searchNormalized = strtolower($search);
                $searchNormalized = str_replace('_', ' ', $searchNormalized);

                // Match if search term is found in route URI or route name
                if (str_contains($normalizedUri, $searchNormalized) || ($normalizedName && str_contains($normalizedName, $searchNormalized))) {
                    $matchedPages[] = [
                        'uri'  => $uri,
                        'url'  => $name ? route($name, ['language' => $this->sharedData['language']]) : url($uri),
                        'name' => $name ?? $uri,
                    ];
                }

                if (
                    (array_key_exists('news', $matchedTables) && $route->uri() === '{language}/bsip_news') ||
                    (array_key_exists('research_highlights', $matchedTables) && $route->uri() === '{language}/bsip_research_activities') ||
                    (array_key_exists('sponsored_projects', $matchedTables) && $route->uri() === '{language}/bsip_sponsored_project') ||
                    (array_key_exists('raj_bhasha_portals', $matchedTables) && $route->uri() === '{language}/bsip_rajbhasha_patal') || (array_key_exists('publications', $matchedTables) && $route->uri() === '{language}/bsip_publications') || (array_key_exists('careers', $matchedTables) && $route->uri() === '{language}/bsip_career') || (array_key_exists('forms', $matchedTables) && $route->uri() === '{language}/bsip_download_forms') || (array_key_exists('pastevents', $matchedTables) && $route->uri() === '{language}/bsip_past_events') || (array_key_exists('research_highlights', $matchedTables) && $route->uri() === '{language}/bsip_research_highlights_all') || (array_key_exists('tenders', $matchedTables) && $route->uri() === '{language}/bsip_tenders') || (array_key_exists('annual__reports', $matchedTables) && $route->uri() === '{language}/bsip_annual_reports') || (array_key_exists('monthly_reports', $matchedTables) && $route->uri() === '{language}/bsip_monthly_reports') || (array_key_exists('institute__catalogues', $matchedTables) && $route->uri() === '{language}/bsip_catalogues') || (array_key_exists('outreach_programs', $matchedTables) && $route->uri() === '{language}/bsip_outreach-program') || (array_key_exists('projects', $matchedTables) && $route->uri() === '{language}/bsip_research_activities') || (array_key_exists('lectures', $matchedTables) && $route->uri() === '{language}/bsip_lectures') || (array_key_exists('blogs', $matchedTables) && $route->uri() === '{language}/bsip_media_cell')
                ) {
                    $matchedPages[] = [
                        'uri'  => $uri,
                        'url'  => route($name, ['language' => $this->sharedData['language']]),
                        'name' => $name,
                    ];
                }

            }
        }

        return view('website.searchResult', $this->sharedData, compact('matchedPages'));
    }

}
