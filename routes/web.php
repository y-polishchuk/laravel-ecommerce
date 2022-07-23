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
Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');

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
