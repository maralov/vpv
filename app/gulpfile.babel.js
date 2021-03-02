"use strict";

import gulp from "gulp";

const requireDir = require("require-dir"),
    paths = {
        views: {
            src: [
                "./src/views/**/*.php"
            ],
            dist: "../",
            watch: [
                "./src/views/**/*.php"
            ]
        },
        styles: {
            src: "./src/styles/main.{scss,sass}",
            dist: "../assets/styles/",
            watch: [
                "./src/blocks/**/*.{scss,sass}",
                "./src/styles/**/*.{scss,sass}"
            ]
        },
        scripts: {
            src: "./src/js/index.js",
            dist: "../assets/js/",
            watch: [
                "./src/blocks/**/*.js",
                "./src/js/**/*.js"
            ]
        },
        images: {
            src: [
                "./src/img/**/*.{jpg,jpeg,png,gif,tiff,svg}",
                "!./src/img/favicon/*.{jpg,jpeg,png,gif,tiff}"
            ],
            dist: "../assets/img/",
            watch: "./src/img/**/*.{jpg,jpeg,png,gif,svg,tiff}"
        },
        sprites: {
            src: "./src/img/svg/*.svg",
            dist: "../assets/img/sprites/",
            watch: "./src/img/svg/*.svg"
        },
        fonts: {
            src: "./src/fonts/**/*.{woff,woff2}",
            dist: "../assets/fonts/",
            watch: "./src/fonts/**/*.{woff,woff2}"
        },
        favicons: {
            src: "./src/img/favicon/*.{jpg,jpeg,png,gif}",
            dist: "../assets/img/favicons/",
        },
        gzip: {
            src: "./src/.htaccess",
            dist: "../"
        }
    };

requireDir("./gulp-tasks/");

export { paths };

export const development = gulp.series("clean", "smart-grid",
    gulp.parallel(["views", "styles", "scripts", "images", "sprites", "fonts", "favicons"]),
    gulp.parallel("serve"));

export const prod = gulp.series("clean",
    gulp.parallel(["views", "styles", "scripts", "images", "sprites", "fonts", "favicons", "gzip"]));

export default development;
