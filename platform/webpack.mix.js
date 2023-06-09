const mix = require('laravel-mix');

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
const MODULES = [
  'welcome',
  'auth',
  'header',
];

MODULES.map(module => {
  mix.js(`resources/js/modules/${module}/index.js`, `public/js/${module}.js`).vue()
    // .sass('resources/sass/app.scss', 'public/css');
})


