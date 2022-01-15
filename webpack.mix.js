const mix = require('laravel-mix');

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/companyAdd.js', 'public/js')
    .js('resources/js/show/show.js', 'public/js')
    .js('resources/js/personal/dragAndDrop.js', 'public/js')
    .js('resources/js/pagination.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
