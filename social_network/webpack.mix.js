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
mix.options({
    processCssUrls: false
});
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/fonts.scss', 'public/css')
    .copyDirectory('resources/Bootstrap', 'public/Bootstrap')
    .copyDirectory('resources/js', 'public/js')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('resources/svg-icons', 'public/svg-icons')
    .copyDirectory('resources/img', 'public/img');