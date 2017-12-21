var gulp = require('gulp'),
sass = require('gulp-sass'),
cleanCSS = require('gulp-clean-css'),
rename = require("gulp-rename"),
plumber = require('gulp-plumber'),
gutil = require('gulp-util'),
notify = require('gulp-notify'),
concat = require('gulp-concat'),
uglify = require('gulp-uglify');

//var connect = require('gulp-connect');

var config = {
    sassDir: ['./sass/main.scss'],
    sassOutputDir: './css/',
    sassWatch: './sass/**/*.scss'
}

//keeps gulp from crashing for scss errors & gives sass access to bootstrap
gulp.task('sass', function() {
    gulp.src(config.sassDir)
        .pipe(plumber({ errorHandler: function(err) {
            notify.onError({
                title: "Gulp error in " + err.plugin,
                message:  err.toString()
            })(err);
            // play a sound once
            gutil.beep();
        }})) 
        .pipe(sass())
        .pipe(gulp.dest(config.sassOutputDir))
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(cleanCSS())    
        .pipe(gulp.dest(config.sassOutputDir));
});

gulp.task('scripts', function(){
    gulp.src(config.jsDir + '*.js')
    .pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);
        // play a sound once
        gutil.beep();
    }}))
    .pipe(concat('app.js'))
    .pipe(gulp.dest( config.publicJSCompDir ))
    .pipe(rename({
        suffix: '.min'
      }))
    .pipe(uglify())
    .pipe(gulp.dest( config.publicJSCompDir ));
});

gulp.task('watch', function() {
    gulp.watch(config.sassWatch, ['sass']);
    //gulp.watch(config.jsDir + '*.js', ['scripts']);
});

gulp.task('default', ['sass', 'watch']);