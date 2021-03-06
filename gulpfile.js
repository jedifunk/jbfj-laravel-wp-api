/* == VARS ==*/

//dev URL
var devURL = 'http://laravel-rest.dev';

// require Gulp
var gulp = require('gulp');

// plugins
var browserSync = require('browser-sync').create();
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var minifycss = require('gulp-minify-css');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

/*== TASKS ==*/

// Lint task
gulp.task('lint', function(){
	return gulp.src('src/js/*.js')
		.pipe(jshint())
		.pipe(jshint.reporter('default'));
});

// Minify + Concat JS
gulp.task('scripts', function(){
	gulp.src([
		'src/components/jquery/dist/jquery.js'
	])
	.pipe(concat('all.js'))
	.pipe(gulp.dest('laravel-rest.dev/public/js'))
	.pipe(rename('all.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('laravel-rest.dev/public/js'));
});

// SASS compile for dev, with sourcemaps and unminified
gulp.task('sass', function(){
	return gulp
		
		// source
		.src('src/scss/main.scss')
	
		//sourcemapping
		.pipe(sourcemaps.init())
		.pipe(sass({ errLogToConsole: true }))
		
		//write sourcemaps into css file
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('laravel-rest.dev/public/css'))
		.pipe(browserSync.stream({match: '**/*.css'}));
});

// Watch
gulp.task('watch', ['sass'], function(){
	
	browserSync.init({
		proxy: "laravel-rest.dev"
	});
	
	gulp.watch('src/js/*.js', ['lint', 'scripts']);
	gulp.watch('src/scss/**/*.scss', ['sass']);
});

// Default
gulp.task('default', ['lint', 'watch']);