const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js/backend.js')
    .combine([
        'public/js/backend.js',
        'public/plugins/select2/select2.min.js',
        'public/plugins/jquery.slimscroll.min.js'
    ], 'public/js/app.js')
    .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    //.less('node_modules/bootstrap-less/bootstrap/bootstrap.less', 'public/css/bootstrap.css')
    .less('resources/assets/less/adminlte-app.less','public/css/adminlte-app.css')
    .less('node_modules/toastr/toastr.less','public/css/toastr.css')
    .sass('resources/assets/sass/mystyle.scss','public/css/mystyle.css')
    .combine([
        'public/css/app.css',
        'node_modules/icheck/skins/square/blue.css',
        'public/plugins/select2/select2.min.css',
        'node_modules/admin-lte/dist/css/skins/_all-skins.css',
        'public/css/adminlte-app.css',
        'public/css/toastr.css',
        'public/css/mystyle.css',
        'resources/assets/sass/styles.css'
    ], 'public/css/all.css')
    .combine([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/pratt_landing.min.css'
    ], 'public/css/all-landing.css')
    //APP RESOURCES
    .copy('resources/assets/img/*.*','public/img')
    //VENDOR RESOURCES
    .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
    .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
    .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
    .copy('node_modules/admin-lte/dist/img','public/img')
    .copy('node_modules/admin-lte/plugins','public/plugins')
    .copy('node_modules/icheck/skins/square/blue.png','public/css')
    .copy('node_modules/icheck/skins/square/blue@2x.png','public/css')
    .copy('resources/assets/js/plugins','public/plugins')
    .options({ processCssUrls: false });

if (mix.config.inProduction) {
  mix.version();
  mix.minify();
}