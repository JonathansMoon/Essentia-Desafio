const mix = require('laravel-mix');

mix.scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/vendor/js/bootstrap.js')
    .sass('resources/sass/app.scss', 'public/vendor/css/bootstrap.css')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
