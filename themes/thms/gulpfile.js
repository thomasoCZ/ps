var gulp = require('gulp');
var sass = require('gulp-sass');
var less = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');


// add gulp-uncss to remove unused css code

function swallowError (error) {

  // If you want details of the error in the console
  console.log(error.toString());

  this.emit('end');
}


gulp.task('less', function() {

	var processors = [
	autoprefixer({browsers: ['last 4 versions']}),
	//cssnano(),
	];

	return gulp.src('less/style.less')
	.pipe(sourcemaps.init())
	.pipe(less())
	.on('error', swallowError) 
	.pipe(postcss(processors))
	.pipe(sourcemaps.write())
	.on('error', swallowError) 
	.pipe(gulp.dest(''));

});


gulp.task('scripts', function() {  
    return gulp.src('js/script.js')
    	.pipe(uglify())
        .pipe(rename('script.min.js'))
        .pipe(gulp.dest('js'));
});


gulp.task('watch', function(){
	gulp.watch(['less/*.less','less/**/*.less'], ['less']);

	//gulp.watch('js/script.js', ['scripts']);
	
});
