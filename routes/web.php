<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $services = DB::table('home_services')->get();
    $images = DB::table('multipics')->get();
    return view('home', compact('brands', 'abouts', 'services', 'images'));
});

Route::get('/home', function () {
    return "This is Home Page.";
});

Route::get('/about', function () {
    return view('about');
});


// For Category Routes

Route::get('/categories', 'App\Http\Controllers\CategoryController@all')->name('categories');

Route::post('/categories/add', 'App\Http\Controllers\CategoryController@add')->name('categories.store');

Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');

Route::post('/categories/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::get('/categories/softdelete/{id}', 'App\Http\Controllers\CategoryController@softDelete')->name('softdelete.categories');

Route::get('/categories/restore/{id}', 'App\Http\Controllers\CategoryController@restore')->name('categories.restore');
Route::get('/categories/permdelete/{id}', 'App\Http\Controllers\CategoryController@pDelete')->name('categories.permdelete');

// For Brand Routes

Route::get('/home/brands', 'App\Http\Controllers\BrandController@all')->name('brands');
Route::post('/home/brands/add', 'App\Http\Controllers\BrandController@addBrand')->name('brands.store');
Route::get('/home/brands/edit/{id}', 'App\Http\Controllers\BrandController@edit')->name('brands.edit');
Route::post('/home/brands/update/{id}', 'App\Http\Controllers\BrandController@update')->name('brands.update');
Route::get('/home/brands/delete/{id}', 'App\Http\Controllers\BrandController@delete')->name('brands.delete');

// Multi Image Routes

Route::get('/home/portfolio', 'App\Http\Controllers\MultiController@multipic')->name('multi.image');
Route::post('/home/portfolio/add', 'App\Http\Controllers\MultiController@addImg')->name('images.store');
Route::get('/home/portfolio/delete/{id}', 'App\Http\Controllers\MultiController@deleteMulti')->name('images.delete');

// Admin Sliders Routes

Route::get('/home/sliders', 'App\Http\Controllers\HomeController@homeSlider')->name('sliders.home');
Route::get('/home/sliders/add', 'App\Http\Controllers\HomeController@add')->name('sliders.add');
Route::post('/home/sliders/store', 'App\Http\Controllers\HomeController@store')->name('sliders.store');
Route::get('/home/sliders/edit/{id}', 'App\Http\Controllers\HomeController@edit')->name('sliders.edit');
Route::post('/home/sliders/update/{id}', 'App\Http\Controllers\HomeController@update')->name('sliders.update');
Route::get('/home/sliders/delete/{id}', 'App\Http\Controllers\HomeController@delete')->name('sliders.delete');

// Home About All Routes

Route::get('/home/about', 'App\Http\Controllers\AboutController@homeAbout')->name('about.home');
Route::get('/home/about/add', 'App\Http\Controllers\AboutController@addAbout')->name('about.add');
Route::post('/home/about/store', 'App\Http\Controllers\AboutController@storeAbout')->name('about.store');
Route::get('/home/about/edit/{id}', 'App\Http\Controllers\AboutController@edit')->name('about.edit');
Route::post('/home/about/update/{id}', 'App\Http\Controllers\AboutController@update')->name('about.update');
Route::get('/home/about/delete/{id}', 'App\Http\Controllers\AboutController@delete')->name('about.delete');

// Home Services All Routes

Route::get('/home/services', 'App\Http\Controllers\ServiceController@homeService')->name('services.home');
Route::get('/home/services/add', 'App\Http\Controllers\ServiceController@addService')->name('services.add');
Route::post('/home/services/store', 'App\Http\Controllers\ServiceController@storeService')->name('services.store');
Route::get('/home/services/edit/{id}', 'App\Http\Controllers\ServiceController@edit')->name('services.edit');
Route::post('/home/services/update/{id}', 'App\Http\Controllers\ServiceController@update')->name('services.update');
Route::get('/home/services/delete/{id}', 'App\Http\Controllers\ServiceController@delete')->name('services.delete');

// About Us Page Route

Route::get('/about', 'App\Http\Controllers\AboutPageController@aboutUs')->name('page.about');

// Team Routes

Route::get('/about/team', 'App\Http\Controllers\TeamController@aboutTeam')->name('page.about_team');
Route::get('/admin/about/team', 'App\Http\Controllers\TeamController@team')->name('admin.team');
Route::get('/admin/about/team/add', 'App\Http\Controllers\TeamController@adminAddMember')->name('member.add');
Route::post('/admin/about/team/store', 'App\Http\Controllers\TeamController@adminStoreMember')->name('member.store');
Route::get('/admin/about/team/edit/{id}', 'App\Http\Controllers\TeamController@adminEditMember')->name('member.edit');
Route::post('/admin/about/team/update/{id}', 'App\Http\Controllers\TeamController@adminUpdateMember')->name('member.update');
Route::get('/admin/about/team/delete/{id}', 'App\Http\Controllers\TeamController@adminDeleteMember')->name('member.delete');

// Skills Routes

Route::get('/admin/about/skills', 'App\Http\Controllers\SkillController@skills')->name('admin.skills');
Route::post('/admin/about/skills/store', 'App\Http\Controllers\SkillController@adminStoreSkill')->name('skill.store');
Route::get('/admin/about/skills/edit/{id}', 'App\Http\Controllers\SkillController@adminEditSkill')->name('skill.edit');
Route::post('/admin/about/skills/update/{id}', 'App\Http\Controllers\SkillController@adminUpdateSkill')->name('skill.update');
Route::get('/admin/about/skills/delete/{id}', 'App\Http\Controllers\SkillController@adminDeleteSkill')->name('skill.delete');

// Testimonials Routes

Route::get('/about/testimonials', 'App\Http\Controllers\TestimonialController@aboutTes')->name('page.about_tes');
Route::get('/admin/about/testimonials', 'App\Http\Controllers\TestimonialController@tes')->name('admin.tes');
Route::get('/admin/about/testimonials/add', 'App\Http\Controllers\TestimonialController@adminAddTes')->name('tes.add');
Route::post('/admin/about/testimonials/store', 'App\Http\Controllers\TestimonialController@adminStoreTes')->name('tes.store');
Route::get('/admin/about/testimonials/edit/{id}', 'App\Http\Controllers\TestimonialController@adminEditTes')->name('tes.edit');
Route::post('/admin/about/testimonials/update/{id}', 'App\Http\Controllers\TestimonialController@adminUpdateTes')->name('tes.update');
Route::get('/admin/about/testimonials/delete/{id}', 'App\Http\Controllers\TestimonialController@adminDeleteTes')->name('tes.delete');


// Services Page Route

Route::get('/services', 'App\Http\Controllers\ServicesPageController@services')->name('page.services');
Route::get('/admin/services/features', 'App\Http\Controllers\ServicesPageController@features')->name('admin.services.features');
Route::get('/admin/services/features/add', 'App\Http\Controllers\ServicesPageController@adminAddFeature')->name('feature.add');
Route::post('/admin/services/features/store', 'App\Http\Controllers\ServicesPageController@adminStoreFeature')->name('feature.store');
Route::get('/admin/services/features/edit/{id}', 'App\Http\Controllers\ServicesPageController@adminEditFeature')->name('feature.edit');
Route::post('/admin/services/features/update/{id}', 'App\Http\Controllers\ServicesPageController@adminUpdateFeature')->name('feature.update');
Route::get('/admin/services/features/delete/{id}', 'App\Http\Controllers\ServicesPageController@adminDeleteFeature')->name('feature.delete');

// Portfolio Page Route

Route::get('/portfolio', 'App\Http\Controllers\PortfolioController@portfolio')->name('portfolio');

// Pricing Page Route

Route::get('/pricing', 'App\Http\Controllers\PricingController@pricing')->name('page.pricing');
Route::get('/admin/pricing', 'App\Http\Controllers\PricingController@adminPricing')->name('admin.pricing');
Route::get('/admin/pricing/add', 'App\Http\Controllers\PricingController@adminAddPrice')->name('price.add');
Route::post('/admin/pricing/store', 'App\Http\Controllers\PricingController@adminStorePrice')->name('price.store');
Route::get('/admin/pricing/edit/{id}', 'App\Http\Controllers\PricingController@adminEditPrice')->name('price.edit');
Route::post('/admin/pricing/{id}', 'App\Http\Controllers\PricingController@adminUpdatePrice')->name('price.update');
Route::get('/admin/pricing/delete/{id}', 'App\Http\Controllers\PricingController@adminDeletePrice')->name('price.delete');

// FAQ Admin Route

Route::get('/admin/faq', 'App\Http\Controllers\FAQController@adminFAQ')->name('admin.faq');
Route::get('/admin/faq/add', 'App\Http\Controllers\FAQController@adminAddFAQ')->name('faq.add');
Route::post('/admin/faq/store', 'App\Http\Controllers\FAQController@adminStoreFAQ')->name('faq.store');
Route::get('/admin/faq/edit/{id}', 'App\Http\Controllers\FAQController@adminEditFAQ')->name('faq.edit');
Route::post('/admin/faq/{id}', 'App\Http\Controllers\FAQController@adminUpdateFAQ')->name('faq.update');
Route::get('/admin/faq/delete/{id}', 'App\Http\Controllers\FAQController@adminDeleteFAQ')->name('faq.delete');

// Admin Contact Page Route

Route::get('/admin/contact', 'App\Http\Controllers\ContactController@adminContact')->name('admin.contact');
Route::get('/admin/contact/add', 'App\Http\Controllers\ContactController@adminAddContact')->name('contact.add');
Route::post('/admin/contact/store', 'App\Http\Controllers\ContactController@adminStoreContact')->name('contact.store');
Route::get('/admin/contact/edit/{id}', 'App\Http\Controllers\ContactController@adminEditContact')->name('contact.edit');
Route::post('/admin/contact/update/{id}', 'App\Http\Controllers\ContactController@adminUpdateContact')->name('contact.update');
Route::get('/admin/contact/delete/{id}', 'App\Http\Controllers\ContactController@adminDeleteContact')->name('contact.delete');
Route::get('/admin/message', 'App\Http\Controllers\ContactController@adminMessage')->name('admin.message');
Route::get('/admin/message/delete/{id}', 'App\Http\Controllers\ContactController@adminDeleteMessage')->name('message.delete');

// Home Contact Page Route

Route::get('/contact', 'App\Http\Controllers\ContactController@contact')->name('contact');
Route::post('/contact/form', 'App\Http\Controllers\ContactController@contactForm')->name('contact.form');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        // $users = DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/user-logout', 'App\Http\Controllers\BrandController@logout')->name('user.logout');

// Change Password and User Profile Route

Route::get('/user/password', 'App\Http\Controllers\ChangePassController@changePass')->name('password.change');
Route::post('/user/password/update', 'App\Http\Controllers\ChangePassController@updatePass');

// User Profile

Route::get('/user/profile', 'App\Http\Controllers\ChangePassController@profileUpdate')->name('profile.update');
Route::post('/user/profile/update', 'App\Http\Controllers\ChangePassController@userUpdateProfile')->name('update.user.profile');