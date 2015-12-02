var fs = require('fs');
var path = require('path');
var gulp = require('gulp');
var _ = require('underscore');

// Load all gulp plugins automatically
// and attach them to the `plugins` object
var plugins = require('gulp-load-plugins')();

// Temporary solution until gulp 4
// https://github.com/gulpjs/gulp/issues/355
var runSequence = require('run-sequence');

var pkg = require('./composer.json');
var banner = (_.template('/*! <%=name%> v<%=version%> | License <%=license%> | <%=homepage%> */\n\n'))(pkg);
var dirs = {
    src: 'app/assets',
    dist: 'public/assets'
};
// -----------------------------------------------------------------------------
// Gulp tasks
// -----------------------------------------------------------------------------
gulp.task('clean', function () {
    require('del')([
        dirs.dist + '/**',
        '!' + dirs.dist,
        '!' + dirs.dist + '/.gitignore'
    ]);
});

gulp.task('create:dir', function () {
    fs.mkdirSync(path.resolve('tmp/build'), '0755');
});

gulp.task('jshint', function () {
    return gulp.src(dirs.src + '/js/**/*.js')
        .pipe(plugins.jshint())
        .pipe(plugins.jshint.reporter('jshint-stylish'));
});

gulp.task('build:css', function () {
    return gulp.src(dirs.src + '/sass/**/*.scss')
        .pipe(plugins.sass())
        .pipe(plugins.minifyCss({
            compatibility: 'ie8'
        }))
        .pipe(plugins.header(banner))
        .pipe(gulp.dest(dirs.dist + '/css'));
});

gulp.task('build:js', function () {
    return gulp.src(dirs.src + '/js/**/*.js')
        .pipe(plugins.uglify())
        .pipe(gulp.dest(dirs.dist + '/js'));
});

// configure which files to watch and what tasks to use on file changes
gulp.task('watch', function () {
    gulp.watch(dirs.src + '/js/**/*.js', ['jshint', 'build:js']);
    gulp.watch(dirs.src + '/sass/**/*.scss', ['build:css']);
});

gulp.task('build', function (done) {
    runSequence(
        ['clean', 'jshint'], ['build:css', 'build:js'],
        done);
});

gulp.task('default', ['build']);
