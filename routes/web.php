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
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        Route::name('admin.')->group(function() {
            Route::get('login', 'LoginController@getLogin')->name('getLogin');
            Route::post('login', 'LoginController@postLogin')->name('postLogin');
            Route::get('logout', 'LoginController@logout')->name('logout');
            Route::get('forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgotPassword');
            Route::post('send-new-password', 'ForgotPasswordController@sendNewPassword')->name('sendNewPassword');
            Route::group(['middleware' => 'checkAdminLogin'], function() {
                Route::get('change_password', 'ChangePasswordController@getChangePassword')->name('getChangePassword');
                Route::post('change_password', 'ChangePasswordController@postChangePassword')->name('postChangePassword');
                Route::get('/', 'HomeController@dashboard')->name('dashboard');
                Route::get('chart-order', 'ChartOrderController@getView')->name('chartOrder');
                Route::get('status-by-month', 'ChartOrderController@getStatusByMonth')->name('getStatusByMonth');
                Route::resource('users', 'UserController')->only(['index', 'show']);
                Route::resource('admins', 'AdminController');
                Route::resource('categories', 'CategoryController');
                Route::resource('suppliers', 'SupplierController');
                Route::resource('product_informations', 'ProductInformationController');
                Route::resource('products', 'ProductController')->only(['store', 'update', 'destroy']);
                Route::resource('sales', 'SaleController');
                Route::resource('orders', 'OrderController')->only(['index', 'show']);

                Route::get('approved-order/{id}', 'OrderController@approvedOrder')->name('order.approved');
                Route::get('rejected-order/{id}', 'OrderController@rejectedOrder')->name('order.rejected');

                Route::get('import-product/{id}', 'ImportProductController@getViewImportProduct')->name('getImportProduct');
                Route::post('import-product/{id}', 'ImportProductController@importProduct')->name('postImportProduct');
                Route::get('list-import', 'ImportProductController@listImportProduct')->name('listImportProduct');
            });
        });
    });
    Route::get('login', 'LoginController@getLogin')->name('getLogin');
    Route::post('login', 'LoginController@postLogin')->name('postLogin');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'RegisterController@getRegister')->name('getRegister');
    Route::post('register', 'RegisterController@postRegister')->name('postRegister');
    Route::get('forgot-password', 'ForgotPasswordController@forgotPassword')->name('forgotPassword');
    Route::post('send-new-password', 'ForgotPasswordController@sendNewPassword')->name('sendNewPassword');
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('product', 'ProductController@index')->name('product');
    Route::get('product-category/{id}', 'ProductController@getByCategory')->name('productByCategory');
    Route::get('product/sort-by-price-asc', 'ProductController@sortByPriceAsc')->name('sortByPriceAsc');
    Route::get('product/sort-by-price-desc', 'ProductController@sortByPriceDesc')->name('sortByPriceDesc');
    Route::get('product/filter-by-price', 'ProductController@filterByPrice')->name('filterByPrice');
    Route::get('product/{id}', 'ProductController@getProductDetail')->name('productDetail');
    Route::get('product/quantity/{id}', 'ProductController@getQuantityOfProductDetail')->name('quantity');
    Route::post('add-to-cart', 'CartController@addToCart')->name('addToCart');
    Route::get('cart', 'CartController@cart')->name('viewCart');
    Route::post('delete-one', 'CartController@deleteOneItem')->name('deleteOneItem');
    Route::get('delete-all', 'CartController@deleteAllItem')->name('deleteAllItem');
    Route::post('cart-update-quantity', 'CartController@updateQuantity')->name('updateQuantity');
    Route::get('search-product', 'ProductController@search')->name('searchProduct');
    Route::group(['middleware' => 'checkUserLogin'], function() {
        Route::get('checkout', 'OrderController@getListItem')->name('getListItem');
        Route::post('checkout', 'OrderController@checkout')->name('checkout');
        Route::get('order-history', 'OrderController@getListOrder')->name('orderHistory');
        Route::get('order-history-by-status', 'OrderController@getListOrderByStatus')->name('orderHistoryByStatus');
        Route::get('order-detail/{id}', 'OrderController@getOrder')->name('orderDetail');
        Route::get('order-canceled/{id}', 'OrderController@cancelOrder')->name('cancelOrder');
        Route::post('rating/{id}', 'ProductController@rating')->name('rating');
    });
});
