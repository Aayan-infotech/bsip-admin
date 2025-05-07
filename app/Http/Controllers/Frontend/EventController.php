<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use App\Models\ContactUs;
use App\Models\HeaderMenu;
use App\Models\ImportantLink;
use App\Models\LanguageSetting;
use App\Models\Logo;
use App\Models\MenuPage;
use App\Models\News;
use App\Models\OnlineFeedbackForm;
use App\Models\OutreachProgram;
use App\Models\Pastevents;
use App\Models\RajBhashaPortal;
use App\Models\SocialLink;
use App\Models\UsefulLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Blog;

class EventController extends Controller
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

    public function pastEvents(Request $request)
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

        // Fetch past events data
        $pastEvents = Pastevents::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($pastEvents);

        return view('website.event.pastEvents', $this->sharedData, compact('pastEvents'));
    }

    public function gallery(Request $request)
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

        return view('website.event.gallery', $this->sharedData);
    }

    public function lemIss2023(Request $request)
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

        return view('website.event.lemIss2023', $this->sharedData);
    }

    public function rajbhashaPatal(Request $request)
    {


        $rajBhashaEvents = RajBhashaPortal::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('website.event.rajbhashaPatal', $this->sharedData, compact('rajBhashaEvents'));
    }

    public function copyRightPolicy(Request $request)
    {
        return view('website.event.copyRightPolicy', $this->sharedData);
    }

    public function securityPolicy(Request $request)
    {
        return view('website.event.securityPolicy', $this->sharedData);
    }
    public function onlineFeedbackForm(Request $request)
    {
        return view('website.event.onlineFeedbackForm', $this->sharedData);
    }
    public function help(Request $request)
    {
        return view('website.event.help', $this->sharedData);
    }

    public function contactUs(Request $request)
    {
        return view('website.event.contactUs', $this->sharedData);
    }

    public function sitemap(Request $request)
    {
        return view('website.event.sitemap', $this->sharedData);
    }

    public function news(Request $request)
    {
        $news = News::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($news);
        return view('website.event.news', $this->sharedData, compact('news'));
    }

    public function outreachProgram(Request $request)
    {
        $outreachProgram = OutreachProgram::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('website.event.outreachProgram', $this->sharedData, compact('outreachProgram'));
    }

    public function feedbackForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|max:255',
            'comment'              => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);

        $feedbackForm = OnlineFeedbackForm::create($validatedData);
        if ($feedbackForm) {
            return response()->json(['success' => 'Feedback submitted successfully!'], 200);
        } else {
            return response()->json(['error' => 'Failed to submit feedback!'], 500);
        }
    }

    public function contactUsForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|max:255',
            'phone'                => 'required|string|max:255',
            'subject'              => 'required|string|max:255',
            'message'              => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response'),
        ]);

        $result = $response->json();

        if (! isset($result['success']) || ! $result['success'] || ! isset($result['score']) || $result['score'] < 0.5) {
            return response()->json(['error' => 'reCAPTCHA verification failed!'], 422);
        }

        $validatedData = $validator->validated();

        unset($validatedData['g-recaptcha-response']);

        $contactUs = ContactUs::create($validatedData);
        if ($contactUs) {
            return response()->json(['success' => 'Contact Us submitted successfully!'], 200);
        } else {
            return response()->json(['error' => 'Failed to submit Contact Us!'], 500);
        }
    }


    public function policies(Request $request)
    {
        return view('website.event.policies', $this->sharedData);
    }


    public function allBlogs(Request $request)
    {
        $language = $request->input('language', 'en');
        $this->sharedData['pageTitle'] = $language === 'hi' ? 'मीडिया सेल' : 'Media Cell';
        $allBlogs = Blog::where('status', 1)->paginate(12);
        $data = $allBlogs->items();

        return view('website.event.mediaCell', $this->sharedData, compact('allBlogs', 'data'));
    }

    public function show($lang, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $this->sharedData['pageTitle'] = $lang === 'hi' ? $blog->hin_title : $blog->title;
        return view('website.blog.show', $this->sharedData, compact('blog'));
    }


}
