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
                }
            }
        },

        copy: {

			options: {
				separator: ';'
			},

			main: {

				src: [

					// Foundation core
					'bower_components/foundation/js/foundation/foundation.min.js',

					// Pick the components you need in your project
					'bower_components/foundation/js/foundation/foundation.abide.js',
					'bower_components/foundation/js/foundation/foundation.accordion.js',
					'bower_components/foundation/js/foundation/foundation.alert.js',
					'bower_components/foundation/js/foundation/foundation.clearing.js',
					'bower_components/foundation/js/foundation/foundation.dropdown.js',
					'bower_components/foundation/js/foundation/foundation.equalizer.js',
					'bower_components/foundation/js/foundation/foundation.interchange.js',
					'bower_components/foundation/js/foundation/foundation.joyride.js',
					'bower_components/foundation/js/foundation/foundation.magellan.js',
					'bower_components/foundation/js/foundation/foundation.offcanvas.js',
					'bower_components/foundation/js/foundation/foundation.orbit.js',
					'bower_components/foundation/js/foundation/foundation.reveal.js',
					'bower_components/foundation/js/foundation/foundation.slider.js',
					'bower_components/foundation/js/foundation/foundation.tab.js',
					'bower_components/foundation/js/foundation/foundation.tooltip.js',
					'bower_components/foundation/js/foundation/foundation.topbar.js',

					// Include your own custom bower scripts here as needed
                    'bower_components/owl.carousel/dist/owl.carousel.min.js',
				],

				// Finally, concatenate all the files above into one single file
				dest: 'js/foundation.min.js'

			}

		},

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