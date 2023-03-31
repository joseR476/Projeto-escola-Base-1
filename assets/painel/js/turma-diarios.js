import HOME from "../../js/modules/root.js";
import vmModalExcluir from "../../modules/excluir-modal.js";
import mostraDatePicke from "../../components/datetime-picker/options.js";

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
        setTimeout(() => {
            mostraDatePicke('#data_diario');
        }, 150)
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
            document.querySelector('#id_turma').value = '';
            document.querySelector('#data_diaraio').value = '';
            document.querySelector('#id_materia_diario').value = '';
            document.querySelector('#observacoes').value = '';
        },

        async buscarRegistro(id_registro){

            let dados = new FormData();
            dados.append('id', id_registro);

            let response = await fetch(
                HOME()+'/scripts/buscar-diario-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id').value = data.registro.id;
                document.querySelector('#id_turma').value = data.registro.id_turma;
                document.querySelector('#data_diaraio').value = data.registro.data;
                document.querySelector('#id_materia_diario').value = data.registro.id_materia;
                document.querySelector('#observacoes').value = data.registro.observacoes;
            }

        },

        async salvar()
        {

            let id = document.querySelector('#id').value;
            let id_turma = document.querySelector('#id_turma').value;
            let data_diario = document.querySelector('#data_diario').value;
            let id_materia = document.querySelector('#id_materia_diario').value;
            let observacoes = document.querySelector('#observacoes').value;


            let dados = new FormData();
            dados.append('id', id);
            dados.append('id_turma', id_turma);
            dados.append('data', data_diario);
            dados.append('id_materia', id_materia);
            dados.append('observacoes', observacoes);

            let response = await fetch(
                HOME()+'/scripts/novo-diario-turma',{
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                location.href = HOME()+'/painel/alterar-diario-turma/'+id_turma+'/'+id_materia+'/'+data.id;
            }

        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-diario-turma', id_registro, true, true);
        },

    }

});
