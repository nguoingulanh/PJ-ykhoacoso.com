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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
mix.js('resources/js/custom.js', 'public/js')
    .sass('resources/sass/custom.scss', 'public/css');
// mix.copyDirectory('node_modules/select2', 'public/libraries/select2');
// mix.copyDirectory('node_modules/summernote', 'public/libraries/summernote');
