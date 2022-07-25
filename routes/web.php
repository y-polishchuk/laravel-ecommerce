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

//Category Controller
Route::get('/categories', 'App\Http\Controllers\CategoryController@all')->name('categories');

Route::post('/categories/add', 'App\Http\Controllers\CategoryController@add')->name('categories.store');

Route::get('/categories/edit/{id}', 'App\Http\Controllers\CategoryController@edit')->name('categories.edit');

Route::post('/categories/update/{id}', 'App\Http\Controllers\CategoryController@update')->name('categories.update');

Route::get('/softdelete/categories/{id}', 'App\Http\Controllers\CategoryController@softDelete')->name('softdelete.categories');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //$users = User::all();
        $users = DB::table('users')->get();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
