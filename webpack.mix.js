const mix = require('laravel-mix');

mix.js('resources/js/main.js', 'public/js/script.min.js')
    .stylus('resources/stylus/main.styl', 'public/css/styles.min.css')
    .version()
    .extract()
    .browserSync('localhost:8000');
