const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass(['app.scss', 'main.scss'], 'public/css/all.css')
       .webpack('app.js').version(['css/all.css', 'js/app.js'])
       .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/',
             'public/fonts/bootstrap');

});

