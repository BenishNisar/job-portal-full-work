<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\HowItWorksController;

use App\Http\Controllers\TermsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogsDetailsController;
use App\Http\Controllers\AboutController;

use App\Http\Controllers\AccountLoginController;


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\BackendBlogController;
use App\Http\Controllers\PatientConsentBackendController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountSettingsController;
use App\Http\Controllers\BackendDisciplinesController;
use App\Http\Controllers\BackendJobsController;

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InnerBannerController;
use App\Http\Controllers\ContactSettingController;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FrontendProfileController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\NeedHelpController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\ServiceController;

use Illuminate\Support\Facades\DB;




/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get("/", [WelcomeController::class, "index"])->name("Home.welcome");
// Route::post("/", [WelcomeController::class, "store"])->name("Home.welcome.store");

Route::get("/contact-us", [ContactController::class, "index"])->name("Home.contact-us");
Route::post("/contact-us", [ContactController::class, "store"])->name("Home.contact-us.store");

Route::get("/privacy-policy", [PrivacyPolicyController::class, "index"])->name("Home.privacy-policy");
Route::get("/terms-of-service", [ServiceController::class, "index"])->name("Home.terms-of-service");


Route::get("/how-it-works", [HowItWorksController::class, "index"])->name("Home.how-it-works");

Route::get("/terms", [TermsController::class, "index"])->name("Home.terms");
Route::get("/blogs", [BlogsController::class, "index"])->name("Home.blogs");
Route::get("/blogs_details/{slug}", [BlogsDetailsController::class, "show"])->name("Home.blogs_details");
Route::get("/frontend-blog-search", [BlogsController::class, "search"])->name("frontend.blog.search");
Route::get("/about", [AboutController::class, "index"])->name("Home.about");
Route::get('/jobs', [JobsController::class, 'index'])->name('Home.jobs');
Route::post('/jobs/{job}/toggle-save', [JobsController::class, 'toggleSave'])
    ->name('Home.jobs.toggle-save');
    // saved jobs toggle
// web.php mein is route ko dhoondein aur :slug add karein
Route::post('/jobs/{job:slug}', [JobsController::class, 'store'])->name('jobs.store');
Route::get('/job-details/{job:slug}', [JobsController::class, 'show'])->name('Home.jobs-details');


Route::get("/job-details", function () {
    return redirect()->route("Home.jobs");
});

Route::get('/disciplines', [DisciplinesController::class, 'index'])->name('Home.disciplines.index');
Route::get('/disciplines/{slug}', [DisciplinesController::class, 'show'])->name('Home.disciplines.show');


Route::get('/profile', [FrontendProfileController::class, 'index'])->name('Home.profile');
Route::post('/profile/update', [FrontendProfileController::class, 'update'])->name('profile.update');


//hire with us

// Route::get('/company', [CompanyController::class, 'index'])->name('Home.company.index');
// Route::post('/company', [CompanyController::class, 'store'])->name('company.store');


Route::middleware('auth')->group(function () {
    Route::get('/company', [CompanyController::class, 'index'])->name('Home.company.index');
    Route::post('/company', [CompanyController::class, 'store'])->name('Home.company.store');
});



Route::get('/admin/notifications/read-all', function () {
    DB::table('notifications')
        ->where('user_id', auth()->id())
        ->where('is_read', 0)
        ->update([
            'is_read' => 1,
            'updated_at' => now()
        ]);

    return back();
})->name('admin.notifications.readAll')->middleware('auth');
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/accountlogin', [AccountLoginController::class, 'index'])
        ->name('auth.accountlogin');

    Route::post('/accountlogin', [AccountLoginController::class, 'store'])
        ->name('auth.accountlogin.store');

    Route::get('/register', [AccountLoginController::class, 'showRegisterForm'])
        ->name('auth.register');

    Route::post('/register', [AccountLoginController::class, 'register'])
        ->name('auth.register.store');

});

Route::post('/logout', [AccountLoginController::class, 'logout'])
    ->name('auth.logout')
    ->middleware('auth');


Route::get('/forget-password', [AccountLoginController::class, 'showForgetForm'])
    ->name('auth.forget-form');

Route::post('/forget-password', [AccountLoginController::class, 'submitForgetForm'])
    ->name('auth.forget-password');

Route::get('/reset-password/{token}', [AccountLoginController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('/reset-password', [AccountLoginController::class, 'submitResetForm'])
    ->name('auth.reset-password');




/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
| Saari admin routes dashboard prefix me
*/

Route::middleware(['auth', 'accountlogin'])
    ->prefix('dashboard')
    ->group(function () {

Route::get('/', [DashboardController::class, 'index'])->name('Dashboard.admin.dashboard');
Route::get('/email', [EmailController::class, 'index'])->name('Dashboard.admin.email.index');
Route::get('/companies', [CompaniesController::class, 'index'])->name('Dashboard.admin.companies.index');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('Dashboard.admin.statistics.index');
        // Users
        Route::get('/users', [UsersController::class, 'index'])->name('Dashboard.admin.users.index');
        Route::get('/users/add', [UsersController::class, 'add'])->name('Dashboard.admin.users.add');
        Route::post('/users/store', [UsersController::class, 'store'])->name('Dashboard.admin.users.store');
        Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('Dashboard.admin.users.edit');
        Route::put('/users/update/{id}', [UsersController::class, 'update'])->name('Dashboard.admin.users.update');
        Route::delete('/users/delete/{id}', [UsersController::class, 'delete'])->name('Dashboard.admin.users.delete');
        Route::get('/users/view/{id}', [UsersController::class, 'view'])->name('Dashboard.admin.users.view');

        // Roles
        Route::get('/roles', [RolesController::class, 'index'])->name('Dashboard.admin.roles.index');
        Route::get('/roles/add', [RolesController::class, 'add'])->name('Dashboard.admin.roles.add');
        Route::post('/roles/store', [RolesController::class, 'store'])->name('Dashboard.admin.roles.store');
        Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('Dashboard.admin.roles.edit');
        Route::put('/roles/update/{id}', [RolesController::class, 'update'])->name('Dashboard.admin.roles.update');
        Route::delete('/roles/delete/{id}', [RolesController::class, 'delete'])->name('Dashboard.admin.roles.delete');
        Route::get('/roles/view/{id}', [RolesController::class, 'view'])->name('Dashboard.admin.roles.view');

        // Blogs
        Route::get('/blog', [BackendBlogController::class, 'index'])->name('Dashboard.admin.blog.index');
        Route::get('/blog/add', [BackendBlogController::class, 'add'])->name('Dashboard.admin.blog.add');
        Route::post('/blog/store', [BackendBlogController::class, 'store'])->name('Dashboard.admin.blog.store');
        Route::get('/blog/edit/{id}', [BackendBlogController::class, 'edit'])->name('Dashboard.admin.blog.edit');
        Route::put('/blog/update/{id}', [BackendBlogController::class, 'update'])->name('Dashboard.admin.blog.update');
        Route::delete('/blog/delete/{id}', [BackendBlogController::class, 'delete'])->name('Dashboard.admin.blog.delete');
        Route::get('/blog-search', [BackendBlogController::class, 'search'])->name('blog.search');
        Route::get('/blog/view/{id}', [BackendBlogController::class, 'view'])->name('Dashboard.admin.blog.view');



        // Contact Us
        Route::get('/contactus', [ContactUsController::class, 'index'])->name('Dashboard.admin.contactus.index');
        Route::get('/contactus/add', [ContactUsController::class, 'add'])->name('Dashboard.admin.contactus.add');
        Route::post('/contactus/store', [ContactUsController::class, 'store'])->name('Dashboard.admin.contactus.store');
        Route::get('/contactus/edit/{id}', [ContactUsController::class, 'edit'])->name('Dashboard.admin.contactus.edit');
        Route::put('/contactus/update/{id}', [ContactUsController::class, 'update'])->name('Dashboard.admin.contactus.update');
        Route::delete('/contactus/delete/{id}', [ContactUsController::class, 'destroy'])->name('Dashboard.admin.contactus.delete');
        Route::get('/contactus/view/{id}', [ContactUsController::class, 'view'])->name('Dashboard.admin.contactus.view');

        // Category
        // Route::get('/category', [CategoryController::class, 'index'])->name('Dashboard.admin.category.index');
        // Route::get('/category/add', [CategoryController::class, 'add'])->name('Dashboard.admin.category.add');
        // Route::post('/category/store', [CategoryController::class, 'store'])->name('Dashboard.admin.category.store');
        // Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('Dashboard.admin.category.edit');
        // Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('Dashboard.admin.category.update');
        // Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('Dashboard.admin.category.delete');
        // Route::get('/category/view/{id}', [CategoryController::class, 'view'])->name('Dashboard.admin.category.view');

Route::get('/category', [CategoryController::class, 'index'])->name('Dashboard.admin.category.index');
Route::post('/category/store', [CategoryController::class, 'store'])->name('Dashboard.admin.category.store');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('Dashboard.admin.category.update');
Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('Dashboard.admin.category.destroy');

        // Subcategories
//         Route::get('/subcategories', [ConditionsSubcategoryBackendController::class, 'index'])->name('Dashboard.admin.subcategories.index');
//         Route::get('/subcategories/add', [ConditionsSubcategoryBackendController::class, 'add'])->name('Dashboard.admin.subcategories.add');
//         Route::post('/subcategories/store', [ConditionsSubcategoryBackendController::class, 'store'])->name('Dashboard.admin.subcategories.store');
//         Route::get('/subcategories/edit/{id}', [ConditionsSubcategoryBackendController::class, 'edit'])->name('Dashboard.admin.subcategories.edit');
//         Route::put('/subcategories/update/{id}', [ConditionsSubcategoryBackendController::class, 'update'])->name('Dashboard.admin.subcategories.update');
// Route::delete('/subcategories/delete/{id}', [ConditionsSubcategoryBackendController::class, 'destroy'])
//     ->name('Dashboard.admin.subcategories.delete');


        // Profile and settings
        Route::get('/profile', [ProfileController::class, 'index'])->name('Dashboard.admin.profile.index');
        Route::get('/account_settings', [AccountSettingsController::class, 'index'])->name('Dashboard.admin.account_settings.index');
        Route::put('/account_settings/{id?}', [AccountSettingsController::class, 'update'])->name('Dashboard.admin.account_settings.update');



        // Contact settings
        Route::get('/contact-settings', [ContactSettingController::class, 'index'])->name('Dashboard.admin.contact-settings.index');
        Route::get('/contact-settings/add', [ContactSettingController::class, 'add'])->name('Dashboard.admin.contact-settings.add');
        Route::post('/contact-settings/store', [ContactSettingController::class, 'store'])->name('Dashboard.admin.contact-settings.store');
        Route::get('/contact-settings/edit/{contact_setting}', [ContactSettingController::class, 'edit'])->name('Dashboard.admin.contact-settings.edit');
        Route::put('/contact-settings/update/{contact_setting}', [ContactSettingController::class, 'update'])->name('Dashboard.admin.contact-settings.update');
        Route::delete('/contact-settings/destroy/{contact_setting}', [ContactSettingController::class, 'destroy'])->name('Dashboard.admin.contact-settings.destroy');

        // Need Help
        Route::get('/need_help', [NeedHelpController::class, 'index'])->name('Dashboard.admin.need_help.index');

// jobsdetails
Route::get('/jobs', [BackendJobsController::class, 'index'])->name('Dashboard.admin.jobs.index');
// saved jobs toggle


Route::get('/jobs/list', [BackendJobsController::class, 'list'])->name('Dashboard.admin.jobs.list');
Route::get('/jobs/list', [BackendJobsController::class, 'list'])->name('Dashboard.admin.jobs.list');
Route::get('/jobs/view/{job}', [BackendJobsController::class, 'viewJob'])
    ->name('Dashboard.admin.jobs.view');

Route::get('/jobs/edit/{job}', [BackendJobsController::class, 'edit'])->name('Dashboard.admin.jobs.edit');
Route::put('/jobs/update/{job}', [BackendJobsController::class, 'update'])->name('Dashboard.admin.jobs.update');
Route::delete('/jobs/delete/{job}', [BackendJobsController::class, 'destroy'])->name('Dashboard.admin.jobs.delete');
Route::get('/jobs/new-job', [BackendJobsController::class, 'newJob'])->name('Dashboard.admin.jobs.new-job');
Route::post('/jobs/new-job/store', [BackendJobsController::class, 'store'])->name('Dashboard.admin.new-job.store');

// jobs apply form
Route::get('/jobs/apply', [BackendJobsController::class, 'applyJob'])->name('Dashboard.admin.jobs.apply');
// Route::get('/jobs/{job}/apply', [BackendJobsController::class, 'applyForm'])
//     ->name('jobs.apply.form');

Route::get('/jobs/{job}/apply', [BackendJobsController::class, 'applyForm'])
    ->name('Dashboard.admin.jobs.apply.form');
Route::post('/jobs/{job}/apply', [BackendJobsController::class, 'submitApplication'])
    ->name('Dashboard.admin.jobs.apply.submit');
    Route::put('/dashboard/jobs/{job}/approve', [BackendJobsController::class, 'approve'])
    ->name('Dashboard.admin.jobs.approve');

Route::put('/dashboard/jobs/{job}/reject', [BackendJobsController::class, 'reject'])
    ->name('Dashboard.admin.jobs.reject');

    Route::put('/dashboard/jobs/{job}/approval-status', [BackendJobsController::class, 'updateApprovalStatus'])
    ->name('Dashboard.admin.jobs.approval.update');

Route::get('/jobs/application', [BackendJobsController::class, 'application'])->name('Dashboard.admin.jobs.application');
Route::delete('/jobs/application/{application}', [BackendJobsController::class, 'deleteApplication'])
    ->name('Dashboard.admin.job-applications.delete');

Route::get('/jobs/user-profile', [BackendJobsController::class, 'userProfile'])->name('Dashboard.admin.jobs.user_profile');


// companies
Route::get('/companies', [CompaniesController::class, 'index'])->name('Dashboard.admin.companies.index');
Route::get('/companies/add', [CompaniesController::class, 'add'])->name('Dashboard.admin.companies.add');
Route::post('/companies/store', [CompaniesController::class, 'store'])->name('Dashboard.admin.companies.store');
Route::get('/companies/edit/{id}', [CompaniesController::class, 'edit'])->name('Dashboard.admin.companies.edit');
Route::post('/companies/update/{id}', [CompaniesController::class, 'update'])->name('Dashboard.admin.companies.update');
Route::delete('/companies/delete/{id}', [CompaniesController::class, 'destroy'])->name('Dashboard.admin.companies.delete');



// disciplines
Route::get('/disciplines', [BackendDisciplinesController::class, 'index'])->name('Dashboard.admin.disciplines.index');
Route::get('/disciplines/add', [BackendDisciplinesController::class, 'add'])->name('Dashboard.admin.disciplines.add');
Route::post('/disciplines/store', [BackendDisciplinesController::class, 'store'])->name('Dashboard.admin.disciplines.store');
Route::get('/disciplines/{id}/edit', [BackendDisciplinesController::class, 'edit'])->name('Dashboard.admin.disciplines.edit');
Route::put('/disciplines/{id}/update', [BackendDisciplinesController::class, 'update'])->name('Dashboard.admin.disciplines.update');
Route::delete('/disciplines/{id}/delete', [BackendDisciplinesController::class, 'destroy'])->name('Dashboard.admin.disciplines.delete');
});
