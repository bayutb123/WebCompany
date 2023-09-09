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
    Route::get('/category/{category}', 'BlogController@category')->name('blog.category');
    Route::group(['middleware' => 'guest'], function() {
        Route::get('/login', 'LoginController@index')->name('login.page');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });

    Route::group(['middleware' => 'auth'], function() {
        Route::post('/upload', 'ComposeController@upload')->name('upload.perform');
        Route::get('/account', 'AccountsController@index')->name('account.page');
        Route::post('/account', 'AccountsController@update')->name('account.perform');
        Route::get('/logout', 'LogoutController@logout')->name('logout.perform');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.page');
        Route::get('/compose', 'ComposeController@index')->name('compose.page');
        Route::post('/compose', 'ComposeController@store')->name('compose.perform');
        Route::get('/register', 'RegisterController@index')->name('register.page');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::get('/blogs', 'DashboardController@blogs')->name('blogs.page');
        Route::get('/blog/delete/{id}', 'DashboardController@delete')->name('blog.delete');
        Route::get('/edit/{id}', 'DashboardController@edit')->name('blog.edit');
        Route::post('/update/{id}', 'DashboardController@update')->name('blog.update');
    });
});