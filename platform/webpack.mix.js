const mix = require('laravel-mix');
const config = require('./webpack.config');

const MODULES = [
  'welcome',
  'auth',
  'header',
  'game',
];

MODULES.map(module => {
  mix.js(`resources/js/modules/${module}/index.js`, `public/js/${module}.js`).vue();
})

mix.sass('resources/scss/_all.scss', 'public/css/styles.css');


mix.copy('resources/img', 'public/images');

mix.webpackConfig(config);
