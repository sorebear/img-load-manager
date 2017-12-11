var gulp = require("gulp");
var uglify = require("gulp-uglify");
var minifyCSS = require("gulp-minify-css");
// var autoPrefixer = require("gulp-autoprefixer");
var concat = require("gulp-concat");
var plumber = require("gulp-plumber");
var sourcemaps = require("gulp-sourcemaps");
var sass = require("gulp-sass");
var babel = require("gulp-babel");
var del = require("del");

// File Paths to Watch
var DIST_PATH = "build";
var SCRIPTS_PATH = "src/js/**/*.js";
var SCSS_PATH = "src/scss/**/*.scss";
var IMAGES_PATH = "src/images/**/*.{png,jpeg,jpg,svg,gif}";


//Image Compression
var imagemin = require("gulp-imagemin");
var imageminPngquant = require("imagemin-pngquant");
var imageminJpegRecompress = require("imagemin-jpeg-recompress");

// Direct Copies

gulp.task("copy", function() {
	console.log("Starting Copy of Includes");
	return gulp
		.src("src/includes/**/*")
		.pipe(gulp.dest(DIST_PATH + "/includes"));
});

gulp.task("copyIndex", function() {
	console.log("Starting Copy of Index");
	return gulp
		.src("src/index.php")
		.pipe(gulp.dest(DIST_PATH));
});

// Sass Styles
gulp.task("styles", function() {
	console.log("Starting Styles Task");
	return gulp
		.src("src/scss/main.scss")
		.pipe(
			plumber(function(err) {
				console.log("Styles Task Error: ", err);
				this.emit("end");
			})
		)
		.pipe(sourcemaps.init())
		// .pipe(autoPrefixer())
		.pipe(
			sass({
				outputStyle: "compressed"
			})
		)
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(DIST_PATH + "/css"))
});

// Scripts
gulp.task("scripts", function() {
	console.log("Starting Scripts Task");
	return gulp
		.src(SCRIPTS_PATH)
		.pipe(
			plumber(function(err) {
				console.log("Scripts Task Error: ", err);
				this.emit("end");
			})
		)
		.pipe(
			babel({
				presets: ["es2015"]
			})
		)
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(concat("img-loader-script.js"))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(DIST_PATH + "/js"))
});

// Images
gulp.task("images", function() {
	console.log("Starting Images Task");
	return gulp
		.src(IMAGES_PATH)
		.pipe(
			imagemin([
				imagemin.gifsicle(),
				imagemin.jpegtran(),
				imagemin.optipng(),
				imagemin.svgo(),
				imageminPngquant(),
				imageminJpegRecompress()
			])
		)
		.pipe(gulp.dest(`${DIST_PATH}/images`));
});

gulp.task("clean", function() {
	return del.sync([DIST_PATH]);
});

// Default Task
gulp.task(
	"default",
	["clean", "images", "styles", "scripts", "copy", "copyIndex"],
	function() {
		console.log("Starting Default Task");
	}
);