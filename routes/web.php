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

// Admin All Routes

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

// Portfolio Page Route

Route::get('/portfolio', 'App\Http\Controllers\PortfolioController@portfolio')->name('portfolio');

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