var uglifycss = require(uglifycss);

var uglified = uglifycss.processFiles([
        'css/style.css',
        'css/theme.css'
    ], {
        maxLineLen: 500,
        expandVars: true
    }
);

console.log(uglified);

gulp.task('dev', [
    'styles-dev',
    'scripts--async-dev',
    'scripts--main-dev',
    'scripts--conditional-dev',
    'images',
    'watch--dev'
]);