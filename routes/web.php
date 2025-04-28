<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Dashboard\HomeController;
// use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Users\UserController;
// use App\Http\Controllers\Modules\ModuleController;
// use App\Http\Controllers\Pages\PageController;
// use App\Http\Controllers\UserRightsController;
// use App\Http\Controllers\TemplateController;
// use App\Http\Controllers\HeaderMenuController;
// use App\Http\Controllers\MenuPageController;
// use Illuminate\Support\Facades\Cache;
// use App\Http\Controllers\Admin\WebContentManagementController;


use App\Http\Controllers\Admin\WebContentManagementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\FooterManagementController;
// use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HeaderMenuController;
use App\Http\Controllers\MenuPageController;
use App\Http\Controllers\Modules\ModuleController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\PublicationManagementController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\StaffManagementController;
use App\Http\Controllers\StructureManagementController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserRightsController;
use App\Http\Controllers\Users\UserController;
// use App\Models\LanguageSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Auth::routes();

//User Management
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {

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

    Route::get('/tenders', [WebContentManagementController::class, 'tendersIndex'])->name('tenders.index');
    Route::get('/tenders/data', [WebContentManagementController::class, 'gettendersData'])->name('tenders.data');
    Route::post('/tenders', [WebContentManagementController::class, 'storetender'])->name('tenders.store');
    Route::get('/tenders/edit/{id}', [WebContentManagementController::class, 'edittender'])->name('tenders.edit');
    Route::post('/tenders/update/{id}', [WebContentManagementController::class, 'updatetender'])->name('tenders.update');
    Route::post('/tenders/toggleStatus', [WebContentManagementController::class, 'toggletenderstatus'])->name('tenders.toggleStatus');
    Route::post('/tenders/toggleArchivedStatus', [WebContentManagementController::class, 'toggletenderArchivedStatus'])->name('tenders.toggleArchivedStatus');

    Route::get('/pastEvents', [WebContentManagementController::class, 'pastEventsIndex'])->name('pastEvents.index');
    Route::get('/pastEvents/data', [WebContentManagementController::class, 'getpastEventsData'])->name('pastEvents.data');
    Route::post('/pastEvents', [WebContentManagementController::class, 'storepastEvents'])->name('pastEvents.store');
    Route::get('/pastEvents/edit/{id}', [WebContentManagementController::class, 'editpastEvents'])->name('pastEvents.edit');
    Route::post('/pastEvents/update/{id}', [WebContentManagementController::class, 'updatepastEvents'])->name('pastEvents.update');
    Route::post('/pastEvents/toggleStatus', [WebContentManagementController::class, 'togglepastEventstatus'])->name('pastEvents.toggleStatus');
    Route::post('/pastEvents/toggleArchivedStatus', [WebContentManagementController::class, 'togglepastEventsArchivedStatus'])->name('pastEvents.toggleArchivedStatus');

    Route::get('/forms', [WebContentManagementController::class, 'formsIndex'])->name('forms.index');
    Route::get('/forms/data', [WebContentManagementController::class, 'getformsData'])->name('forms.data');
    Route::post('/forms', [WebContentManagementController::class, 'storeforms'])->name('forms.store');
    Route::get('/forms/edit/{id}', [WebContentManagementController::class, 'editforms'])->name('forms.edit');
    Route::post('/forms/update/{id}', [WebContentManagementController::class, 'updateforms'])->name('forms.update');
    Route::post('/forms/toggleStatus', [WebContentManagementController::class, 'toggleformsStatus'])->name('forms.toggleStatus');
    Route::post('/forms/toggleArchivedStatus', [WebContentManagementController::class, 'toggleformsArchivedStatus'])->name('forms.toggleArchivedStatus');

    Route::get('research_highlights', [ResearchController::class, 'index'])->name('research_highlights');
    Route::post('research_highlights/store', [ResearchController::class, 'store'])->name('research_highlights.store');
    Route::get('/research.highlights', [ResearchController::class, 'getResearchHighlights'])->name('research.highlights.list');
    Route::get('/research_highlights/edit/{id}', [ResearchController::class, 'edit'])->name('research_highlights.edit');
    Route::post('research_highlights/update/{id}', [ResearchController::class, 'update'])->name('research_highlights.update');
    Route::post('research_highlights/toggleStatus', [ResearchController::class, 'toggleStatus'])->name('research_highlights.toggleStatus');
    Route::post('research_highlights/toggleArchivedStatus', [ResearchController::class, 'toggleArchivedStatus'])->name('research_highlights.toggleArchivedStatus');

    Route::get('manage_lecturer', [ResearchController::class, 'manageLecturer'])->name('manage.lecturer');
    Route::post('manage_lecturer/store', [ResearchController::class, 'storeLecturer'])->name('manage.lecturer.store');
    Route::get('manage_lecturer/list', [ResearchController::class, 'getLecturers'])->name('manage.lecturer.list');
    Route::get('manage_lecturer/edit/{id}', [ResearchController::class, 'editLecturer'])->name('manage.lecturer.edit');
    Route::post('manage_lecturer/update/{id}', [ResearchController::class, 'updateLecturer'])->name('manage.lecturer.update');
    Route::post('manage_lecturer/toggleStatus', [ResearchController::class, 'toggleLecturerStatus'])->name('manage.lecturer.toggleStatus');

    Route::get('manage_lecture', [ResearchController::class, 'manageLecture'])->name('manage.lecture');
    Route::post('manage_lecture/store', [ResearchController::class, 'storeLecture'])->name('manage.lecture.store');
    Route::get('manage_lecture/list', [ResearchController::class, 'getLectures'])->name('manage.lecture.list');
    Route::get('manage_lecture/edit/{id}', [ResearchController::class, 'editLecture'])->name('manage.lecture.edit');
    Route::post('manage_lecture/update/{id}', [ResearchController::class, 'updateLecture'])->name('manage.lecture.update');
    Route::post('manage_lecture/toggleStatus', [ResearchController::class, 'toggleLectureStatus'])->name('manage.lecture.toggleStatus');

    Route::get('add_activities', [ResearchController::class, 'addActivities'])->name('add.activities');
    Route::post('add_activities/store', [ResearchController::class, 'storeActivities'])->name('add.activities.store');
    Route::get('add_activities/list', [ResearchController::class, 'getActivities'])->name('add.activities.list');
    Route::get('add_activities/edit/{id}', [ResearchController::class, 'editActivities'])->name('add.activities.edit');
    Route::post('add_activities/update/{id}', [ResearchController::class, 'updateActivities'])->name('add.activities.update');
    Route::post('add_activities/toggleStatus', [ResearchController::class, 'toggleActivitiesStatus'])->name('add.activities.toggleStatus');

    Route::get('manage_activities', [ResearchController::class, 'manageActivities'])->name('manage.activities');
    Route::post('manage_activities/store', [ResearchController::class, 'storeManageActivities'])->name('manage.activities.store');
    Route::get('manage_activities/list', [ResearchController::class, 'getManageActivities'])->name('manage.activities.list');
    Route::get('manage_activities/edit/{id}', [ResearchController::class, 'editManageActivities'])->name('manage.activities.edit');
    Route::post('manage_activities/update/{id}', [ResearchController::class, 'updateManageActivities'])->name('manage.activities.update');
    Route::post('manage_activities/toggleStatus', [ResearchController::class, 'toggleManageActivitiesStatus'])->name('manage.activities.toggleStatus');

    Route::get('manage_projects', [ResearchController::class, 'manageProjects'])->name('manage.projects');
    Route::post('manage_projects/store', [ResearchController::class, 'storeManageProjects'])->name('manage.projects.store');
    Route::get('manage_projects/list', [ResearchController::class, 'getManageProjects'])->name('manage.projects.list');
    Route::get('manage_projects/edit/{id}', [ResearchController::class, 'editManageProjects'])->name('manage.projects.edit');
    Route::post('manage_projects/update/{id}', [ResearchController::class, 'updateManageProjects'])->name('manage.projects.update');
    Route::post('manage_projects/toggleStatus', [ResearchController::class, 'toggleManageProjectsStatus'])->name('manage.projects.toggleStatus');

    Route::get('past_heads', [StructureManagementController::class, 'pastHeads'])->name('past.heads');
    Route::post('past_heads/store', [StructureManagementController::class, 'storePastHeads'])->name('past.heads.store');
    Route::get('past_heads/list', [StructureManagementController::class, 'getPastHeads'])->name('past.heads.list');
    Route::get('past_heads/edit/{id}', [StructureManagementController::class, 'editPastHeads'])->name('past.heads.edit');
    Route::post('past_heads/update/{id}', [StructureManagementController::class, 'updatePastHeads'])->name('past.heads.update');
    Route::post('past_heads/toggleStatus', [StructureManagementController::class, 'togglePastHeadsStatus'])->name('past.heads.toggleStatus');

    Route::get('past_directors', [StructureManagementController::class, 'pastDirectors'])->name('past.directors');
    Route::post('past_directors/store', [StructureManagementController::class, 'storePastDirectors'])->name('past.directors.store');
    Route::get('past_directors/list', [StructureManagementController::class, 'getPastDirectors'])->name('past.directors.list');
    Route::get('past_directors/edit/{id}', [StructureManagementController::class, 'editPastDirectors'])->name('past.directors.edit');
    Route::post('past_directors/update/{id}', [StructureManagementController::class, 'updatePastDirectors'])->name('past.directors.update');
    Route::post('past_directors/toggleStatus', [StructureManagementController::class, 'togglePastDirectorsStatus'])->name('past.directors.toggleStatus');

    Route::get('annual_report', [PublicationManagementController::class, 'annualReport'])->name('annual.report');
    Route::post('annual_report/store', [PublicationManagementController::class, 'storeAnnualReport'])->name('annual.report.store');
    Route::get('annual_report/list', [PublicationManagementController::class, 'getAnnualReport'])->name('annual.report.list');
    Route::get('annual_report/edit/{id}', [PublicationManagementController::class, 'editAnnualReport'])->name('annual.report.edit');
    Route::post('annual_report/update/{id}', [PublicationManagementController::class, 'updateAnnualReport'])->name('annual.report.update');
    Route::post('annual_report/toggleStatus', [PublicationManagementController::class, 'toggleAnnualReportStatus'])->name('annual.report.toggleStatus');
    Route::post('annual_report/toggleArchivedStatus', [PublicationManagementController::class, 'toggleAnnualReportArchivedStatus'])->name('annual.report.toggleArchivedStatus');

    Route::get('monthly_report', [PublicationManagementController::class, 'monthlyReport'])->name('monthly.report');
    Route::post('monthly_report/store', [PublicationManagementController::class, 'storeMonthlyReport'])->name('monthly.report.store');
    Route::get('monthly_report/list', [PublicationManagementController::class, 'getMonthlyReport'])->name('monthly.report.list');
    Route::get('monthly_report/edit/{id}', [PublicationManagementController::class, 'editMonthlyReport'])->name('monthly.report.edit');
    Route::post('monthly_report/update/{id}', [PublicationManagementController::class, 'updateMonthlyReport'])->name('monthly.report.update');
    Route::post('monthly_report/toggleStatus', [PublicationManagementController::class, 'toggleMonthlyReportStatus'])->name('monthly.report.toggleStatus');
    Route::post('monthly_report/toggleArchivedStatus', [PublicationManagementController::class, 'toggleMonthlyReportArchivedStatus'])->name('monthly.report.toggleArchivedStatus');

    Route::get('Institute_catalogue', [PublicationManagementController::class, 'instituteCatalogue'])->name('institute.catalogue');
    Route::post('Institute_catalogue/store', [PublicationManagementController::class, 'storeInstituteCatalogue'])->name('institute.catalogue.store');
    Route::get('Institute_catalogue/list', [PublicationManagementController::class, 'getInstituteCatalogue'])->name('institute.catalogue.list');
    Route::get('Institute_catalogue/edit/{id}', [PublicationManagementController::class, 'editInstituteCatalogue'])->name('institute.catalogue.edit');
    Route::post('Institute_catalogue/update/{id}', [PublicationManagementController::class, 'updateInstituteCatalogue'])->name('institute.catalogue.update');
    Route::post('Institute_catalogue/toggleStatus', [PublicationManagementController::class, 'toggleInstituteCatalogueStatus'])->name('institute.catalogue.toggleStatus');
    Route::post('Institute_catalogue/toggleArchivedStatus', [PublicationManagementController::class, 'toggleInstituteCatalogueArchivedStatus'])->name('institute.catalogue.toggleArchivedStatus');

    Route::get('manage_news', [FooterManagementController::class, 'manageNews'])->name('manage.news');
    Route::post('manage_news/store', [FooterManagementController::class, 'storeNews'])->name('manage.news.store');
    Route::get('manage_news/list', [FooterManagementController::class, 'getNews'])->name('manage.news.list');
    Route::get('manage_news/edit/{id}', [FooterManagementController::class, 'editNews'])->name('manage.news.edit');
    Route::post('manage_news/update/{id}', [FooterManagementController::class, 'updateNews'])->name('manage.news.update');
    Route::post('manage_news/toggleStatus', [FooterManagementController::class, 'toggleNewsStatus'])->name('manage.news.toggleStatus');
    Route::post('manage_news/toggleArchivedStatus', [FooterManagementController::class, 'toggleNewsArchivedStatus'])->name('manage.news.toggleArchivedStatus');

    // OutReach Management
    Route::get('outreach_program', [FooterManagementController::class, 'outreachProgram'])->name('outreach.program');
    Route::post('outreach_program/store', [FooterManagementController::class, 'storeOutreachProgram'])->name('outreach.program.store');
    Route::get('outreach_program/list', [FooterManagementController::class, 'getOutreachProgram'])->name('outreach.program.list');
    Route::get('outreach_program/edit/{id}', [FooterManagementController::class, 'editOutreachProgram'])->name('outreach.program.edit');
    Route::post('outreach_program/update/{id}', [FooterManagementController::class, 'updateOutreachProgram'])->name('outreach.program.update');
    Route::post('outreach_program/toggleStatus', [FooterManagementController::class, 'toggleOutreachProgramStatus'])->name('outreach.program.toggleStatus');
    Route::post('outreach_program/toggleArchivedStatus', [FooterManagementController::class, 'toggleOutreachProgramArchivedStatus'])->name('outreach.program.toggleArchivedStatus');

    // Rajbhasha Management
    Route::get('bsip_rajbhasha_portal', [FooterManagementController::class, 'bsipRajbhashaPortal'])->name('bsip.rajbhasha.portal');
    Route::post('bsip_rajbhasha_portal/store', [FooterManagementController::class, 'storeBsipRajbhashaPortal'])->name('bsip.rajbhasha.portal.store');
    Route::get('bsip_rajbhasha_portal/list', [FooterManagementController::class, 'getBsipRajbhashaPortal'])->name('bsip.rajbhasha.portal.list');
    Route::get('bsip_rajbhasha_portal/edit/{id}', [FooterManagementController::class, 'editBsipRajbhashaPortal'])->name('bsip.rajbhasha.portal.edit');
    Route::post('bsip_rajbhasha_portal/update/{id}', [FooterManagementController::class, 'updateBsipRajbhashaPortal'])->name('bsip.rajbhasha.portal.update');
    Route::post('bsip_rajbhasha_portal/toggleStatus', [FooterManagementController::class, 'toggleBsipRajbhashaPortalStatus'])->name('bsip.rajbhasha.portal.toggleStatus');
    Route::post('bsip_rajbhasha_portal/toggleArchivedStatus', [FooterManagementController::class, 'toggleBsipRajbhashaPortalArchivedStatus'])->name('bsip.rajbhasha.portal.toggleArchivedStatus');

    // Geo Hertiage Management

    Route::get('bsip_geo_heritage', [FooterManagementController::class, 'bsipGeoHeritage'])->name('bsip.geo.heritage');
    Route::post('bsip_geo_heritage/store', [FooterManagementController::class, 'storeBsipGeoHeritage'])->name('bsip.geo.heritage.store');
    Route::get('bsip_geo_heritage/list', [FooterManagementController::class, 'getBsipGeoHeritage'])->name('bsip.geo.heritage.list');
    Route::get('bsip_geo_heritage/edit/{id}', [FooterManagementController::class, 'editBsipGeoHeritage'])->name('bsip.geo.heritage.edit');
    Route::post('bsip_geo_heritage/update/{id}', [FooterManagementController::class, 'updateBsipGeoHeritage'])->name('bsip.geo.heritage.update');
    Route::post('bsip_geo_heritage/toggleStatus', [FooterManagementController::class, 'toggleBsipGeoHeritageStatus'])->name('bsip.geo.heritage.toggleStatus');
    Route::post('bsip_geo_heritage/toggleArchivedStatus', [FooterManagementController::class, 'toggleBsipGeoHeritageArchivedStatus'])->name('bsip.geo.heritage.toggleArchivedStatus');


    // Staff Management
    Route::get('staff_sub_category', [StaffManagementController::class, 'staffSubCategory'])->name('staff.sub.category');
    Route::post('staff_sub_category/store', [StaffManagementController::class, 'storeStaffSubCategory'])->name('staff.sub.category.store');
    Route::get('staff_sub_category/list', [StaffManagementController::class, 'getStaffSubCategory'])->name('staff.sub.category.list');
    Route::get('staff_sub_category/edit/{id}', [StaffManagementController::class, 'editStaffSubCategory'])->name('staff.sub.category.edit');
    Route::post('staff_sub_category/update/{id}', [StaffManagementController::class, 'updateStaffSubCategory'])->name('staff.sub.category.update');
    Route::post('staff_sub_category/toggleStatus', [StaffManagementController::class, 'toggleStaffSubCategoryStatus'])->name('staff.sub.category.toggleStatus');



    // Staff management
    Route::get('staff_master', [StaffManagementController::class, 'staffMaster'])->name('staff.master');
    Route::post('staff_master/store', [StaffManagementController::class, 'storeStaffMaster'])->name('staff.master.store');
    Route::get('staff_master/list', [StaffManagementController::class, 'getStaffMaster'])->name('staff.master.list');
    Route::get('staff_master/edit/{id}', [StaffManagementController::class, 'editStaffMaster'])->name('staff.master.edit');
    Route::post('staff_master/update/{id}', [StaffManagementController::class, 'updateStaffMaster'])->name('staff.master.update');
    Route::post('staff_master/toggleStatus', [StaffManagementController::class, 'toggleStaffMasterStatus'])->name('staff.master.toggleStatus');
    Route::post('staff_master/toggleArchivedStatus', [StaffManagementController::class, 'toggleStaffMasterArchivedStatus'])->name('staff.master.toggleArchivedStatus');
    Route::get('staff_master/sub_category', [StaffManagementController::class, 'getSubCategoryofCategory'])->name('staff.sub_category');


    //
    Route::get('scientist_management', [StaffManagementController::class, 'scientistManagement'])->name('scientist.management');
    Route::post('scientist_management/staffDetails', [StaffManagementController::class, 'getStaffDetails'])->name('scientist.management.staffDetails');
    Route::post('scientist_management/updateProfileImage/{id}', [StaffManagementController::class, 'updateProfileImage'])->name('scientist.management.updateProfileImage');
    Route::post('scientist_management/updateAccountDetails/{id}', [StaffManagementController::class, 'updateAccountDetails'])->name('scientist.management.updateAccountDetails');
    Route::post('scientist_management/addCollaboration', [StaffManagementController::class, 'addCollaboration'])->name('scientist.management.addCollaboration');
    Route::post('scientist_management/removeCollaboration', [StaffManagementController::class, 'removeCollaboration'])->name('scientist.management.removeCollaboration');
    Route::post('scientist_management/addProfessionalService', [StaffManagementController::class, 'addProfessionalService'])->name('addProfessionalService');
    Route::post('scientist_management/removeProfessionalService', [StaffManagementController::class, 'removeProfessionalService'])->name('removeProfessionalService');
    Route::post('scientist_management/addFellowship', [StaffManagementController::class, 'addFellowship'])->name('addFellowship');
    Route::post('scientist_management/removeFellowship', [StaffManagementController::class, 'removeFellowship'])->name('removeFellowship');
    Route::post('scientist_management/addAward', [StaffManagementController::class, 'addAward'])->name('addAward');
    Route::post('scientist_management/removeAward', [StaffManagementController::class, 'removeAward'])->name('removeAward');


    Route::get('manage_saif', [StaffManagementController::class, 'manageSaif'])->name('manage.saif');
    Route::post('manage_saif/store', [StaffManagementController::class, 'storeSaif'])->name('manage.saif.store');
    Route::get('manage_saif/list', [StaffManagementController::class, 'getSaif'])->name('manage.saif.list');
    Route::get('manage_saif/edit/{id}', [StaffManagementController::class, 'editSaif'])->name('manage.saif.edit');
    Route::post('manage_saif/update/{id}', [StaffManagementController::class, 'updateSaif'])->name('manage.saif.update');
    Route::post('manage_saif/toggleStatus', [StaffManagementController::class, 'toggleSaifStatus'])->name('manage.saif.toggleStatus');
    Route::post('manage_saif/toggleArchivedStatus', [StaffManagementController::class, 'toggleSaifArchivedStatus'])->name('manage.saif.toggleArchivedStatus');
});
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/adminDashboard', [HomeController::class, 'index'])->name('home');


// Route::get('/users', [UserController::class, 'index'])->name('users');
// Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
// Route::get('/list', [UserController::class, 'getUsers'])->name('users.list'); // For Yajra DataTable
// Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
// Route::post('/users/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
// Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');

// Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
// Route::get('/modules/list', [ModuleController::class, 'getModules'])->name('modules.list');
// Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store');
// Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit');
// Route::post('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update');
// Route::post('/modules/updateStatus', [ModuleController::class, 'updateStatus'])->name('modules.updateStatus');

// Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
// Route::get('/pages/list', [PageController::class, 'getPages'])->name('pages.list');
// Route::post('/pages/store', [PageController::class, 'store'])->name('pages.store');
// Route::get('/pages/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
// Route::post('/pages/update/{id}', [PageController::class, 'update'])->name('pages.update');
// Route::post('/pages/updateStatus', [PageController::class, 'updateStatus'])->name('pages.updateStatus');

// Route::get('/user-rights', [UserRightsController::class, 'index'])->name('userRights.index');
// Route::post('/user-rights/fetch', [UserRightsController::class, 'fetchUserRights'])->name('userRights.fetch');
// Route::post('/user-rights/update', [UserRightsController::class, 'updateUserRights'])->name('userRights.update');

// //Template Management
// Route::get('/manageTemplate', [TemplateController::class, 'index'])->name('template.index');
// Route::post('/template/store', [TemplateController::class, 'store'])->name('template.store');
// Route::post('/template/update', [TemplateController::class, 'update'])->name('template.update');
// Route::post('/template/logo/store', [TemplateController::class, 'storeLogo'])->name('template.logo.store');
// Route::get('/template/logo', [TemplateController::class, 'getLogo'])->name('template.logo.get');
// Route::get('/template/language', [TemplateController::class, 'getLanguage'])->name('template.language.get');
// Route::post('/template/language', [TemplateController::class, 'storeLanguage'])->name('template.language.store');
// Route::get('/template/contact', [TemplateController::class, 'getContact'])->name('template.contact.get');
// Route::post('/template/contact', [TemplateController::class, 'storeContact'])->name('template.contact.store');
// Route::get('/template/social-links', [TemplateController::class, 'getSocialLinks'])->name('template.socialLinks.get');
// Route::post('/template/social-links', [TemplateController::class, 'storeSocialLinks'])->name('template.socialLinks.store');
// Route::delete('/template/social-links/{id}', [TemplateController::class, 'deleteSocialLink'])->name('template.socialLinks.delete');
// Route::get('/template/important-links', [TemplateController::class, 'getImportantLinks'])->name('template.importantLinks.get');
// Route::post('/template/important-links', [TemplateController::class, 'storeImportantLinks'])->name('template.importantLinks.store');
// Route::delete('/template/important-links/{id}', [TemplateController::class, 'deleteImportantLink'])->name('template.importantLinks.delete');
// Route::get('/template/useful-links', [TemplateController::class, 'getUsefulLinks'])->name('template.usefulLinks.get');
// Route::post('/template/useful-links', [TemplateController::class, 'storeUsefulLinks'])->name('template.usefulLinks.store');
// Route::delete('/template/useful-links/{id}', [TemplateController::class, 'deleteUsefulLink'])->name('template.usefulLinks.delete');

// Route::get('/headerMenu', [HeaderMenuController::class, 'index'])->name('headerMenu.index');
// Route::post('/headerMenu', [HeaderMenuController::class, 'store'])->name('headerMenu.store');
// Route::get('/headerMenu/{id}/edit', [HeaderMenuController::class, 'edit'])->name('headerMenu.edit');
// Route::put('/headerMenu/{id}', [HeaderMenuController::class, 'update'])->name('headerMenu.update');
// Route::post('/headerMenu/{id}/toggleStatus', [HeaderMenuController::class, 'toggleStatus'])->name('headerMenu.toggleStatus');

// Route::get('/menuPages', [MenuPageController::class, 'index'])->name('menuPages.index');
// Route::post('/menuPages', [MenuPageController::class, 'store'])->name('menuPages.store');
// Route::get('/menuPages/{id}/edit', [MenuPageController::class, 'edit'])->name('menuPages.edit');
// Route::put('/menuPages/{id}', [MenuPageController::class, 'update'])->name('menuPages.update');
// Route::post('/menuPages/{id}/toggleStatus', [MenuPageController::class, 'toggleStatus'])->name('menuPages.toggleStatus');

// // Web Content Management
// Route::get('/sliders', [WebContentManagementController::class, 'index'])->name('sliders.index');
// Route::post('/sliders', [WebContentManagementController::class, 'store'])->name('sliders.store');
// Route::get('/sliders/data', [WebContentManagementController::class, 'getData'])->name('sliders.data');
// Route::get('/sliders/edit/{id}', [WebContentManagementController::class, 'edit'])->name('sliders.edit');
// Route::post('/sliders/update/{id}', [WebContentManagementController::class, 'update'])->name('sliders.update');
// Route::post('/sliders/updateStatus', [WebContentManagementController::class, 'toggleStatus'])->name('sliders.updateStatus');

// Route::get('/notices', [WebContentManagementController::class, 'noticesIndex'])->name('notices.index');
// Route::get('/notices/data', [WebContentManagementController::class, 'getNoticesData'])->name('notices.data');
// Route::post('/notices', [WebContentManagementController::class, 'storeNotice'])->name('notices.store');
// Route::get('/notices/edit/{id}', [WebContentManagementController::class, 'editNotice'])->name('notices.edit');
// Route::post('/notices/update/{id}', [WebContentManagementController::class, 'updateNotice'])->name('notices.update');
// Route::post('/notices/toggleStatus', [WebContentManagementController::class, 'toggleNoticeStatus'])->name('notices.toggleStatus');
// Route::post('/notices/archiveExpired', [WebContentManagementController::class, 'archiveExpiredNotices'])->name('notices.archiveExpired');
// Route::post('/notices/toggleArchivedStatus', [WebContentManagementController::class, 'toggleArchivedStatus'])->name('notices.toggleArchivedStatus');

// Route::get('/careers', [WebContentManagementController::class, 'careersIndex'])->name('careers.index');
// Route::get('/careers/data', [WebContentManagementController::class, 'getCareersData'])->name('careers.data');
// Route::post('/careers', [WebContentManagementController::class, 'storeCareer'])->name('careers.store');
// Route::get('/careers/edit/{id}', [WebContentManagementController::class, 'editCareer'])->name('careers.edit');
// Route::post('/careers/update/{id}', [WebContentManagementController::class, 'updateCareer'])->name('careers.update');
// Route::post('/careers/toggleStatus', [WebContentManagementController::class, 'toggleCareerStatus'])->name('careers.toggleStatus');
// Route::post('/careers/toggleArchivedStatus', [WebContentManagementController::class, 'toggleCareerArchivedStatus'])->name('careers.toggleArchivedStatus');

// Route::get('/tenders', [WebContentManagementController::class, 'tendersIndex'])->name('tenders.index');
// Route::get('/tenders/data', [WebContentManagementController::class, 'gettendersData'])->name('tenders.data');
// Route::post('/tenders', [WebContentManagementController::class, 'storetender'])->name('tenders.store');
// Route::get('/tenders/edit/{id}', [WebContentManagementController::class, 'edittender'])->name('tenders.edit');
// Route::post('/tenders/update/{id}', [WebContentManagementController::class, 'updatetender'])->name('tenders.update');
// Route::post('/tenders/toggleStatus', [WebContentManagementController::class, 'toggletenderstatus'])->name('tenders.toggleStatus');
// Route::post('/tenders/toggleArchivedStatus', [WebContentManagementController::class, 'toggletenderArchivedStatus'])->name('tenders.toggleArchivedStatus');

// Route::get('/pastEvents', [WebContentManagementController::class, 'pastEventsIndex'])->name('pastEvents.index');
// Route::get('/pastEvents/data', [WebContentManagementController::class, 'getpastEventsData'])->name('pastEvents.data');
// Route::post('/pastEvents', [WebContentManagementController::class, 'storepastEvents'])->name('pastEvents.store');
// Route::get('/pastEvents/edit/{id}', [WebContentManagementController::class, 'editpastEvents'])->name('pastEvents.edit');
// Route::post('/pastEvents/update/{id}', [WebContentManagementController::class, 'updatepastEvents'])->name('pastEvents.update');
// Route::post('/pastEvents/toggleStatus', [WebContentManagementController::class, 'togglepastEventstatus'])->name('pastEvents.toggleStatus');
// Route::post('/pastEvents/toggleArchivedStatus', [WebContentManagementController::class, 'togglepastEventsArchivedStatus'])->name('pastEvents.toggleArchivedStatus');

// Route::get('/forms', [WebContentManagementController::class, 'formsIndex'])->name('forms.index');
// Route::get('/forms/data', [WebContentManagementController::class, 'getformsData'])->name('forms.data');
// Route::post('/forms', [WebContentManagementController::class, 'storeforms'])->name('forms.store');
// Route::get('/forms/edit/{id}', [WebContentManagementController::class, 'editforms'])->name('forms.edit');
// Route::post('/forms/update/{id}', [WebContentManagementController::class, 'updateforms'])->name('forms.update');
// Route::post('/forms/toggleStatus', [WebContentManagementController::class, 'toggleformsStatus'])->name('forms.toggleStatus');
// Route::post('/forms/toggleArchivedStatus', [WebContentManagementController::class, 'toggleformsArchivedStatus'])->name('forms.toggleArchivedStatus');



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
    Route::get('/bsip_notice_and_updates_all', [FrontendController::class, 'noticesSection'])->name('frontend.notices');
    Route::get('/bsip_download_forms', [FrontendController::class, 'formsSection'])->name('frontend.forms');
    Route::get('/bsip_rti', [FrontendController::class, 'rtiSection'])->name('frontend.rti');
    Route::get('/bsip_ic_committee', [FrontendController::class, 'icCommitteeSection'])->name('frontend.icCommittee');
    Route::get('/bsip_admission_to_phd', [FrontendController::class, 'admissionToPhdSection'])->name('frontend.admissionToPhd');
    Route::get('/bsip_master_dissertation_program', [FrontendController::class, 'disserationSection'])->name('frontend.disseration');
    Route::get('/bsip_short_term_training_program', [FrontendController::class, 'trainingSection'])->name('frontend.training');
    Route::get('/LEM_ISS_2023', [FrontendController::class, 'lemIssSection'])->name('frontend.lemIss');


    Route::get('/bsip_institute_history', [FrontendController::class, 'historySection'])->name('frontend.history');
    Route::get('/bsip_Prof_birbal_Sahni_background', [FrontendController::class, 'parentalBackgroundSection'])->name('frontend.parentalBackground');
    Route::get('/bsip_Prof_birbal_Sahni_education_career', [FrontendController::class, 'educationCareerSection'])->name('frontend.educationCareer');
    Route::get('/bsip_Prof_birbal_Sahni_General_interest', [FrontendController::class, 'generalInterestSection'])->name('frontend.generalInterest');
    Route::get('/bsip_Prof_birbal_Sahni_youth_incident', [FrontendController::class, 'incidentofYouthSection'])->name('frontend.incidentofYouth');
    Route::get('/bsip_contribution_living', [FrontendController::class, 'livingSection'])->name('frontend.living');
    Route::get('/bsip_contribution_fossil', [FrontendController::class, 'fossilSection'])->name('frontend.fossil');
    Route::get('/bsip_contribution_geology', [FrontendController::class, 'geologySection'])->name('frontend.geology');
    Route::get('/bsip_institute_honours', [FrontendController::class, 'honoursSection'])->name('frontend.honours');
    Route::get('/bsip_institute_mrs_savitri_sahni', [FrontendController::class, 'mrsSavitriSahniSection'])->name('frontend.mrsSavitriSahni');
    Route::get('/bsip_career', [FrontendController::class, 'bsip_careerSection'])->name('frontend.bsip_career');
    Route::get('/bsip_tenders', [FrontendController::class, 'bsip_tendersSection'])->name('frontend.bsip_tenders');
});
