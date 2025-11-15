"use strict";

	const gulp  = require('gulp'),
	browsersync = require('browser-sync').create(),
	sass        = require('gulp-sass')(require('sass')),
	notify      = require('gulp-notify'),
	rename      = require('gulp-rename'),
	cssnano     = require('gulp-cssnano'),
	sourcemaps = require('gulp-sourcemaps');

const supported = [
	"defaults"
];

// BrowserSync
function browserSync(done) {
	browsersync.init({		
		proxy: 'https://menziesllp.local',
		port: 3000,
		open: false

	});
	done();
}

// BrowserSync Reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

//Watch
function watchFiles(){
	gulp.watch("css/custom.scss", scss);
	gulp.watch("css/theme.scss", scss);
	gulp.watch("css/*.scss", scss);
	gulp.watch("./js/*.js").on('change', browsersync.reload);
	gulp.watch("./*.php").on('change', browsersync.reload);
	gulp.watch("template-parts/**/*.php").on('change', browsersync.reload);
}

function scss(){
	return gulp
	.src(["css/custom.scss", "css/theme.scss"])
	.pipe(sourcemaps.init())
	.pipe(sass({
		style: 'compressed',
		errLogToConsole: true
	}).on('error', sass.logError))
	.pipe(cssnano({
		zindex: false,
		autoprefixer: {browsers: supported, add: true}
	}))
	// .pipe(rename('custom.min.css'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(sourcemaps.write())
	.pipe(gulp.dest("css/"))
	.pipe(notify("Compiled: <%= file.relative %>"))
	.pipe(browsersync.stream());
}

const serve = gulp.parallel(watchFiles, browserSync);

exports.serve = serve;