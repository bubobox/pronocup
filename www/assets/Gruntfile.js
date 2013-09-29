module.exports = function(grunt) {

    var config = {
        build: 'app',
        tmp: 'tmp',
        styles: 'assets/styles',
        scss: 'assets/scss',
        scripts: 'assets/scripts',
        images: 'assets/images',
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        config: config,
        compass: {
            main: {
                options: {
                    sassDir: '<%= config.scss %>',
                    cssDir: '<%= config.styles %>',
                    imagesDir: '<%= config.images %>',
                    javascriptsDir: '<%= config.scripts %>',
                    importPath: '<%= config.build %>/bower_components',
                    environment: 'production',
                    relativeAssets: true
                }
            }
        },
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', '> 1%']
            },
            main: {
                files: [
                    {
                        src: '**/*.css',
                        cwd: '<%= config.styles %>',
                        dest: '<%= config.tmp %>',
                        ext: '.pref.css',
                        expand: true
                    }
                ]
            }
        },
        imagemin: {
            build: {
                files: [{
                        expand: true,
                        cwd: '<%= config.images %>',
                        src: '**/*.{png,jpg,jpeg}',
                        dest: '<%= config.build %>/images'
                    }]
            }
        },
        svgmin: {
            build: {
                files: [{
                        expand: true,
                        cwd: '<%= config.images %>',
                        src: '**/*.svg',
                        dest: '<%= config.build %>/images'
                    }]
            }
       },
        concat: {
            head: {
                src: [
                    '<%= config.build %>/bower_components/html5shiv/src/html5shiv.js',
                    '<%= config.build %>/bower_components/modernizr/modernizr.js'
                ],
                dest: '<%= config.tmp %>/head-script.js'
            },
            foot: {
                src: [
                    '<%= config.build %>/bower_components/jquery/jquery.js',
                    '<%= config.build %>/bower_components/jquery-placeholder/jquery.placeholder.min.js',
                    '<%= config.build %>/bower_components/salvattore/salvattore.js',
                    '<%= config.scripts %>/**/*.js'
                ],
                dest: '<%= config.tmp %>/foot-script.js'
            }
        },
        copy: {
            js: {
                files: [{
                        expand: true,
                        cwd: '<%= config.tmp %>/min',
                        dest: '<%= config.build %>',
                        src: [
                            'head-script.js', 'foot-script.js'
                        ]
                    }]
            },
            css: {
                files: [{
                        expand: true,
                        cwd: '<%= config.tmp %>/min',
                        dest: '<%= config.build %>',
                        src: [
                            'default.min.css',
                            'vendor.min.css'
                        ]
                    }]
            },
            others: {
                files: [{
                        expand: true,
                        cwd: 'assets',
                        dest: '<%= config.build %>',
                        src: [
                            'images/favicon.ico'
                        ]
                    }]
            }
        },
        clean: {
            tmp: {
                files: [{
                        dot: true,
                        src: '<%= config.tmp %>'
                    }]
            }
        },
        cssmin: {
            combine: {
                files: {
                    '<%= config.tmp %>/vendor.css': [
                        '<%= config.build %>/bower_components/normalize-css/normalize.css',
                        '<%= config.build %>/bower_components/font-awesome/css/font-awesome.css'
                    ]
                }
            },
            minify: {
                expand: true,
                src: '**/*.css',
                cwd: '<%= config.tmp %>',
                dest: '<%= config.tmp %>/min',
                ext: '.min.css'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            main: {
                files: {
                    '<%= config.tmp %>/min/head-script.js': ['<%= config.tmp %>/head-script.js'],
                    '<%= config.tmp %>/min/foot-script.js': ['<%= config.tmp %>/foot-script.js']
                }
            }
        }
    });

    // Default task	
    grunt.registerTask('default', ['clean', 'styles', 'scripts', 'images', 'copy:others', 'clean']);
    grunt.registerTask('styles', ['compass', 'autoprefixer', 'cssmin', 'copy:css']);
    grunt.registerTask('scripts', ['concat', 'uglify', 'copy:js']);
    grunt.registerTask('images', ['imagemin', 'svgmin']);

    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
};
