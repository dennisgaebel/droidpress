// ===================================================
// Settin'
// ===================================================

var gulp            = require('gulp'),
    gulpLoadPlugins = require('gulp-load-plugins'),
    $               = gulpLoadPlugins({
                        rename: {
                          'gulp-imagemin'    : 'imagemin',
                          'gulp-sourcemaps'  : 'sourcemaps',
                          'gulp-minify-html' : 'minhtml',
                          'gulp-foreach'     : 'foreach',
                          'gulp-concat'      : 'concat',
                          'gulp-uglify'      : 'uglify',
                          'gulp-mocha'       : 'mocha',
                          'gulp-livereload'  : 'livereload',
                          'gulp-if'          : 'if',
                          'gulp-sass-glob'   : 'sassglob'
                        }
                      }),
    del             = require('del'),
    merge           = require('merge-stream'),
    basename        = require('path').basename,
    extname         = require('path').extname,
    pngquant        = require('imagemin-pngquant'),
    gulpStylelint   = require('gulp-stylelint');

$.exec   = require('child_process').exec;
$.fs     = require('fs');


// ===================================================
// Configin'
// ===================================================

var asset_dir = {
  site: '.',
  dist: 'dist',
  js: 'js',
  css: '.',
  sass: 'scss',
  images: 'img'
};

var path = {
  site: asset_dir.site,
  dist: asset_dir.dist,
  js: asset_dir.site + '/' + asset_dir.js,
  css: asset_dir.site + '/' + asset_dir.css,
  sass: asset_dir.site + '/' + asset_dir.css + '/' + asset_dir.sass,
  images: asset_dir.site + '/' + asset_dir.images,
};

var glob = {
  html: path.site + '/*.html',
  css: path.css + '/*.css',
  sass: path.sass + '/**/*.scss',
  js: path.js + '/src/**/*.js',
  jslibs : path.js + '/lib/**/*.js'
};


// ===================================================
// Testin'
// ===================================================

gulp.task('mocha', function () {
  return gulp.src('test/*.js', { read: false })
    .pipe($.mocha({ reporter: 'nyan' }));
});


// ===================================================
// Stylin'
// ===================================================

gulp.task('sass', function() {
  var stream = gulp.src(glob.sass)
    .pipe($.if(process.env.NODE_ENV === 'development', $.sourcemaps.init()))
    .pipe($.sassglob())
    .pipe($.sass({
      outputStyle: $.if(process.env.NODE_ENV === 'development', 'expanded', 'compressed')
    }))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe($.if(process.env.NODE_ENV === 'development', $.sourcemaps.write()))
    .pipe(gulp.dest(path.css))
    .pipe($.livereload());

  return stream;
});


// ===================================================
// Lintin'
// ===================================================

// @docs
// https://github.com/kristerkari/stylelint-scss
// https://github.com/stylelint/stylelint/blob/master/docs/user-guide/about-rules.md
gulp.task('lintsass', function() {
  var stream = gulp.src(glob.sass)
    .pipe(gulpStylelint({
      reporters: [
        {
          formatter: 'string',
          console: true
        }
      ]
    }));

  return stream;
});


// ===================================================
// Optimizin'
// ===================================================

// SVG and IMG Minification
gulp.task('imgmin', function() {
  var stream = gulp.src(path.images + '/*.{jpg,png,jpeg,svg}')
    .pipe($.imagemin({
        progressive: true,
        svgoPlugins: [{
          removeViewBox: false
        }],
        use: [ pngquant() ]
    }))
    .pipe(gulp.dest(path.images + '/' + path.dist));

  return stream;
});

// SVG Spritin'
gulp.task('svgstore', function() {
  var stream = gulp.src(path.images + '/svgsprite/*.svg')
    .pipe($.svgmin({
      plugins: [{
        removeDoctype: true
      },
      {
        removeComments: true
      }]
    }))
    .pipe($.svgstore({
      inlineSvg: true
    }))
    .pipe($.cheerio({
      run: function($) {
        $('svg').attr('style', 'display:none');
      },
      parserOptions: {
        //https://github.com/cheeriojs/cheerio#loading
        //https://github.com/fb55/htmlparser2/wiki/Parser-options#option-xmlmode
        xmlMode: true
      }
    }))
    .pipe(gulp.dest(path.images));

  return stream;
});


// ===================================================
// Buildin'
// ===================================================

// foreach used since usemin 0.3.11 won't manipulate
// multiple files as an array.
gulp.task('usemin', function() {
  return gulp.src(glob.html)
    .pipe($.foreach(function(stream, file) {
      return stream
        .pipe($.usemin({
          assetsDir: path.site,
          css: [ $.rev() ],
          html: [ $.minhtml({ empty: true }) ],
          js: [ $.uglify(), $.rev() ]
        }))
        .pipe(gulp.dest(path.dist));
    }));
});


gulp.task('concat', function() {
  var scripts = [];

  return merge(
    gulp.src(scripts)
      .pipe($.concat('app.min.js'))
      .pipe(gulp.dest(path.js + '/' + 'dist'))
  );
});


gulp.task('uglify', ['concat'], function() {
  return merge(
    gulp.src(path.js + '/dist/app.min.js')
      .pipe($.uglify())
      .pipe(gulp.dest(path.js + '/dist'))
  )
});


// ===================================================
// Copyin'
// ===================================================

gulp.task('copy', ['imgmin', 'uglify'], function() {
  return merge(
    gulp.src([
        path.site + '/*.{php,css,xml}',
        path.site + '/{{inc,template-parts,functions}/**/*.php,{languages,fonts}/**/*,img/{dist,svgsprite}/*.{png,jpg,jpeg,svg},js/**/*.js}'
      ])
      .pipe(gulp.dest(path.dist)),

    gulp.src([
        path.site + '/*.{ico,png,txt}',
        path.site + '/.{htaccess,editorconfig}',
      ]).pipe(gulp.dest(path.dist))
  );
});


gulp.task('copyimgs', ['copy'], function() {
  return merge(
    gulp.src([
        path.dist + '/img/dist/*.{png,jpg,jpeg,svg}'
      ])
      .pipe(gulp.dest(path.dist + '/img'))
  );
});


// ===================================================
// Cleanin'
// ===================================================

gulp.task('clean', function(cb) {
  del([
    path.site + '/' + path.dist,
    path.site + '/' + path.js + '/dist',
    path.site + '/' + 'img/dist'
  ], cb);
});

gulp.task('imgclean', ['copyimgs'], function(cb) {
  del([
    path.site + '/' + 'img/dist',
    path.dist + '/' + 'img/dist'
  ], cb);
});


// ===================================================
// Monitorin'
// ===================================================

gulp.task('watch', function() {
  gulp.watch([ glob.sass ], ['sass']);
  $.livereload.listen();
});


// ===================================================
// Taskin'
// ===================================================

gulp.task('default', [ 'sass', 'watch' ]);
gulp.task('compressor', ['imgmin']);
gulp.task('svgsprite', ['svgstore']);
gulp.task('build', ['sass', 'uglify', 'copy', 'copyimgs', 'imgclean']);
