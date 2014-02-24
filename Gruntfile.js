'use strict';

module.exports = function (grunt) {
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        clean: ["assets/css", "assets/js", "lib/vendor/gs_libs"],

        concat: {

            /* Concat the JS  */
            js: {
                files: {
                    'assets/js/main.js': [
                        'build/js/vendor/jquery-1.11.0.min.js',
                        'build/js/plugins.js',
                        'build/js/main.js'
                    ]
                }
            },

            /* Concat the SCSS */
            css: {
                files: {
                    'assets/css/main.scss': [
                        'build/css/mixins.scss',
                        'build/css/helper_classes.scss',
                        'build/css/typography.scss',
                        'build/css/grid.scss',
                        'build/css/tables.scss',
                        'build/css/forms.scss',
                        'build/css/media_queries.scss'
                    ]
                }
            }
        },

        /* Now compile the SASS hotness */
        sass: {
            dist: {
                files: {
                    'assets/css/main.css': ['assets/css/main.scss']
                }
            }
        },

        uglify: {

            options: {
                preserveComments: false,
                mangle: false
            },

            build: {
                files: {
                    'assets/js/main.min.js': ['assets/js/main.js'],
                    'assets/js/html5shiv.min.js': ['build/js/vendor/html5shiv.js']
                }
            }
        },

        cssmin: {
            /* Minimize the CSS */
            minify: {
                src: 'assets/css/main.css',
                dest: 'assets/css/main.min.css'
            }
        },

        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            beforeconcat: ['build/js/main.js', 'build/js/plugins.js'],
            afterconcat: ['assets/js/main.js']
        },

        gitclone: {
            clone: {
                options: {
                    repository: 'git@bitbucket.org:karlgroves/gs_libs.git',
                    branch: 'master',
                    directory: 'lib/vendor/gs_libs'
                }
            }
        }

    });

    grunt.registerTask('default', ['clean', 'concat', 'sass', 'uglify', 'cssmin', 'jshint', 'gitclone']);
};