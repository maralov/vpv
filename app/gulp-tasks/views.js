"use strict";

import { paths } from "../gulpfile.babel";
import gulp from "gulp";
import include from "gulp-file-include";
import gulpif from "gulp-if";
import replace from "gulp-replace";
import browsersync from "browser-sync";
import yargs from "yargs";


gulp.task("views", () => {
    return gulp.src(paths.views.src)
        .pipe(gulp.dest(paths.views.dist))
        .pipe(browsersync.stream());
});