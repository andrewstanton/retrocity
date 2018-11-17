const { src, dest, watch, parallel, series } = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const rename = require("gulp-rename");
const plumber = require('gulp-plumber');
const gutil = require('gulp-util');
const notify = require('gulp-notify');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

const config = {
    publicCSSDir: './',
    publicJSCompDir: './dist/js',
    sassDir: './dev/sass',
    jsDir: './dev/js',
}

const sassTask = (done) => {
    src(config.sassDir + '/style.scss').pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);

        gutil.beep();
    }})) 
    .pipe(sass())
    .pipe(dest(config.publicCSSDir))
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(cleanCSS())    
    .pipe(dest(config.publicCSSDir));
    done();
};

const scriptTask = (done) => {
    src(config.jsDir + '/*.js')
    .pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);
        // play a sound once
        gutil.beep();
    }}))
    .pipe(concat('app.js'))
    .pipe(dest( config.publicJSCompDir ))
    .pipe(rename({
        suffix: '.min'
      }))
    .pipe(uglify())
    .pipe(dest( config.publicJSCompDir ));
    done();
};

const watchSASS = () => {
    watch(config.sassDir + '**/*.scss', parallel([ sassTask ]));
};
const watchScripts = () => {
    watch(config.jsDir + '**/*.js', parallel([ scriptTask ]));
};

const watchTask = parallel([ watchSASS, watchScripts ]);
const defaultTasks = (done) => {
    series(sassTask, watchTask)(done);
}

exports.default = defaultTasks;
