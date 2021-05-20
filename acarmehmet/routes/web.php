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

//Route::get('/', function () {
//    return view('welcome');
//});
//->middleware('CheckLogin')


Route::namespace('Admin')->group(function () {

    Route::prefix('admins')->group(function () {
        Route::get('/', 'DefaultController@index')->name("admin.index")->middleware('admin');
        Route::get('/login', 'DefaultController@login')->name("admin.login");
        Route::get('/logout', 'DefaultController@logout')->name("admin.logout");
        Route::post('/login', 'DefaultController@authenticate')->name("admin.authenticate");
    });

    //Middleware taa son derste eklendi. Login olmadan girişi engellemek için eklendi.
    Route::middleware(['admin'])->group(function () {
        Route::prefix('admins/ayarlar')->group(function () {
            Route::get('/', 'SettingsController@index')->name("settings.index");
            Route::post('', 'SettingsController@sortable')->name("settings.sortable");
            Route::get('/delete/{id}', 'SettingsController@destroy');
            Route::get('/edit/{id}', 'SettingsController@edit')->name("settings.edit");
            Route::post('/{id}', 'SettingsController@update')->name("settings.update");
        });
    });
});

Route::namespace('Admin')->group(function () {
    Route::prefix('admins')->group(function () {
        //Middleware taa son derste eklendi. Login olmadan girişi engellemek için eklendi.
        Route::middleware(['admin'])->group(function () {
            //BLOG
            Route::resource('blog', 'BlogController');
            Route::post('/blog/sortable', 'BlogController@sortable')->name("blog.sortable");
            Route::post('switchSatatus', 'BlogController@switchSatatus')->name("blog.switchSatatus");

            //PROFİL
            Route::resource('user', 'UserController');
        });
    });
});



Route::namespace('Frontend')->group(function () {
    Route::get('/', 'DefaultController@index')->name("home.index");
    Route::get('/blog', 'BlogController@index')->name("blogFront.index");
    Route::get('/blog/{slug}', 'BlogController@detail')->name("blogFront.detail");


    Route::get('/contact', 'DefaultController@contact')->name("contact.detail");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
