var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');

    mix.copy('vendor/bower_components/startbootstrap-clean-blog/fonts', 'public/fonts')
    mix.copy('vendor/bower_components/startbootstrap-clean-blog/css/bootstrap.min.css', 'public/css/bootstrap.min.css')
    mix.copy('vendor/bower_components/startbootstrap-clean-blog/css/clean-blog.min.css', 'public/css/clean-blog.min.css')

    mix.copy('vendor/bower_components/startbootstrap-clean-blog/js/jquery.js', 'public/js/jquery.js')
    mix.copy('vendor/bower_components/startbootstrap-clean-blog/js/bootstrap.min.js', 'public/js/bootstrap.min.js')
    mix.copy('vendor/bower_components/startbootstrap-clean-blog/js/clean-blog.min.js', 'public/js/clean-blog.min.js')

    mix.scripts([
        'app.js'
    ], 'public/js/app.js');

    mix.version(['public/js/app.js']);
});
