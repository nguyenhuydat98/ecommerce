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
mix.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/user_product_detail.js', 'public/js');

mix.js('resources/js/admin_dataTables.js', 'public/js');

mix.styles([
    'resources/css/admin/nav.css',
    'resources/css/admin/login.css',
    'resources/css/user/header.css',
    'resources/css/user/login.css',
    'resources/css/user/register.css',
    'resources/css/user/menu.css',
    'resources/css/user/product.css',
    'resources/css/user/product_detail.css',
    ], 'public/css/all.css'
);
