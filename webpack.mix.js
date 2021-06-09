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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.js([
    'resources/js/app.js',
    'resources/js/libs/select2.js'
    ], 'public/js');

mix.styles([
    'resources/css/app.css',
    'resources/css/fontello.css',
    'resources/css/animation.css',
    'resources/css/select2.css',
    'resources/css/style.css',
    ], 'public/css/all.css');
    
