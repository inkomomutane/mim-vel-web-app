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

mix.copyDirectory('resources/backend','public/backend')
.copyDirectory('resources/frontend','public/frontend')
.copyDirectory('resources/login-form','public/login-form')
//.sass('resources/sass/app.scss', 'public/frontend/css');

