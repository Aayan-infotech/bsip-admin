<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\SocialLink;
use App\Models\ImportantLink;
use App\Models\UsefulLink;
use App\Models\Logo;
use App\Models\ContactSetting;
use App\Models\LanguageSetting;
use App\Models\HeaderMenu;
use App\Models\Slider;

class FrontendController extends Controller
{
    protected $sharedData = [];

    public function __construct()
    {
        $this->sharedData['visitorCount'] = Cache::increment('visitor_count', 1);
        $this->sharedData['headerMenus'] = HeaderMenu::with(['menuPages'])->get();
        $this->sharedData['socialLinks'] = SocialLink::all();
        $this->sharedData['importantLinks'] = ImportantLink::all();
        $this->sharedData['usefulLinks'] = UsefulLink::all();
        $this->sharedData['logo'] = Logo::first();
        $this->sharedData['contact'] = ContactSetting::first();
    }

    public function home($language = '')
    {
        // Validate the language parameter
        $validLanguage = LanguageSetting::where('language', $language)->exists();
        if (!$validLanguage) {
            abort(404, 'Language not supported');
        }

        // Add the language to the shared data
        $this->sharedData['language'] = $language;
        $this->sharedData['sliders'] = Slider::where('is_active', 1)->orderBy('sequence', 'asc')->get();

        // Pass shared data to the view
        return view('website.home', $this->sharedData);
    }
}
