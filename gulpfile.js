const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const terser = require('gulp-terser');

//scss
function compilescss() {
    return src('assets/main.scss')
        .pipe(sass())
        .pipe(cleanCSS({debug: true}, (details) => {
            console.log(`${details.name}: ${details.stats.originalSize}`);
            console.log(`${details.name}: ${details.stats.minifiedSize}`);
        }))
        .pipe(dest('assets'));
}

//js
function compilejs() {
    return src('assets/main.js')
        .pipe(terser())
        .pipe(dest('assets'));
}

//watch
function watchFiles() {
    watch('assets/**/*.scss', compilescss);
    watch('assets/main.js', compilejs);
}

//exports
exports.default = series(compilescss, compilejs, watchFiles);