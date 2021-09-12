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
    .js('resources/js/flights-enquiry-form.js', 'public/js')
    .js('resources/js/contact-form.js', 'public/js')
    .js('resources/js/autocomplete.js', 'public/js')
    .js('resources/js/flight-search-engine.js', 'public/js')
    .js('resources/js/home.js', 'public/js')
    .js('resources/js/flights.js', 'public/js')
    .js('resources/js//fly-now-pay-later.js', 'public/js')
    .postCss('resources/sass/app.css', 'public/css')
    .postCss('resources/sass/footer.css', 'public/css')
    .postCss('resources/sass/hero-banner.css', 'public/css')
    .postCss('resources/sass/why-with-us.css', 'public/css')
    .postCss('resources/sass/cheap-flights.css', 'public/css')
    .postCss('resources/sass/search-flights.css', 'public/css')
    .postCss('resources/sass/autocomplete.css', 'public/css')
    .postCss('resources/sass/home.css', 'public/css')
    .postCss('resources/sass/flights.css', 'public/css')
    .postCss('resources/sass/fly-now-pay-later.css', 'public/css');
