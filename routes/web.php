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
    return view('welcome');
});

Route::get('/home', function () {
    return "This is Home Page.";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');

// For Category Route

Route::get('/categories', 'App\Http\Controllers\CategoryController@all')->name('categories');

Route::post('/categories/add', 'App\Http\Controllers\CategoryController@add')->name('categories.store');

Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');

Route::post('/categories/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');
Route::get('/categories/softdelete/{id}', 'App\Http\Controllers\CategoryController@softDelete')->name('softdelete.categories');

Route::get('/categories/restore/{id}', 'App\Http\Controllers\CategoryController@restore')->name('categories.restore');
Route::get('/categories/permdelete/{id}', 'App\Http\Controllers\CategoryController@pDelete')->name('categories.permdelete');

// For Brand Route

Route::get('/brands', 'App\Http\Controllers\BrandController@all')->name('brands');
Route::post('/brands/add', 'App\Http\Controllers\BrandController@addBrand')->name('brands.store');
Route::get('/brands/edit/{id}', 'App\Http\Controllers\BrandController@edit')->name('brands.edit');
Route::post('/brands/update/{id}', 'App\Http\Controllers\BrandController@update')->name('brands.update');
Route::get('/brands/delete/{id}', 'App\Http\Controllers\BrandController@delete')->name('brands.delete');

// Multi Image Route

Route::get('/multi-images', 'App\Http\Controllers\BrandController@multipic')->name('multi.image');
Route::post('/multi-images/add', 'App\Http\Controllers\BrandController@addImg')->name('images.store');

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