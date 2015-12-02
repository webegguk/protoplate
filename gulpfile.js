var gulp            = require('gulp');
var sass            = require('gulp-sass');
var sourcemaps      = require('gulp-sourcemaps');
var include         = require('gulp-include');
var sassGlob        = require('gulp-sass-glob');
var compass         = require('gulp-compass');
var browserSync     = require('browser-sync').create();
var reload          = browserSync.reload;

gulp.task('sass', function () {
    // gulp.src locates the source files for the process.
    // This globbing function tells gulp to use all files
    // ending with .scss or .sass within the scss folder.
    gulp.src('./scss/**/*.{scss,sass}')
        // Initializes sourcemaps
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        // Converts Sass into CSS with Gulp Sass (libsass)
        .pipe(sass({
            errLogToConsole: true,
            outputStyle: 'expanded'
        }))
        // Writes sourcemaps into the CSS file
        .pipe(sourcemaps.write('./maps'))
        // Outputs CSS files in the css folder
        .pipe(gulp.dest('./httpdocs/css'))
        .pipe(browserSync.stream());
})

// Compile sass into CSS & auto-inject into browsers, used for testing purposes only
//gulp.task('sassc', function () {
//    return gulp.src('./scss/*.scss')
//        .pipe(compass({
//            //project: fs.realpathSync(__dirname + '/..'),
//            config_file: 'config.rb',
//            css: './httpdocs/css',
//            sass: './scss/',
//            environment: 'development'
//        }))
//        .pipe(gulp.dest('./httpdocs/css/compass'))
//        .pipe(browserSync.stream());
//});


// Watch scss folder for changes
gulp.task('watch', function() {
    // Watches the scss folder for all .scss and .sass files
    // If any file changes, run the sass task
    gulp.watch('./scss/**/*.{scss,sass}', ['sass'])
})


// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function () {

    var host = 'protoplate.matt.studio' || 'localhost';

    // @see http://www.browsersync.io/docs/options/
    browserSync.init({
        proxy: host,
        open: 'external',
        online: true,
        logLevel: "debug"
    });

    gulp.watch('./httpdocs/**/*.html').on('change', browserSync.reload);
    gulp.watch('./httpdocs/**/*.php').on('change', browserSync.reload);
    gulp.watch('./httpdocs/**/*.xml').on('change', browserSync.reload);
    gulp.watch('./httpdocs/**/*.phtml').on('change', browserSync.reload);
    gulp.watch('./httpdocs/**/*.js').on('change', browserSync.reload);
    //gulp.watch('./httpdocs/**/*.scss', ['compass']);
    gulp.watch('./scss/**/*.{scss,sass}', ['sass']);
});


// Creating a default task
gulp.task('default', ['serve']);