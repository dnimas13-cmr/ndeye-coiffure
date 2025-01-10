const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | and JavaScript assets for the application. You may add more to
 | the mix if your application requires it.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

   mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/@fullcalendar/core/main.min.css', 'public/css')
   .copy('node_modules/@fullcalendar/core/main.min.js', 'public/js')
   .copy('node_modules/@fullcalendar/daygrid/main.min.js', 'public/js');