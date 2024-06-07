/**
 * Default gulpfile for HALMA projects
 *
 * Version 2021-05-20
 *
 * @see https://www.sitepoint.com/introduction-gulp-js/
 * @see https://nystudio107.com/blog/a-gulp-workflow-for-frontend-development-automation
 * @see https://nystudio107.com/blog/a-better-package-json-for-the-frontend
 *
 * @usage
 * gulp : Start browser-sync, watch css and js files for changes and run development builds on change
 * gulp build : run a development build
 * gulp build --production : run a production build
 * gulp --tasks : Show available tasks (if you want to run a single specific task)
 * 
 * To enable Notifications on Error see:
 * @see https://www.npmjs.com/package/gulp-notify
 * (linux: $ sudo apt-get install libnotify-bin )
 */
'use strict';

import gulp, { parallel, series } from 'gulp';
import fs, { exists } from 'node:fs';
import os from "node:os";
import autoprefixer from 'gulp-autoprefixer';
import imagemin, { optipng, svgo } from 'gulp-imagemin';
import yargs from 'yargs';
import { hideBin } from 'yargs/helpers'

import browserSync from 'browser-sync';
import log from 'fancy-log';
import { deleteAsync as del } from 'del';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';
import jsValidate from 'gulp-jsvalidate';
import moment from 'moment';
import * as git from "git-rev-sync";
import cleanCss from "gulp-cleaner-css";
import terser from "gulp-terser";
import header from "gulp-header";
import favicons from 'gulp-favicons';
import rename from 'gulp-rename';
import newer from 'gulp-newer';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';

// Read command line paramters (arguments)
const argv = yargs(hideBin(process.argv)).argv

// Check if we want a prodcution build
// Call like `gulp build --production` (or a single task instead of `build`)
const isProduction = (argv.production !== undefined);

// package vars
const pkg = JSON.parse(fs.readFileSync('./package.json'));


// const sass = require('gulp-sass')(require('sass'));
const sass = gulpSass(dartSass);
sass.compiler = dartSass;

const src = pkg.project_settings.source;
const dist = pkg.project_settings.prefix;

// A banner to output as header for dist files
const banner = [
	"/**",
	" * @project       <%= pkg.name %>",
	" * @author        <%= pkg.author %>",
	" * @build         " + moment().format("llll") + " ET",
	" * @release       " + git.long('./') + " [" + git.branch('./') + "]",
	" * @copyright     Copyright (c) " + moment().format("YYYY") + ", <%= pkg.copyright %>",
	" *",
	" */",
	""
].join("\n");

// Settings for SVG optimization, used in other settings (see below)
let svgoOptions = {
	plugins: [
		{
			name: 'cleanupIDs',
			active: false
		},
		{
			name: 'mergePaths',
			active: false
		},
		{
			name: 'removeViewBox',
			active: false
		},
		{
			name: 'convertStyleToAttrs',
			active: false
		},
		{
			name: 'removeUnknownsAndDefaults',
			active: false
		},
		{
			name: 'cleanupAttrs',
			active: false
		},
		{
			name: 'inlineStyles',
			active: false
		}
	]
};


// Project settings
var settings = {
	browserSync: {
		proxy:
			"https://" +
			pkg.name +
			".localhost",
		open: false, // Don't open browser, change to "local" if you want or see https://browsersync.io/docs/options#option-open
		notify: false, // Don't notify on every change
		https: {
			key: os.homedir() + "/server.key",
			cert: os.homedir() + "/server.crt",
		},
	},
	templates: {
		// Only used for browser-sync / auto-refresh when saving templates
		src: "./templates/**/*.php",
		active: true,
	},
	css: {
		src: src + "css/**/*.scss",
		dest: dist + "css/",
		srcMain: [
			src + "css/webfonts.scss",
			src + "css/main.scss",
			// src + "css/rhino.scss",
			// src + "css/swu.scss",
			// src + "css/pico.scss",
			// './src/css/email.scss',
			// You can add more files here that will be built seperately,
			// f.e. newsletter.scss
		],
		options: {
			sass: {
				outputStyle: "expanded",
				precision: 3,
				errLogToConsole: true,
				includePaths: pkg.project_settings.scssIncludes,
			},
		},
		optionsProd: {
			sass: {
				outputStyle: "compressed",
				precision: 3,
				errLogToConsole: true,
				includePaths: pkg.project_settings.scssIncludes,
			},
		},
	},
	js: {
		src: src + "js/**/*.js",
		srcMain: [
			src + "js/main.js",
			// You can add more files here that will be built seperately,
			// f.e. newsletter.js
		],
		dest: dist + "js/",
		destFile: "main.js",
	},

	ts: {
		src: src + "js/**/*.ts",
		dest: dist + "js/",
	},

	jsModules: {
		srcMain: [
			src + "js/modules/**/*.js",
			src + "js/modules/**/*.mjs",
			// You can add more files here that will be built seperately,
			// f.e. newsletter.js
		],
		dest: dist + "js/modules/",
	},

	jsVendor: {
		src: [
			// src + "js/vendor/**/*.js",
			// "./node_modules/@editorjs/list/dist/bundle.js"
			// "./shapes/src/js/**/*.js",
			// Add single vendor files here,
			// they will be copied as is to `{prefix}/js/vendor/`,
			// e.g. './node_modules/flickity/dist/flickity.pkgd.min.js',
		],
		dest: dist + "js/vendor/",
	},

	cssVendor: {
		src: [
			// src + "css/vendor/**/*.css",
			// "./node_modules/@picocss/pico/css/pico.min.css"
			// Add single vendor files here,
			// they will be copied as is to `{prefix}/css/vendor/`,
			// e.g. './node_modules/flickity/dist/flickity.min.css'
		],
		dest: dist + "css/vendor/",
	},

	vendor: {
		src: [
			// src + "vendor/**/*",
			// end in "src/path*/**" to copy all contents to the folder "dist/path"
		],
		dest: dist + "vendor/"
	},

	fonts: {
		src: src + "font/",
		dest: dist + "font/",
	},

	images: {
		src: src + "img/**/*",
		dest: dist + "img/",
		options: [
			optipng({ optimizationLevel: 5 }),
			svgo(svgoOptions),
		],
	},

	icons: {
		src: [
			src + "icon/**/*.svg",
			'./node_modules/feather-icons/dist/icons/*.svg'
		],
		dest: dist + "icon/",
		options: [
			svgo(svgoOptions)
		],
	},

	favicon: {
		src: src + "icon/logo.svg",
		dest: dist,
		background: "#ffffff",
		icons: {
			android: false,
			appleIcon: false,
			appleStartup: false,
			windows: false,
			yandex: false,
		}
	},

	clean: {
		folders: [
			dist + '/css',
			dist + '/font',
			dist + '/icon',
			dist + '/img',
			dist + '/js',
			dist + '/vendor',
			dist + '/*.(png|jpg|xml|ico|json|svg)',
		]
	}
};

// Clean dist before building
function cleanDist() {
	return del(settings.clean.folders);
}

/*
 *  Task: Compile SASS to CSS
 */
function css() {
	log("Building CSS" + ((isProduction) ? " [production build]" : " [development build]"));

	var options = (isProduction) ? settings.css.optionsProd.sass : settings.css.options.sass;
	var stream =
		gulp.src(settings.css.srcMain, { sourcemaps: !isProduction })
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(sass(options))
			.pipe(autoprefixer(settings.css.options.autoprefixer));

	if (isProduction) {
		stream = stream
			.pipe(cleanCss())
			.pipe(header(banner, { pkg: pkg }));
	}

	stream = stream
		.pipe(gulp.dest(settings.css.dest, {
			sourcemaps: (!isProduction ? '.' : false)
		}))
		.pipe(browserSync.stream());

	return stream;
}


function cssVendor(cb) {
	try {
		return gulp.src(settings.cssVendor.src, {
			allowEmpty: true
		})
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(gulp.dest(settings.cssVendor.dest));

	} catch (e) {
		return cb();
	}
}


/*
 * Task: uglify Javascript with terser
 */
function js() {
	log("Building Javascript" + ((isProduction) ? " [production build]" : " [development build]"));

	var stream =
		gulp.src(settings.js.srcMain, { sourcemaps: !isProduction })
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(jsValidate());

	if (isProduction) {
		stream = stream
			.pipe(terser({ compress: { drop_console: true } }))
			.on('error', function (error) {
				if (error.plugin !== "gulp-terser-js") {
					console.log(error.message);
				}
				this.emit('end');
			})
			.pipe(header(banner, { pkg: pkg }));
	}

	stream = stream
		.pipe(gulp.dest(settings.js.dest, {
			sourcemaps: (!isProduction ? '.' : false)
		}))
		.pipe(browserSync.stream());

	return stream;
}

function ts() {
	$.log("Converting Typescript" + ((isProduction) ? " [production build]" : " [development build]"));
	var tsProject = $.ts.createProject("tsconfig.json");
	var stream = tsProject.src()
		.pipe($.plumber({ errorHandler: $.notify.onError("Error: <%= error.message %>") }))
		.pipe(tsProject())
		.js
		.pipe($.jsvalidate());

	if (isProduction) {
		stream = stream
			.pipe($.terser({ compress: { drop_console: true } }))
			.on('error', function (error) {
				if (error.plugin !== "gulp-terser-js") {
					console.log(error.message);
				}
				this.emit('end');
			})
			.pipe($.header(banner, { pkg: pkg }));
	}

	stream = stream
		.pipe(gulp.dest(settings.ts.dest, {
			sourcemaps: (!isProduction ? '.' : false)
		}))
		.pipe($.browserSync.stream());

	return stream;
}


function jsModules() {
	log("Building Javascript" + ((isProduction) ? " [production build]" : " [development build]"));

	var stream =
		gulp.src(settings.jsModules.srcMain, { sourcemaps: !isProduction })
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(jsValidate());

	if (isProduction) {
		stream = stream
			.pipe(terser({ compress: { drop_console: true } }))
			.on('error', function (error) {
				if (error.plugin !== "gulp-terser-js") {
					console.log(error.message);
				}
				this.emit('end');
			})
			.pipe(header(banner, { pkg: pkg }));
	}

	stream = stream
		.pipe(gulp.dest(settings.jsModules.dest, {
			sourcemaps: (!isProduction ? '.' : false)
		}))
		.pipe(browserSync.stream());

	return stream;
}


function jsVendor(cb) {
	try {
		return gulp.src(settings.jsVendor.src, {
			allowEmpty: true
		})
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(gulp.dest(settings.jsVendor.dest));

	} catch (e) {
		return cb();
	}
}

function vendor(cb) {
	try {
		return gulp.src(settings.vendor.src, {
			allowEmpty: true
		})
			.pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
			.pipe(gulp.dest(settings.vendor.dest));

	} catch (e) {
		return cb();
	}
}

function fonts(cb) {

	fs.cp(settings.fonts.src, settings.fonts.dest, { recursive: true }, (err) => {
		if (err) {
			console.error(err);
		}
	});

	return cb();

	// !Warning: Gulping font causes sanitation Error???
	// return gulp.src(settings.fonts.src)
		// .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
		// .pipe(gulp.dest(settings.fonts.dest));
}


/*
 * Task: create images
 * TODO: Check if optimization is more effectiv when it is done separately for all different image types(png, svg, jpg)
 */
function images() {
	// optimize all other images
	// TODO: It seems that plugin in don't overwrites existing files in destination folder!??
	return gulp.src(settings.images.src)
		.pipe(newer(settings.images.dest))
		.pipe(imagemin(settings.images.options, { verbose: true }))
		.pipe(gulp.dest(settings.images.dest));
}


function icons() {
	return gulp.src(settings.icons.src)
		.pipe(newer(settings.icons.dest))
		.pipe(imagemin(settings.icons.options))
		.pipe(gulp.dest(settings.icons.dest));
}


/**
 * Task: Dummy task to perform reload on template change
 */
function templates(done) {
	browserSync.reload();
	done();
}


/*
 * Default TASK: Watch SASS and JAVASCRIPT files for changes,
 * build CSS file and inject into browser
 */
function gulpDefault(done) {
	checkKey();
	browserSync.init(settings.browserSync);

	gulp.watch(settings.css.src, css);
	gulp.watch(settings.jsModules.srcMain, jsModules);
	gulp.watch(settings.js.src, js);
	gulp.watch(settings.icons.src, icons);

	if (settings.templates.active) {
		gulp.watch(settings.templates.src, templates);
	}

	done();
}


/**
 * Generate favicons
 */
function favicon(done) {
	if (!fs.existsSync(settings.favicon.src)) {
		log("Favicon not found at " + settings.favicon.src);
		return done();
	}

	gulp.src(settings.favicon.src)
		.pipe(rename((file) => {
			file.basename = 'favicon';
			return file;
		}))
		.pipe(gulp.dest(settings.favicon.dest));

	return gulp.src(settings.favicon.src)
		.pipe(favicons({
			background: settings.favicon.background,
			icons: settings.favicon.icons,
			loadManifestWithCredentials: false,
			manifestMaskable: false,
		}))
		.pipe(gulp.dest(settings.favicon.dest));
}

// Check if SSL Key exists in default Directory
function checkKey() {
	try {
		fs.accessSync(settings.browserSync.https.key, fs.constants.R_OK);
	}
	catch (err) {
		settings.browserSync.https = null;
		settings.browserSync.proxy = 'http://' + pkg.name + '.' + require('os').userInfo().username + '.localhost';
	}
}


/*
* Task: Build all
*/
const build = series(cleanDist, js, jsModules, jsVendor, css, cssVendor, images, icons, fonts, favicon);

export {
	build,
	gulpDefault as default,
	cleanDist as clean,
	css,
	js,
	jsVendor,
	cssVendor,
	vendor,
	fonts,
	images,
	icons,
	favicon,
	jsModules,
	templates
};
