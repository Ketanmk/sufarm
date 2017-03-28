const elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.sass('app.scss');
    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/fonts');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/fonts');
    mix.copy('resources/assets/vendor/css/plugins/jasny', 'public/css/plugins/jasny');
    mix.copy('resources/assets/vendor/plugins/jasny', 'public/js/plugins/jasny');
    mix.copy('resources/assets/js/components', 'public/js/components');
    mix.styles([
        'resources/assets/vendor/bootstrap/css/bootstrap.css',
        'resources/assets/vendor/animate/animate.css',
        'resources/assets/vendor/css/plugins/dataTables/datatables.min.css',
        'resources/assets/vendor/css/plugins/toastr/toastr.min.css',
        'resources/assets/vendor/font-awesome/css/font-awesome.css'
    ], 'public/css/vendor.css', './');
    mix.scripts([
        'resources/assets/vendor/jquery/jquery-3.1.1.min.js',
        'resources/assets/vendor/bootstrap/js/bootstrap.js',
        'resources/assets/vendor/metisMenu/jquery.metisMenu.js',
        'resources/assets/vendor/slimscroll/jquery.slimscroll.min.js',
        'resources/assets/vendor/pace/pace.min.js',
        'resources/assets/vendor/plugins/dataTables/datatables.min.js',
        'resources/assets/vendor/plugins/toastr/toastr.min.js',
        'resources/assets/vendor/plugins/bsconf/bootstrap-confirmation.min.js',
        'resources/assets/vendor/plugins/iCheck/icheck.min.js',

        'resources/assets/js/app.js'
    ], 'public/js/app.js', './');

});
