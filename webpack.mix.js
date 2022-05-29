const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/assets/backend/js/app.js', 'public/backend/js')
 .js('resources/assets/backend/js/pages/*.js','public/backend/pages.js')
 .js('resources/assets/backend/js/errors.js','public/backend/errors/errors.js')
 .copyDirectory('resources/assets/backend/img','public/backend/img')
 .copyDirectory('resources/assets/backend/errors','public/backend/errors')
 .sass('resources/assets/backend/sass/app.scss', 'public/backend/css')
 .sass('resources/assets/backend/sass/errors.scss','public/backend/errors')
/**
* |-----------------------------------------------------------------
* | Website Assets generator
* |-----------------------------------------------------------------
*/
.copyDirectory('resources/assets/website','public/website')
