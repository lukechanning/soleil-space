module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        sass: {
            options: {
                includePaths: ['bower_components/foundation/scss']
            },
            dist: {
                options: {
                    outputStyle: 'compressed',
                    sourceMap: true,
                },
                files: {
                    'css/app.css': 'scss/app.scss',
                    'css/style.css': 'scss/style.scss'
                }
            }
        },

        watch: {
            grunt: {
                options: {
                    reload: true
                },
                files: ['Gruntfile.js']
            },

            //To use Compass instead of lib-sass, uncomment this task and comment out the one below it:
            //compass: {
            //    files: 'scss/**/*.scss',
            //    tasks: ['compass']
            //}

            sass: {
                files: 'scss/**/*.scss',
                tasks: ['sass']
            }
        },

        compass: {
            dist: {
                options: {
                    importPath: 'bower_components/foundation/scss',
                    sassDir: 'scss',
                    cssDir: 'css',
                    environment: 'production',
                    outputStyle: 'compressed'
                }
            }
        },

        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/modernizr.min.js': ['bower_components/modernizr/modernizr.js'],
                    'js/parallax.min.js': ['bower_components/parallax.js/parallax.js'],
                    'js/owl.min.js': ['bower_components/owl.carousel/dist/owl.carousel.js'],
                    'js/sidr.min.js': ['bower_components/sidr/jquery.sidr.min.js'],
                }
            }
        },

        copy: {
            main: {
                nonull: true,
                files : [
                    {src: 'bower_components/foundation/js/foundation.min.js', dest: 'js/foundation.min.js'},
                    {src: 'bower_components/owl.carousel/dist/assets/owl.carousel.min.css', dest: 'css/owl.carousel.min.css'},
                    {src: 'bower_components/owl.carousel/dist/assets/owl.theme.default.min.css', dest: 'css/owl.default.min.css'},
                ]
            }
        }

    });

    grunt.loadNpmTasks('grunt-contrib-compass')
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');

    //To use Compass instead of lib-sass, uncomment this line and comment out the one below it:
    //grunt.registerTask('style', ['compass']);
    grunt.registerTask('style', ['sass']);

    grunt.registerTask('build', ['style', 'uglify', 'copy']);
    grunt.registerTask('default', ['style', 'watch']);
}