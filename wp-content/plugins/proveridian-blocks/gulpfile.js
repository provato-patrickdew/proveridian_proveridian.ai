'use strict';

const sass       = require('gulp-sass')(require('sass'));
const gulp       = require('gulp');
const sourcemaps = require('gulp-sourcemaps');
const csso       = require('gulp-csso');

gulp.task('blocks-sass', function () {
    return gulp.src('blocks/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            precision: 10,
            includePaths: ['.'],
            onError: console.error.bind(console, 'Sass error:')
        }))
        .pipe(csso())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(function (file) {
            return file.base;
        }));
});

gulp.task('watch', function () {
    gulp.watch('blocks/**/*.scss', gulp.series('blocks-sass'));
});

gulp.task('default', gulp.series('blocks-sass'));
