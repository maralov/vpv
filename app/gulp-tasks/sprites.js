"use strict";

import { paths } from "../gulpfile.babel";
import gulp from "gulp";
import svg from "gulp-svg-sprite";
import debug from "gulp-debug";
import browsersync from "browser-sync";

gulp.task("sprites", () => {
    return gulp.src(paths.sprites.src)
        .pipe(svg({
            // shape: {
            //     //dest: "intermediate-svg",
            //     transform: ['svgo'], 
            // },
            mode: {
                inline: true, // Prepare for inline embedding
                stack: {
                    sprite: "../../svg/sprite.svg"
                }
            }
        }))
        .pipe(gulp.dest(paths.sprites.dist))
        .pipe(debug({
            "title": "Sprites"
        }))
        .on("end", browsersync.reload);
});