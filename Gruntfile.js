'use strict'

// Module dependencies.
var livereloadSnippet = require('grunt-contrib-livereload/lib/utils').livereloadSnippet;
var path              = require('path');

// Mount folder to connect.
var mountFolder = function (connect, dir) {
  return connect.static(require('path').resolve(dir));
};

module.exports = function (grunt) {

  // Load all Grunt tasks
  require('matchdep').filterAll('grunt-*').forEach(grunt.loadNpmTasks);

  // Grunt configuration.
  // --------------------
  grunt.initConfig({

    // Load folders configuration.
    appConfig: grunt.file.readJSON('./config/appConfig.json'),

    // Clean folders before compile assets.
    clean: {
      dev     : '<%= appConfig.app.dev %>',
      dist    : '<%= appConfig.app.dist %>',
      html    : '<%= appConfig.app.dev %>/**/*.html',
      scripts : '<%= appConfig.app.dev %>/<%= appConfig.app.assets.scripts %>',
      styles  : '<%= appConfig.app.dev %>/<%= appConfig.app.assets.styles %>',
      test    : '<%= appConfig.app.dev %>/<%= appConfig.app.test %>',

      options : {
        force : true
      }
    },

    // 

    // 

    // Start local server.
    connect: {
      dev: {
        options: {
          port       : 3000,
          hostname   : 'localhost',
          middleware : function (connect) {
            return [
              livereloadSnippet,
              mountFolder(connect, grunt.template.process('<%= appConfig.app.dev %>')),
              mountFolder(connect, grunt.template.process('<%= appConfig.app.src %>'))
            ]
          }
        }
      },

      dist: {
        options: {
          port       : 3000,
          hostname   : 'localhost',
          middleware : function (connect) {
            return [
              mountFolder(connect, grunt.template.process('<%= appConfig.app.dist %>'))
            ]
          }
        }
      }
    },

    // Copy files and folders.
    copy: {
      dev: {
        files: [{
          cwd    : '<%= appConfig.app.src %>',
          dest   : '<%= appConfig.app.dev %>',
          expand : true,
          src    : [ '**/*' ]
        }]
      },

      dist: {
        files: [{
          cwd    : '<%= appConfig.app.dev %>',
          dest   : '<%= appConfig.app.dist %>',
          dot    : true,
          expand : true,
          src    : [
            '**/*',
            '!test/**',
            '!**/lib/**',
            '!**/*.jade',
            '!**/<%= appConfig.app.assets.templates %>/**',
            '!**/<%= appConfig.app.assets.scripts %>/**',
            '!**/<%= appConfig.app.assets.styles %>/**'
          ]
        }]
      }
    },

    // Minify HTML files.
    htmlmin: {
      dist: {
        options: {
          removeCommentsFromCDATA   : true,
          collapseWhitespace        : true,
          collapseBooleanAttributes : true,
          removeAttributeQuotes     : true,
          removeRedundantAttributes : true,
          useShortDoctype           : true,
          removeEmptyAttributes     : true,
          removeOptionalTags        : true
        },

        files: [{
          expand : true,
          cwd    : '<%= appConfig.app.dist %>',
          dest   : '<%= appConfig.app.dist %>',
          src    : '**/*.html'
        }]
      }
    },

    // 

    // Run unit tests.
    karma: {
      unit: {
        configFile : 'config/unit.conf.js'
      },
      continuous: {
        configFile : 'config/unit.conf.js',
        singleRun  : true,
        browsers   : [ 'PhantomJS' ]
      }
    },

    // Generate anotations for angular injections.
    ngmin: {
      dist: {
        cwd    : '<%= appConfig.app.dist %>/<%= appConfig.app.assets.scripts %>',
        expand : true,
        src    : [ '**/*.js' ],
        dest   : '<%= appConfig.app.dist %>/<%= appConfig.app.assets.scripts %>'
      }
    },

    // Inline AngularJS templates.
    ngtemplates: {
      dist: {
        options: {
          base   : '<%= appConfig.app.dev %>',
          module : '<%= appConfig.app.ngModule %>'
        },
        src  : '<%= appConfig.app.dev %>/<%= appConfig.app.assets.templates %>/**/*.html',
        dest : '<%= appConfig.app.dev %>/<%= appConfig.app.assets.scripts %>/templates.js'
      }
    },

    // Open a web server with a given URL.
    open: {
      server: {
        path: 'http://localhost:3000'
      }
    },

    // Watch for changes in assets and compile.
    watch: {
      app: {
        files   : '{<%= appConfig.app.dev %>,<%= appConfig.app.src %>}/**/*.{css,html,js,jpg,jpeg,png}',
        options : {
          livereload : true
        }
      },
      karma: {
        files   : '{<%= appConfig.app.dev %>/test,<%= appConfig.app.test %>}/**/*.js',
        tasks   : 'karma:continuous'
      },
      test: {
        files : '<%= appConfig.app.test %>/**/*.coffee',
        tasks : 'compile:coffeeTest'
      }
    },


    // Use minified assets on HTML files depending on environment.
    usemin: {
      html : [ '<%= appConfig.app.dist %>/**/*.html' ]
    },

    // Prepare usemin to compile assets in the specified order.
    useminPrepare: {
      html    : '<%= appConfig.app.dev %>/**/*.html',
      options : {
        dest : '<%= appConfig.app.dist %>'
      }
    }
  });

  // Custom tasks.
  // -------------

  

  // Compress, concatenate, generate documentation and run unit tests.
  grunt.registerTask('build', function () {

    // Run all builder tasks.
    grunt.task.run([
      'clean:dist',
      'copy:dev',
      'copy:dist',
      'ngtemplates',
      'useminPrepare',
      'concat',
      'cssmin',
      'ngmin',
      'uglify',
      'usemin',
      'htmlmin',
      'clean:dev'
    ]);

    // Passing the flag --preview, after the build a server will be started to
    // preview your build.
    if (grunt.option('preview')) {
      grunt.task.run([ 'open', 'connect:dist:keepalive' ]);
    };
  });

  // Start local server and watch for changes in files.
  grunt.registerTask('dev', [
    'connect:dev',
    'open',
    'watch'
  ]);

  // Alias build task as Grunt default task.
  grunt.registerTask('default', [
    'build'
  ]);
};
