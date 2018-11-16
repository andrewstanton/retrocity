const { src, dest, watch, parallel, series } = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const rename = require("gulp-rename");
const plumber = require('gulp-plumber');
const gutil = require('gulp-util');
const notify = require('gulp-notify');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

var config = {
    sassDir: ['./sass/main.scss'],
    sassOutputDir: './css/',
    sassWatch: './sass/**/*.scss'
}

const sassTask = (done) => {
    src(config.sassDir).pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);
        // play a sound once
        gutil.beep();
    }})) 
    .pipe(sass())
    .pipe(
        dest(config.sassOutputDir)
    )
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(cleanCSS())    
    .pipe(
        dest(config.sassOutputDir)
    );
    done();
};

const scriptTask = () => {
    src(`${config.jsDir}*.js`).pipe(plumber({ errorHandler: function(err) {
        notify.onError({
            title: "Gulp error in " + err.plugin,
            message:  err.toString()
        })(err);
        // play a sound once
        gutil.beep();
    }}))
    .pipe(concat('app.js'))
    .pipe(
        dest( config.publicJSCompDir )
    )
    .pipe(rename({
        suffix: '.min'
      }))
    .pipe(uglify())
    .pipe(
        dest( config.publicJSCompDir )
    );
};

const watchSASS = () => {
    watch(config.sassWatch, sassTask);
};

const watchTask = parallel( watchSASS );
const defaultTasks = (done) => {
    series(sassTask, watchTask)(done);
}

exports.default = defaultTasks;
