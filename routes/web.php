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
        Route::get('login', 'Admin\LoginController@getLogin')->name('admin.getLogin');
        Route::post('login', 'Admin\LoginController@postLogin')->name('admin.postLogin');
        Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
        Route::get('change_password', 'Admin\ChangePasswordController@getChangePassword')->name('admin.getChangePassword');
        Route::post('change_password', 'Admin\ChangePasswordController@postChangePassword')->name('admin.postChangePassword');

        Route::group(['middleware' => 'checkAdminLogin'], function() {
            Route::get('/', 'Admin\HomeController@dashboard')->name('admin.dashboard');
        });
    });

    Route::get('/', 'HomeController@home')->name('user.home');
    Route::get('product', 'ProductController@index')->name('user.product');
});
