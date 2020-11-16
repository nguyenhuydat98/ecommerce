const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.js('resources/js/user_product_detail.js', 'public/js');
mix.js('resources/js/admin_dataTables.js', 'public/js');

// mix.sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/css/admin/custom_bootstrap.css',
    'resources/css/admin/nav.css',
    'resources/css/admin/login.css',
    'resources/css/admin/product_detail.css',
    'resources/css/admin/sale_detail.css',
    'resources/css/admin/list_order.css',
    'resources/css/admin/order_detail.css',
    'resources/css/user/header.css',
    'resources/css/user/login.css',
    'resources/css/user/register.css',
    'resources/css/user/menu.css',
    'resources/css/user/product.css',
    'resources/css/user/product_detail.css',
    'resources/css/user/cart.css',
    'resources/css/user/checkout.css',
    ], 'public/css/all.css'
);
