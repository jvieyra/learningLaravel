let mix = require('laravel-mix');



mix.js('resources/assets/js/app.js', 'public/js')
.scripts([
	'node_modules/jquery/dist/jquery.min.js',
	'node_modules/bootstrap/dist/js/bootstrap.min.js',
	'resources/assets/js/script.js'
	],'public/js/all.js')
   .sass('resources/assets/sass/app.scss', 'public/css');



