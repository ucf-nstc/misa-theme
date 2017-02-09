/*
 * Plugins
 */
var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require('gulp-rename');
var clean = require('gulp-clean');

var DEST = 'build/';

/*
 * Clean out build directory
 */
gulp.task('clean', function() {
	return gulp.src(DEST, {read: false})
		.pipe(clean());
});

/*
 * Build project for production
 */
gulp.task('build', ['clean'], function() {

	var productionFiles = ['metadata.json', 'README.md', 'public/css/main.css', 'public/js/main.js', 'public/img/*', 'languages/*', 'php/*.php', 'index.php'];
	for (i=0; i < productionFiles.length; i++) {
		// Get the path name if the file is located in a subdirectory
		// by shaving off the file name from the paths given in the array above
		if (productionFiles[i].indexOf('/')) {
			var parts = productionFiles[i].split('/');
			parts.pop();

			var dest = parts.join('/');
			dest = DEST + dest + '/';

			gulp.src(productionFiles[i]).pipe(gulp.dest(dest));
		} else {
			gulp.src(productionFiles[i]).pipe(gulp.dest(DEST));
		}
	}	
});

/*
 * Compile scss
 */
gulp.task('sass', function() {
	return gulp.src('./scss/*.scss') // src() creates a stream
	.pipe(sass()) // pipe() sends the results to the sass() plugin
	.pipe(gulp.dest('./public/css/')); // dest() writes the output of sass() to a directory
});

/*
 * Watch scss
 */
gulp.task('watch', function() {

	gulp.watch('./scss/**/*.scss', ['minify']); // if a file changes, run 'sass'
});

/**
 * Minify stylesheet
 */
// I think the ['sass'] parameter just tells this task to run 'sass' first
gulp.task('minify', ['sass'], function() { 
    return gulp.src('./public/css/main.css')  // Grab style.css and add it to the stream.
    .pipe(cssnano()) 						  // Minify and optimize style.css
    .pipe(rename('main.min.css'))             // Rename to main.min.css
    .pipe(gulp.dest('./public/css/'));        // Write style.css to the project's css directory.
});