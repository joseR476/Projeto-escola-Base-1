module.exports = function(grunt){

    require('jit-grunt')(grunt);

    grunt.initConfig({

        less:{
            development: {
                files: {
                    'assets/css/boot.css' : 'assets/css/boot.less',
                    'assets/css/estilo-tela-login.css' : 'assets/css/estilo-tela-login.less',
                    'assets/css/estilo-tela-login-nova.css' : 'assets/css/estilo-tela-login-nova.less',
                    'assets/css/menu.css' : 'assets/css/menu.less',
                    'assets/css/estilo-painel.css' : 'assets/css/estilo-painel.less',
                    'assets/css/estilos-personalizados-painel.css' : 'assets/css/estilos-personalizados-painel.less',
                    'assets/css/estilo-site.css' : 'assets/css/estilo-site.less',
                    'assets/css/relatorios.css' : 'assets/css/relatorios.less',
                    'assets/css/relatorios-pdf.css' : 'assets/css/relatorios-pdf.less',
                }
            }
        },

        watch: {
            styles: {
                files: ['**/*.less'],
                tasks: ['less']
            }
        }

    });

    grunt.registerTask('default', ['less','watch']);

};
