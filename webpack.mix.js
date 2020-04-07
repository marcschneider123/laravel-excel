const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
	.extract();

mix.sass('resources/sass/app.scss', 'public/css');

mix.browserSync({
	open:		false,
	proxy: 		process.env.MIX_BS_PROXY
});

if (mix.config.production) {
	mix.version();
} else {
	mix.sourceMaps(false, 'source-map');
}