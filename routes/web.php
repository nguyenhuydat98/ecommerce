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
    Route::get('lang/{language}', 'LocalizationController@changeLanguage')->name('change-language');

    Route::group(['prefix' => 'admin'], function() {
        Route::get('login', 'Admin\LoginController@getLogin')->name('admin.getLogin');
        Route::post('login', 'Admin\LoginController@postLogin')->name('admin.postLogin');
        Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

        Route::group(['middleware' => 'checkAdminLogin'], function() {
            Route::get('/', 'Admin\HomeController@home')->name('admin.home');
        });
    });

    Route::get('/', 'HomeController@home')->name('user.home');
    Route::get('product', 'ProductController@index')->name('user.product');
});
