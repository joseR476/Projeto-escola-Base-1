import HOME from "../../js/modules/root.js";
import vmModalExcluir from "../../modules/excluir-modal.js";

let vmApp = new Vue({

    el: '#vmApp',

    data: {},

    methods: {

        ordenacao() {

            if(document.querySelector('.tabelaOrdem')){
                var tabela = ".tabelaOrdem";
                $(tabela).tableDnD();
                $(tabela + " tr .ordem").val(function (index) {
                    return index + 1;
                });
                $(tabela).mouseup(function () {
                    $(tabela + " tr .ordem").val(function (index) {
                        return index + 1;
                    });
                });
            }
        },

        novo(){

            vmCadastroModal.titulo = 'Adicionar Aluno a Turma';
            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });

        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-aluno-turma', id_registro, true, true);
        },

    },

    mounted()
    {
        this.ordenacao();
    }

});

let vmCadastroModal = new Vue({

    el: '#cadastro-modal',

    data: {
        titulo: '',
        registros: [],
    },

    methods: {

        async carregarDados(){

            let pesquisa = document.querySelector('#pesquisa_modal').value;
            let dados = new FormData();
            dados.append('pesquisa', pesquisa);

            let response = await fetch(
                HOME()+'/scripts/buscar-aluno-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                this.registros = data.registros;
            }

        },

        async adicionar(id_aluno)
        {

            let id_turma = document.querySelector('#id_turma').value;

            let dados = new FormData();
            dados.append('id_turma', id_turma);
            dados.append('id_aluno', id_aluno);

            let response = await fetch(
                HOME()+'/scripts/novo-aluno-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'erro'){
                $('#erro-modal').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });
            } else {
                $('#sucesso').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });
            }

        }

    },

    mounted(){
        this.carregarDados();
    }

});
