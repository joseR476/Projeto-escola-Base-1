import HOME from "../../js/modules/root.js";
import vmModalExcluir from "../../modules/excluir-modal.js";

let vmApp = new Vue({

    el: '#vmApp',

    data: {},

    methods: {

        novo(){

            vmCadastroModal.titulo = 'Nova Matéria';
            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });

        },

        async alterar(id_registro){

            vmCadastroModal.titulo = 'Alterar Matéria';await vmCadastroModal.buscarRegistro(id_registro);

            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });
        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-materia-turma', id_registro, true, true);
        },

    },

    mounted()
    {

    }

});

let vmCadastroModal = new Vue({

    el: '#cadastro-modal',

    data: {
        titulo: '',
    },

    methods: {

        limparFormulario()
        {
            document.querySelector('#id').value = '';
            document.querySelector('#id_materia').value = '';
            document.querySelector('#id_professor').value = '';
            document.querySelector('#observacoes').value = '';
        },

        async buscarRegistro(id_registro){

            let dados = new FormData();
            dados.append('id', id_registro);

            let response = await fetch(
                HOME()+'/scripts/buscar-materia-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id').value = data.registro.id;
                document.querySelector('#id_turma').value = data.registro.id_turma;
                document.querySelector('#id_materia').value = data.registro.id_materia;
                document.querySelector('#id_professor').value = data.registro.id_professor;
                document.querySelector('#observacoes').value = data.registro.observacoes;
            }

        },

        async salvar()
        {

            let id = document.querySelector('#id').value;
            let id_turma = document.querySelector('#id_turma').value;
            let id_materia = document.querySelector('#id_materia').value;
            let id_professor = document.querySelector('#id_professor').value;
            let observacoes = document.querySelector('#observacoes').value;

            let dados = new FormData();
            dados.append('id', id);
            dados.append('id_turma', id_turma);
            dados.append('id_materia', id_materia);
            dados.append('id_professor', id_professor);
            dados.append('observacoes', observacoes);

            let response = await fetch(
                id === '' ? HOME()+'/scripts/nova-materia-turma' : HOME()+'/scripts/alterar-materia-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                location.reload();
            }

        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-materia-turma', id_registro, true, true);
        },

    }

});
