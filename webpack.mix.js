let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/admin/js/admin.js', 'public/js')
    .sass('resources/assets/admin/sass/admin.scss', 'public/css')
    .copy('node_modules/trumbowyg/dist/ui/icons.svg', 'public/js/ui/icons.svg');
mix.copy('node_modules/trumbowyg/dist/plugins/base64/trumbowyg.base64.min.js', 'public/plugins/trumbowyg/base64/trumbowyg.base64.min.js');
mix.copy('node_modules/summernote/dist/', 'public/plugins/summernote/dist/');
mix.copy('node_modules/summernote/lang/', 'public/plugins/summernote/lang/');
mix.copy('node_modules/summernote/plugin/', 'public/plugins/summernote/plugin/');