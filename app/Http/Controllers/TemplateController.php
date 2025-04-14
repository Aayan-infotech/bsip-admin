<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialLink;
use App\Models\ImportantLink;
use App\Models\UsefulLink;
use App\Models\Logo;
use App\Models\LanguageSetting;
use App\Models\ContactSetting;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $socialLinks = SocialLink::all();
        $importantLinks = ImportantLink::all();
        $usefulLinks = UsefulLink::all();

        return view('manageTemplate', compact('socialLinks', 'importantLinks', 'usefulLinks'));
    }

    public function store(Request $request)
    {
        // Handle storing logo, language, contact details, and links
        if ($request->has('social_links')) {
            foreach ($request->social_links as $link) {
                SocialLink::create($link);
            }
        }

        if ($request->has('important_links')) {
            foreach ($request->important_links as $link) {
                ImportantLink::create($link);
            }
        }

        if ($request->has('useful_links')) {
            foreach ($request->useful_links as $link) {
                UsefulLink::create($link);
            }
        }

        return redirect()->back()->with('success', 'Template updated successfully!');
    }

    public function storeLogo(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Check if a logo record already exists
        $logo = Logo::first();

        if ($logo) {
            // Update existing record
            if ($request->hasFile('logo')) {
                $fileName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('uploads/logos'), $fileName);
                $logo->logo = 'uploads/logos/' . $fileName;
            }
            $logo->title = $request->title;
            $logo->description = $request->description;
            $logo->save();
        } else {
            // Create a new record
            $fileName = null;
            if ($request->hasFile('logo')) {
                $fileName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('uploads/logos'), $fileName);
            }
            Logo::create([
                'logo' => $fileName ? 'uploads/logos/' . $fileName : null,
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }

        return response()->json(['message' => 'Logo saved successfully!']);
    }

    public function getLogo()
    {
        $logo = Logo::first();
        return response()->json($logo);
    }

    public function getLanguage()
    {
        $languages = LanguageSetting::all(); // Fetch all languages
        $selectedLanguage = LanguageSetting::where('status', 1)->first(); // Fetch the active language

        return response()->json([
            'languages' => $languages,
            'selectedLanguage' => $selectedLanguage,
        ]);
    }

    public function storeLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,hi',
        ]);

        // Set the status of all languages to 0
        LanguageSetting::query()->update(['status' => 0]);

        // Check if the language already exists
        $language = LanguageSetting::where('language', $request->language)->first();

        if ($language) {
            // Update existing language and set status to 1
            $language->update(['status' => 1]);
        } else {
            // Create a new language setting with status = 1
            LanguageSetting::create(['language' => $request->language, 'status' => 1]);
        }

        return response()->json(['message' => 'Language saved successfully!']);
    }

    public function getContact()
    {
        $contact = ContactSetting::first(); // Fetch the first contact setting
        return response()->json($contact);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
        ]);

        $contact = ContactSetting::first();

        if ($contact) {
            // Update existing contact details
            $contact->update([
                'address' => $request->address,
                'contact' => $request->contact,
                'email' => $request->email,
                'website' => $request->website,
            ]);
        } else {
            // Create new contact details
            ContactSetting::create([
                'address' => $request->address,
                'contact' => $request->contact,
                'email' => $request->email,
                'website' => $request->website,
            ]);
        }

        return response()->json(['message' => 'Contact details saved successfully!']);
    }

    public function getSocialLinks()
    {
        $socialLinks = SocialLink::all(); // Fetch all social links
        return response()->json($socialLinks);
    }

    public function storeSocialLinks(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $iconImagePath = null;
        if ($request->hasFile('icon_image')) {
            $iconImagePath = $request->file('icon_image')->store('uploads/social_links', 'public');
        }

        SocialLink::create([
            'icon_image' => $iconImagePath,
            'url' => $request->url,
        ]);

        return response()->json(['message' => 'Social link added successfully!']);
    }

    public function deleteSocialLink($id)
    {
        $socialLink = SocialLink::findOrFail($id);
        if ($socialLink->icon_image) {
            Storage::disk('public')->delete($socialLink->icon_image); // Delete the icon image
        }
        $socialLink->delete();

        return response()->json(['message' => 'Social link deleted successfully!']);
    }
    public function getImportantLinks()
    {
        $importantLinks = ImportantLink::all(); // Fetch all important links
        return response()->json($importantLinks);
    }

    public function storeImportantLinks(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        ImportantLink::create([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'url' => $request->url,
        ]);

        return response()->json(['message' => 'Important link added successfully!']);
    }

    public function deleteImportantLink($id)
    {
        $importantLink = ImportantLink::findOrFail($id);
        $importantLink->delete();

        return response()->json(['message' => 'Important link deleted successfully!']);
    }

    public function getUsefulLinks()
    {
        $usefulLinks = UsefulLink::all(); // Fetch all useful links
        return response()->json($usefulLinks);
    }

    public function storeUsefulLinks(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'hin_title' => 'required|string|max:255',
            'url' => 'required|url',
        ]);

        UsefulLink::create([
            'title' => $request->title,
            'hin_title' => $request->hin_title,
            'url' => $request->url,
        ]);

        return response()->json(['message' => 'Useful link added successfully!']);
    }

    public function deleteUsefulLink($id)
    {
        $usefulLink = UsefulLink::findOrFail($id);
        $usefulLink->delete();

        return response()->json(['message' => 'Useful link deleted successfully!']);
    }
}
