const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const plumber = require('gulp-plumber');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const babel = require('gulp-babel');
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
    // .pipe(autoPrefixer())
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
    .src('src/js/**/*.js')
    .pipe(
      plumber(function(err) {
        console.log('Scripts Task Error: ', err);
        this.emit('end');
      })
    )
    .pipe(
      babel({
        presets: ['es2015'],
      })
    )
    .pipe(sourcemaps.init())
    .pipe(uglify())
    .pipe(concat('img-loader-script.js'))
    .pipe(sourcemaps.write())
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
