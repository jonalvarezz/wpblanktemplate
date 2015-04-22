'use strict';

var gulp                = require('gulp'),
    nib                 = require('nib'),
    rename              = require('gulp-rename'),
    stylus              = require('gulp-stylus'),
    staticPath          = './';

/*
 * Assets processing and livereload enabling
 * [css] : compile stylus files into css
 * [html]: reload page
*/

// Process the Main CSS file
gulp.task('mainCSS', function() {
  gulp.src( staticPath + 'stylus/main.styl' )
    .pipe(stylus({
      use: nib(),
      compress: true
    }))
    .pipe(rename('bundle.min.css'))
    .pipe(gulp.dest( staticPath + 'css/'));

});

// Process the Login CSS file
gulp.task('loginCSS', function() {
  gulp.src( staticPath + 'stylus/login.styl' )
    .pipe(stylus({
      use: nib(),
      compress: true
    }))
    .pipe(rename('login.min.css'))
    .pipe(gulp.dest( staticPath + 'css/'));

});


// Watch file changes
gulp.task('watch', function() {
  gulp.watch([ staticPath + 'stylus/login.styl'], ['loginCSS']);
  gulp.watch([ staticPath + 'stylus/*.styl'], ['mainCSS']);
});

gulp.task('default', [ 'loginCSS', 'mainCSS', 'watch' ]);