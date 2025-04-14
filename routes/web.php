<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\UserRightsController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HeaderMenuController;
use App\Http\Controllers\MenuPageController;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Admin\WebContentManagementController;

Auth::routes();

//User Management
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/adminDashboard', [HomeController::class, 'index'])->name('home');


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/list', [UserController::class, 'getUsers'])->name('users.list'); // For Yajra DataTable
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
Route::get('/modules/list', [ModuleController::class, 'getModules'])->name('modules.list');
Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit');
Route::post('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update');
Route::post('/modules/updateStatus', [ModuleController::class, 'updateStatus'])->name('modules.updateStatus');

Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/list', [PageController::class, 'getPages'])->name('pages.list');
Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
Route::post('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
Route::post('/pages/updateStatus', [PageController::class, 'updateStatus'])->name('pages.updateStatus');

Route::get('/user-rights', [UserRightsController::class, 'index'])->name('userRights.index');
Route::post('/user-rights/fetch', [UserRightsController::class, 'fetchUserRights'])->name('userRights.fetch');
Route::post('/user-rights/update', [UserRightsController::class, 'updateUserRights'])->name('userRights.update');

//Template Management
Route::get('/manageTemplate', [TemplateController::class, 'index'])->name('template.index');
Route::post('/template/store', [TemplateController::class, 'store'])->name('template.store');
Route::post('/template/update', [TemplateController::class, 'update'])->name('template.update');
Route::post('/template/logo/store', [TemplateController::class, 'storeLogo'])->name('template.logo.store');
Route::get('/template/logo', [TemplateController::class, 'getLogo'])->name('template.logo.get');
Route::get('/template/language', [TemplateController::class, 'getLanguage'])->name('template.language.get');
Route::post('/template/language', [TemplateController::class, 'storeLanguage'])->name('template.language.store');
Route::get('/template/contact', [TemplateController::class, 'getContact'])->name('template.contact.get');
Route::post('/template/contact', [TemplateController::class, 'storeContact'])->name('template.contact.store');
Route::get('/template/social-links', [TemplateController::class, 'getSocialLinks'])->name('template.socialLinks.get');
Route::post('/template/social-links', [TemplateController::class, 'storeSocialLinks'])->name('template.socialLinks.store');
Route::delete('/template/social-links/{id}', [TemplateController::class, 'deleteSocialLink'])->name('template.socialLinks.delete');
Route::get('/template/important-links', [TemplateController::class, 'getImportantLinks'])->name('template.importantLinks.get');
Route::post('/template/important-links', [TemplateController::class, 'storeImportantLinks'])->name('template.importantLinks.store');
Route::delete('/template/important-links/{id}', [TemplateController::class, 'deleteImportantLink'])->name('template.importantLinks.delete');
Route::get('/template/useful-links', [TemplateController::class, 'getUsefulLinks'])->name('template.usefulLinks.get');
Route::post('/template/useful-links', [TemplateController::class, 'storeUsefulLinks'])->name('template.usefulLinks.store');
Route::delete('/template/useful-links/{id}', [TemplateController::class, 'deleteUsefulLink'])->name('template.usefulLinks.delete');

Route::get('/headerMenu', [HeaderMenuController::class, 'index'])->name('headerMenu.index');
Route::post('/headerMenu', [HeaderMenuController::class, 'store'])->name('headerMenu.store');
Route::get('/headerMenu/{id}/edit', [HeaderMenuController::class, 'edit'])->name('headerMenu.edit');
Route::put('/headerMenu/{id}', [HeaderMenuController::class, 'update'])->name('headerMenu.update');
Route::post('/headerMenu/{id}/toggleStatus', [HeaderMenuController::class, 'toggleStatus'])->name('headerMenu.toggleStatus');

Route::get('/menuPages', [MenuPageController::class, 'index'])->name('menuPages.index');
Route::post('/menuPages', [MenuPageController::class, 'store'])->name('menuPages.store');
Route::get('/menuPages/{id}/edit', [MenuPageController::class, 'edit'])->name('menuPages.edit');
Route::put('/menuPages/{id}', [MenuPageController::class, 'update'])->name('menuPages.update');
Route::post('/menuPages/{id}/toggleStatus', [MenuPageController::class, 'toggleStatus'])->name('menuPages.toggleStatus');

// Web Content Management
Route::get('/sliders', [WebContentManagementController::class, 'index'])->name('sliders.index');
Route::post('/sliders', [WebContentManagementController::class, 'store'])->name('sliders.store');
Route::get('/sliders/data', [WebContentManagementController::class, 'getData'])->name('sliders.data');
Route::get('/sliders/edit/{id}', [WebContentManagementController::class, 'edit'])->name('sliders.edit');
Route::post('/sliders/update/{id}', [WebContentManagementController::class, 'update'])->name('sliders.update');
Route::post('/sliders/updateStatus', [WebContentManagementController::class, 'toggleStatus'])->name('sliders.updateStatus');

Route::get('/notices', [WebContentManagementController::class, 'noticesIndex'])->name('notices.index');
Route::get('/notices/data', [WebContentManagementController::class, 'getNoticesData'])->name('notices.data');
Route::post('/notices', [WebContentManagementController::class, 'storeNotice'])->name('notices.store');
Route::get('/notices/edit/{id}', [WebContentManagementController::class, 'editNotice'])->name('notices.edit');
Route::post('/notices/update/{id}', [WebContentManagementController::class, 'updateNotice'])->name('notices.update');
Route::post('/notices/toggleStatus', [WebContentManagementController::class, 'toggleNoticeStatus'])->name('notices.toggleStatus');
Route::post('/notices/archiveExpired', [WebContentManagementController::class, 'archiveExpiredNotices'])->name('notices.archiveExpired');
Route::post('/notices/toggleArchivedStatus', [WebContentManagementController::class, 'toggleArchivedStatus'])->name('notices.toggleArchivedStatus');

Route::get('/careers', [WebContentManagementController::class, 'careersIndex'])->name('careers.index');
Route::get('/careers/data', [WebContentManagementController::class, 'getCareersData'])->name('careers.data');
Route::post('/careers', [WebContentManagementController::class, 'storeCareer'])->name('careers.store');
Route::get('/careers/edit/{id}', [WebContentManagementController::class, 'editCareer'])->name('careers.edit');
Route::post('/careers/update/{id}', [WebContentManagementController::class, 'updateCareer'])->name('careers.update');
Route::post('/careers/toggleStatus', [WebContentManagementController::class, 'toggleCareerStatus'])->name('careers.toggleStatus');
Route::post('/careers/toggleArchivedStatus', [WebContentManagementController::class, 'toggleCareerArchivedStatus'])->name('careers.toggleArchivedStatus');
// Route::get('/', function () { return view('dashboard'); })->name('dashboard')->middleware('auth');




















use App\Models\LanguageSetting;
use App\Http\Controllers\FrontendController;

Route::get('/initialize-visitor-count', function () {
    Cache::put('visitor_count', 0);
    return 'Visitor count initialized to 0';
});

Route::get('/', function () {
    $activeLanguage = LanguageSetting::where('status', 1)->first();

    if ($activeLanguage) {
        return redirect('/' . $activeLanguage->language);
    }

    return redirect('/en');
});

Route::group(['prefix' => '{language}', 'where' => ['language' => 'en|hi']], function () {
    Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
});

