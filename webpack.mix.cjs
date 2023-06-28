const mix = require('laravel-mix');

mix.sass('resources/sass/style1.scss', 'public/css').options({
        processCssUrls: false
    });