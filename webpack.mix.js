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
 /**
  * Modules for pages scripts
  */
  let fs = require('fs');

  let getFiles = function (dir) {
      // get all 'files' in this directory
      // filter directories
      return fs.readdirSync(dir).filter(file => {
          return fs.statSync(`${dir}/${file}`).isFile();
      });
  };


let mixis =  mix.js('resources/assets/backend/js/app.js', 'public/backend/js')
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
// .copyDirectory('resources/assets/website','public/website')
.js('resources/assets/website/js/bootstrap.js', 'public/website/js')

.sass('resources/assets/website/sass/app.scss', 'public/website/css')

getFiles('resources/assets/website/js/pages').forEach(function (filepath) {
    mixis.js('resources/assets/website/js/pages/' + filepath, 'public/website/js/page');
});
