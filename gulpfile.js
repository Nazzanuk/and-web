//gulpfile.js
var gulp = require('gulp'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    connect = require('gulp-connect-php'),
    insert = require('gulp-insert'),
    replace = require('gulp-replace'),
    clean = require('gulp-clean')
    ;

var dir = {
    theme: "wp-content/themes/andigital-new/"
};

// Default task
gulp.task('default', ['clean'], function () {
    gulp.start([
        'gen-html',
        'gen-css',
        'gen-img',
        'gen-fonts',
        'gen-js',
        'gen-theme'
    ]);
});

gulp.task('clean', function () {
    return gulp.src(dir.theme, {read: false})
        .pipe(clean());
});

gulp.task('gen-css', function () {
    gulp.src([
        'app/bower-components/bootstrap/dist/css/bootstrap.min.css',
        'app/custom-components/owl-carousel/assets/owl.carousel.css',
        'app/custom-components/owl-carousel/assets/owl.carousel.theme.css'
    ])
        .pipe(concat('bower.css'))
        .pipe(gulp.dest(dir.theme + '/css'));

    gulp.src([
        'app/app.scss'
    ])
        .pipe(sass())
        .pipe(concat('app.css'))
        .pipe(gulp.dest(dir.theme + '/css'));

    return true;
});

gulp.task('gen-html', function () {

    var pages = [
        'home',
        'what-we-do',
        'who-we-are',
        'join-us',
        'default'
    ];

    for (var i in pages) {
        var page = pages[i];
        var title = capitalizeEachWord(page.replace(/-/g, " "));

        gulp.src([
            'app/components/head/head.html',
            'app/components/header/header.html',
            'app/components/menu/menu.html',
            'app/components/' + page + '/' + page + '.html',
            'app/components/footer/footer.html'
        ])
            .pipe(concat(page + '.php'))
            .pipe(insert.prepend("<?php /* Template Name: " + title + " */ ?>"))
            .pipe(gulp.dest(dir.theme + '/templates'));
    }

    gulp.src('app/components/flex/flex.html')
        .pipe(concat('flex.php'))
        .pipe(gulp.dest(dir.theme + '/templates'));
});

gulp.task('gen-js', function () {
    gulp.src([
        'app/bower-components/jquery/dist/jquery.min.js',
        'app/bower-components/underscore/underscore-min.js',
        'app/bower-components/velocity/velocity.min.js',
        'app/bower-components/velocity/velocity.ui.js',
        'app/custom-components/owl-carousel/owl.carousel.min.js',
        'app/bower-components/angular/angular.min.js'
    ])
        .pipe(concat('bower.js'))
        .pipe(gulp.dest(dir.theme + '/js'));

    return gulp.src(['app/app.js', 'app/components/**/*.js'])
        .pipe(concat('app.js'))
        .pipe(gulp.dest(dir.theme + '/js'));
});

gulp.task('gen-img', function () {
    return gulp.src(['app/img/**/*.*'])
        .pipe(gulp.dest(dir.theme + '/img'));
});

gulp.task('gen-fonts', function () {
    return gulp.src(['app/fonts/**/*.*'])
        .pipe(gulp.dest(dir.theme + '/fonts'));
});

gulp.task('gen-theme', function () {
    return gulp.src(['app/theme/**/*.*'])
        .pipe(gulp.dest(dir.theme));
});

gulp.task('set-prod', function () {
    return gulp.src(['wp-config-prod.php'])
        .pipe(concat('wp-config.php'))
        .pipe(gulp.dest(''));
});

gulp.task('set-dev', function () {
    return gulp.src(['wp-config-dev.php'])
        .pipe(concat('wp-config.php'))
        .pipe(gulp.dest(''));
});

gulp.task('set-local', function () {
    return gulp.src(['wp-config-local.php'])
        .pipe(concat('wp-config.php'))
        .pipe(gulp.dest(''));
});

gulp.task('watch', ['default'], function () {
    gulp.watch([
        'app/components/**/*.*',
        'app/theme/**/*.*',
        'app/*.*'
    ], ['default']);
});

function capitalizeEachWord(str) {
    return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}