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

mix.js([
    'resources/js/jquery-slim.min.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/js/modal.js',
    'resources/js/popper.min.js',
    'resources/js/popover.js',
    'resources/js/tooltip.js',
    'resources/js/collapse.js',
    'resources/js/util.js'
    ], 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
