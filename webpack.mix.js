const mix = require("laravel-mix");
const WebpackRTLPlugin = require("webpack-rtl-plugin");

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

const inProduction = mix.inProduction();

if ( ! inProduction ) {
    mix.js("resources/js/app.js", "public/js")
    mix.sass( "resources/css/app.scss", "public/css/" )
} else {
    mix.minify('public/js/app.js');
    mix.minify('public/css/app.css');
    mix.minify('public/css/app.rtl.css');
}

mix.webpackConfig({
    plugins: [
        new WebpackRTLPlugin({
            filename: "[name].rtl.css",
            minify: false,
        }),
    ],
});

