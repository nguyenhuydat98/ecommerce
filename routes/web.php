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



Route::group(['middleware' => 'localization'], function() {
    Route::get('lang/{language}', 'LocalizationController@changeLanguage')->name('localization');

    Route::group(['prefix' => 'admin'], function() {
        Route::name('admin.')->group(function() {
            Route::get('login', 'Admin\LoginController@getLogin')->name('getLogin');
            Route::post('login', 'Admin\LoginController@postLogin')->name('postLogin');
            Route::get('logout', 'Admin\LoginController@logout')->name('logout');
            Route::group(['middleware' => 'checkAdminLogin'], function() {
                Route::get('change_password', 'Admin\ChangePasswordController@getChangePassword')->name('getChangePassword');
                Route::post('change_password', 'Admin\ChangePasswordController@postChangePassword')->name('postChangePassword');
                Route::get('/', 'Admin\HomeController@dashboard')->name('dashboard');
            });
        });
    });

    Route::get('login', 'LoginController@getLogin')->name('getLogin');
    Route::post('login', 'LoginController@postLogin')->name('postLogin');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('product', 'ProductController@index')->name('product');

    Route::group(['middleware' => 'checkUserLogin'], function() {

    });

});
