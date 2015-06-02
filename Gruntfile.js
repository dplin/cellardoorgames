module.exports = function(grunt){
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            lib:{
                src: [
                    'js/flexslider.js',
                    'js/foundation.js',
                    'js/main.js',
                    'js/angular.js',
                    'js/router.es5.js',
                    'js/angular-animate.js'
                ],
                dest: 'build/lib.js',
            },
            js:{
                src: [
                    'app/doccomp-app.js',
                    'app/**/*.js'
                ],
                dest: 'build/app.js',
            },
            css:{
                src: [
                    'css/foundation.css',
                    'css/flexslider.css',
                    'css/styles.css'
                ],
                dest: 'build/styles.css',
            }
        },
        uglify: {
            options: {
                // the banner is inserted at the top of the output
                banner: '/*! Author: Derek Lin; <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            lib:{
                files: {
                    'js/lib.min.js': ['build/lib.js']
                }
            },
            js:{
                files: {
                    'js/app.min.js': ['build/app.js']
                }
            }
        },
        cssmin: {
            css:{
                files: [{
                    dest: 'css/styles.min.css',
                    src: ['build/styles.css']
                }]
            }
        },
        compass: {
            scss:{
                options:{
                    sassDir: 'scss',
                    cssDir: 'css',
                    outputStyle: 'compressed',
                    cacheDir: '/temp/sass-cache'
                }
            }
        },
        watch: {
            compass:{
                options: { livereload: true },
                files: ['scss/**/*.{scss,sass}'],
                tasks: ['compass']
            },
            js:{
                files: ['app/**/*.js'],
                tasks: ['concat:js', 'uglify:js']
            },
            lib:{
                files: ['js/**/*.js'],
                tasks: ['concat:lib', 'uglify:lib']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Build all files.  Concat .js & .css -> minify js -> minify css
    grunt.registerTask('production', ['concat', 'uglify', 'cssmin']);
    // Default
    grunt.registerTask('default', ['watch']);
};
