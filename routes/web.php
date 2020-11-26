<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('pages.home');
});

Route::get('/home', function() {
    return view('pages.home');
});

Route::get('/chat', function() {
    return view('pages.chat');
});

Route::get('/stream', function() {
    return view('pages.livestream');
});

Route::get('/gallery', function() {
    return view('pages.gallery');
});

Route::get('/debug', function() { //odesílat debug obrazovky
    return view('debug');
});

Route::resource('posts','PostController'); //CRUD pro příspěvky
Route::resource('account','AccountController'); //CRUD pro uživatelské účty
Route::get('categories/{category}', 'PostController@categoryList');
Route::post('posts/{post}/comment', 'PostController@respond');

/*
Route::get('login', 'LoginController@showLoginForm');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout');
Route::get('register', 'RegisterController@showRegistrationForm');
Route::post('register', 'RegisterController@register');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
*/
