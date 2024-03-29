<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'GuestController@index') -> name('index');

Route::get('/registerForm', 'Guestcontroller@register') -> name('registerForm');
Route::post('/register', 'Auth\RegisterController@register') -> name('register');

Route::get('/loginForm', 'Guestcontroller@login') -> name('loginForm');
Route::post('/login', 'Auth\LoginController@login') -> name('login');

Route::get('/logout', 'Auth\LoginController@logout') -> name('logout');

Route::get('/posts', 'Guestcontroller@showPosts') -> name('posts');

Route::get('/newPost', 'HomeController@newPost') -> name('newPost');
Route::post('/addPost', 'HomeController@addPost') -> name('addPost');

Route::get('/editPost/{id}', 'HomeController@editPost') -> name('editPost');
Route::post('/updatePost/{id}', 'HomeController@updatePost') -> name('updatePost');

Route::get('/deletePost/{id}', 'HomeController@deletePost') -> name('deletePost');

// Rotte con componenti Vue.js
Route::prefix('vue')->group(function () {
    Route::get('posts', 'GuestController@vuePosts') -> name('vue.posts');
    Route::get('showAllPosts', 'GuestController@showAllPosts') -> name('vue.showAllPosts');
});