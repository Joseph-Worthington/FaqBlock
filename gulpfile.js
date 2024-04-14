const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const terser = require('gulp-terser');
const plumber = require('gulp-plumber'); 

//scss
function compilescss() {
    return src('assets/css/main.scss')
        .pipe(plumber())
        .pipe(sass())
        .pipe(cleanCSS({debug: true}, (details) => {
            console.log(`${details.name}: ${details.stats.originalSize}`);
            console.log(`${details.name}: ${details.stats.minifiedSize}`);
        }))
        .pipe(dest('assets/css'));
}

//js
function compilejs() {
    return src('assets/js/main.js')
        .pipe(plumber())
        .pipe(terser())
        .pipe(dest('assets/js/dist'));
}

//watch
function watchFiles() {
    watch('assets/css/**/*.scss', compilescss);
    watch('assets/js/main.js', compilejs);
}

//exports
exports.default = series(compilescss, compilejs, watchFiles);