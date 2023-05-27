const mix = require('laravel-mix');
mix.js('js/theme.js', 'js/app.js')
    .sass('scss/app.scss', 'css');