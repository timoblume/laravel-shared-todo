module.exports = function(grunt){
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
	});

	grunt.initConfig({
	/* Nach Änderungen suchen */
	  watch: {
		less: {
		    files: ['less/styles.less',],
		    tasks: ['less'],
		},
	  },
	  /* Less Compilieren und in CSS umwandeln */
	  less: {
		development: {
		    files: {
		      "css/styles.css": "less/styles.less"
		    },
		},
	  },

	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-less');
};