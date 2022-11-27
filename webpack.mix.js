const mix = require('laravel-mix');


mix.js('resources/app.js', '/js')
    .sass('resources/app.scss', '/css', {
        processUrls: true,
    })
    .js('node_modules/jquery/dist/jquery.min.js', '/js')
    .js('node_modules/sweetalert2/dist/sweetalert2.min.js', '/js')
    .js('node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', '/js/')
    .css('node_modules/sweetalert2/dist/sweetalert2.min.css', '/css')
    .css('node_modules/bootstrap/dist/css/bootstrap.min.css', '/css/')
    .sourceMaps(true, 'source-map')
    .setPublicPath('public');
mix.setResourceRoot('../');
mix.options({processCssUrls: true,});

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

// var LiveReloadPlugin = require('webpack-livereload-plugin');
// mix.webpackConfig({
//     plugins: [new LiveReloadPlugin()]
// });