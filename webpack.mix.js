const mix = require('laravel-mix');
require('dotenv').config();
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

mix.js('resources/js/admin.js', 'public/assets/js/admin/app.js')
   .js('resources/js/web.js', 'public/assets/js/web/app.js')
   .sass('resources/sass/admin.scss', 'public/assets/css/admin/app.css')

   .styles('resources/css/theme-1.css', 'public/frontend/css/themes/theme-1.css')
   .styles('resources/css/theme-4.css', 'public/frontend/css/themes/theme-4.css')
   .styles('resources/css/theme-5.css', 'public/frontend/css/themes/theme-5.css')

   .less('resources/less/theme-1-red.less', 'public/frontend/css/skins/theme-1-red.css')
   .less('resources/less/theme-4-red.less', 'public/frontend/css/skins/theme-4-red.css')
   .less('resources/less/theme-5-red.less', 'public/frontend/css/skins/theme-5-red.css')

   .less('resources/less/theme-1-orange.less', 'public/frontend/css/skins/theme-1-orange.css')
   .less('resources/less/theme-4-orange.less', 'public/frontend/css/skins/theme-4-orange.css')
   .less('resources/less/theme-5-orange.less', 'public/frontend/css/skins/theme-5-orange.css')

   .less('resources/less/theme-1-blue.less', 'public/frontend/css/skins/theme-1-blue.css')
   .less('resources/less/theme-4-blue.less', 'public/frontend/css/skins/theme-4-blue.css')
   .less('resources/less/theme-5-blue.less', 'public/frontend/css/skins/theme-5-blue.css')

   .less('resources/less/theme-1-indigo.less', 'public/frontend/css/skins/theme-1-indigo.css')
   .less('resources/less/theme-4-indigo.less', 'public/frontend/css/skins/theme-4-indigo.css')
   .less('resources/less/theme-5-indigo.less', 'public/frontend/css/skins/theme-5-indigo.css')

   .less('resources/less/theme-1-green.less', 'public/frontend/css/skins/theme-1-green.css')
   .less('resources/less/theme-4-green.less', 'public/frontend/css/skins/theme-4-green.css')
   .less('resources/less/theme-5-green.less', 'public/frontend/css/skins/theme-5-green.css')

   .less('resources/less/theme-1-grey.less', 'public/frontend/css/skins/theme-1-grey.css')
   .less('resources/less/theme-4-grey.less', 'public/frontend/css/skins/theme-4-grey.css')
   .less('resources/less/theme-5-grey.less', 'public/frontend/css/skins/theme-5-grey.css')

   .version();
