const gulp = require('gulp');
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const webpack = require('gulp-webpack');
const del = require('del');

// Distribution Path
const DIST_PATH = 'build';

// Direct Copies
gulp.task('copy', function() {
  console.log('Starting Copy of Includes');
  return gulp
    .src('src/includes/**/*')
    .pipe(gulp.dest(DIST_PATH + '/includes'));
});

// Sass Styles
gulp.task('styles', function() {
  console.log('Starting Styles Task');
  return gulp
    .src('src/scss/main.scss')
    .pipe(
      plumber(function(err) {
        console.log('Styles Task Error: ', err);
        this.emit('end');
      })
    )
    .pipe(sourcemaps.init())
    .pipe(
      sass({
        outputStyle: 'compressed',
      })
    )
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(DIST_PATH + '/css'));
});

// Scripts
gulp.task('scripts', function() {
  console.log('Starting Scripts Task');
  return gulp
    .src('src/js/index.js')
    .pipe(webpack(require('./webpack.config.js')))
    .pipe(gulp.dest(DIST_PATH + '/js'));
});

gulp.task('clean', function() {
  return del.sync([DIST_PATH]);
});

// Default Task
gulp.task(
  'default',
  ['clean', 'styles', 'scripts', 'copy'],
  function() {
    console.log('Starting Default Task');
  }
);
