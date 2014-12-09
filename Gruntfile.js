/*global module:false*/
/*global require:false*/
/*jshint -W097*/
"use strict";

module.exports = function(grunt) {
 
    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
 
    grunt.initConfig({
 
        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {            
            options: {
                livereload: true
            },
            sass: {
                files: ['sass/**.scss'],
                tasks: ['sass']
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint']
            },
            sync: {
                files: [
                    '**',
                    '!.git*', 
                    '!node_modules', 
                    '!node_modules/**', 
                    '!.sass-cache', 
                    '!Gruntfile.js', 
                    '!package.json', 
                    '!.DS_Store',
                    '!**/.DS_Store',
                    '!README.md', 
                    '!.jshintrc',  
                    '!sass', 
                    '!sass/**'
                ],
                tasks: ['sync']
            }        
        },  

        // Sass
        sass: {
            dist: {
                files: {
                    'style.css' : 'sass/style.scss'
                }
            }
        },

        // Sync
        sync: {            
            dist: {
                files: [
                    // includes files within path
                    {
                        src: [  
                            '**',
                            '!.git*', 
                            '!node_modules', 
                            '!node_modules/**', 
                            '!.sass-cache', 
                            '!Gruntfile.js', 
                            '!package.json', 
                            '!.DS_Store',
                            '!**/.DS_Store',
                            '!README.md', 
                            '!.jshintrc',  
                            '!sass', 
                            '!sass/**'
                        ], 
                        dest: '../../themes/sofa'
                    }
                ], 
                verbose: true
            }
        },
 
        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js'
            ]
        },        

        // make POT file
        makepot: {
            target: {
                options: {
                    cwd: '',                    // Directory of files to internationalize.
                    domainPath: '/languages',   // Where to save the POT file.                    
                    mainFile: 'style.css',      // Main project file.
                    potFilename: 'sofa.pot', // Name of the POT file.
                    type: 'wp-theme',           // Type of project (wp-plugin or wp-theme).
                    updateTimestamp: true       // Whether the POT-Creation-Date should be updated without other changes.
                }
            }
        },
    });
 
    // register task
    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['jshint', 'makepot']);
};