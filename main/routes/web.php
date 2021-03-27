<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Logout;
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


Route::get('/home', 'MainController@index')
        -> name('index');

Auth::routes();

Route::get('/', 'MainController@index')
        -> name('index');

Route::get('/login' ,'MainController@login')
        -> name('login');

Route::get('/dashboard' , 'MainController@dashboard')
        -> name('dashboard');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/store-proj' , 'MainController@storeproject')
        -> name('store-project');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/add-image/{id}' , 'MainController@updateImage')
        -> name('update-image');
Route::get('/delete/{id}' , 'MainController@deleteImage')
        -> name('delete-image');
Route::post('/create-project' , 'MainController@createProject')
        -> name('create-project');
Route::get('/contactform' , 'MainController@contactForm')
        ->name('contact-form');
Route::post('/contacform/send' , 'MainController@sendContactMail')
        -> name('send-mail');