!(function () {
    'use strict';
    module.exports = function (grunt) {
   var cssFiles=[
       'resource/css/main.css'
   ];
        grunt.initConfig({
            pkg: grunt.file.readJSON('package.json'),
           
            sass: {
			options: {				
				style: 'expanded',
                                compass: true
			},
			dist: {
				files: {
					'resource/css/main.css': 'scss/main.scss'
				}
			}
// compile: {
//     dist:{
//         option:{
//              sourceMap: true
//         },
//         
//        files: {
//      'assets/css/stylesheet/main.css': 'scss/main.scss'
//    }  
//     }
//   
//  }                 
//                        
		},
            cssmin: {
  target: {
    files: [{

      src: cssFiles,
      dest: 'resource/css/all.min.css'
     
    }]
  }
},
 watch: {
            sass: {
                files: ['scss/**/*.scss'],   
                tasks: ['sass','cssmin'] 
		
            }         
        }
              
        });

        // Load the plugin that provides the "uglify" task.
        grunt.loadNpmTasks('grunt-contrib-compass');
        grunt.loadNpmTasks('grunt-contrib-sass');
        grunt.loadNpmTasks('grunt-contrib-cssmin');
        grunt.loadNpmTasks('grunt-contrib-watch');

        // Default task(s).
        grunt.registerTask('default', ['sass','cssmin','watch']);

    };
})();