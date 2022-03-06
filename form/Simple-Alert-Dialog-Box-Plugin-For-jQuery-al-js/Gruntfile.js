module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*!\n * <%= pkg.name %>.min.js v<%= pkg.version %> (https://github.com/nathanfrancy/al)\n * By Nathan Francy\n */',
            },
            build: {
                src: 'src/<%= pkg.name %>.js',
                dest: 'dist/<%= pkg.name %>.min.js'
            }
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('default', ['uglify']);

};