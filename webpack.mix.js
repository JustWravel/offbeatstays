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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .js('resources/assets/front/js/jquery.min.js', 'public/front-assets/js')
    // .js('resources/assets/front/js/plugins.js', 'public/front-assets/js', [
    //     // require('jquery')
    //     ])
    .js('resources/assets/front/js/scripts.js', 'public/front-assets/js')


    .postCss('resources/assets/front/css/reset.css', 'public/front-assets/css')
    .postCss('resources/assets/front/css/plugins.css', 'public/front-assets/css')
    .postCss('resources/assets/front/css/style.css', 'public/front-assets/css')
    .postCss('resources/assets/front/css/color.css', 'public/front-assets/css')
    .version();

if (mix.inProduction()) {
    mix.version();
}
