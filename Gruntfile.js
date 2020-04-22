module.exports = function (grunt) {

    // passed environment via Makefile
    var env = process.env.APP_TARGET_ENV;

    // sets task type based on environment
    var task_type = (['int', 'test', 'live'].indexOf(env) >= 0) ?
        'dist' :
        'dev';

    var sassFilesArray = [{
        expand: true,
        cwd: 'assets/css',
        src: ['**/*.scss', '!**/_*.scss'],
        rename: function(destBase, destPath, options) {
            return options.cwd + '/../../../web/assets/css/' + destPath.replace(/\.scss/, '.css');
        }
    }];

    // Project configuration.
    grunt.initConfig({
        assetsPath: 'app/assets',
        outputPath: 'web/assets',

        // Store your Package file so you can reference its specific data whenever necessary
        pkg: grunt.file.readJSON('package.json'),

        jshint: {
            // Prefix a path with ! to ignore it
            files: [
                'Gruntfile.js',
                '<%=assetsPath%>/js/**/*.js',
                '!<%=assetsPath%>/js/vendor/**/*.js'
            ],
            options: {
                jshintrc: '.jshintrc'
            }
        },

        requirejs: {
            options: {
                baseUrl: '<%=assetsPath%>/js',
                dir: '<%=outputPath%>/js',
                optimize: 'uglify2',
                skipDirOptimize: true,
                optimizeCss: false,
                generateSourceMaps: true,
                preserveLicenseComments: false,
                modules: [
                    { name: 'main' }
                ]
            },
            dev: {
                options: {
                    optimize: 'none'
                }
            },
            dist: {}
        },

        qunit: {
            all: [ '<%=assetsPath%>/js-test/**/*.html' ]
        },

        sass: {
            options: {
                includePaths: [
                    '<%=assetsPath%>/css'
                ],
                precision: 8,
                sourceMap: false
            },
            dev: {
                files: sassFilesArray,
                options: {
                    sourceMap: true
                }
            },
            dist: {
                files: sassFilesArray
            }
        },

        copy: {
            assets: {
                expand: true,
                cwd: '<%=assetsPath%>',
                src: [
                    'img/**'
                ],
                dest: '<%=outputPath%>'

            }
        },

        // Run: `grunt watch` from command line for this section to take effect
        watch: {
            options: {
                nospawn: true,
                livereload: true
            },
            scripts: {
                files: [
                    '<%=assetsPath%>/js/**/*.js',
                    '<%=assetsPath%>/js-test/**/*.js'
                ],
                tasks: ['requirejs:dev', 'jshint'/*, 'qunit'*/]
            },
            sass: {
                files: ['<%=assetsPath%>/css/**/*.scss'],
                tasks: ['sass:dev']
            },
            otherAssets: {
                files: ['<%assetsPath%>/img/**'],
                tasks: ['copy:assets']
            }
        }

    });

    // Load NPM Tasks
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-sass');

    // Default Task
    grunt.registerTask('default', ['sass:'+ task_type, 'requirejs:'+ task_type, 'jshint', 'copy:assets'/*, 'qunit'*/]);
};