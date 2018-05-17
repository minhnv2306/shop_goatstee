let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .copyDirectory('resources/assets/sass/goatstee', 'public/css/goatstee')
    .copyDirectory('resources/assets/js/goatstee', 'public/js/goatstee')
    .copyDirectory('resources/assets/img', 'public/img')
    .copy('resources/assets/typeahead.js/dist/typeahead.bundle.js', 'public/js/typeahead.bundle.js')
    .copy('resources/assets/wait-me/dist/waitMe.min.js', 'public/js/waitMe.min.js')
    .copy('resources/assets/wait-me/dist/waitMe.min.css', 'public/css/waitMe.min.css')
    .copy('resources/assets/toastr/toastr.js', 'public/js/toastr.js')
    .sass('resources/assets/toastr/toastr.scss', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css');
