<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/', 'HomeController@index')->name('home.page');
    Route::get('/blog', 'BlogController@index')->name('blog.page');
    Route::get('/blog/{id}', 'BlogController@show')->name('blog.single');
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/login', 'LoginController@index')->name('login.page');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::post('/upload', 'ComposeController@upload')->name('upload.perform');
        Route::get('/logout', 'LogoutController@logout')->name('logout.perform');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.page');
        Route::get('/compose', 'ComposeController@index')->name('compose.page');
        Route::post('/compose', 'ComposeController@store')->name('compose.perform');
        Route::get('/register', 'RegisterController@index')->name('register.page');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
    });
});