//gulpfile.js
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    connect = require('gulp-connect-php');

var dir = {
    theme: "wp-content/themes/andigital/"
};

// Default task
gulp.task('default', [], function () {
    gulp.start([
        'gen-html',
        'gen-css',
        'gen-img'
    ]);
});

gulp.task('connect', function() {
    connect.server({
        port:8001
    });
});

gulp.task('gen-css', function () {
    return gulp.src([
        dir.theme + 'scss/**/*.scss'
    ])
        .pipe(sass())
        //.pipe(concat('andigital.css'))
        .pipe(gulp.dest(dir.theme + 'css/'));
});

gulp.task('gen-html', function () {
    return gulp.src([
        'src/components/header/header.html',
        'src/components/breadcrumb/breadcrumb.html',
        'src/components/hero/hero.html',
        'src/components/content/content.html',
        'src/components/footer/footer.html'
    ])
        .pipe(concat('index.html'))
        .pipe(gulp.dest('release/'));
});


gulp.task('gen-img', function () {
    return gulp.src(['src/img/**.*'])
        .pipe(gulp.dest('release/img'));
});

gulp.task('watch', function () {
    gulp.watch('src/**/*.scss', ['default']);
    gulp.watch('src/**/*.html', ['default']);
});