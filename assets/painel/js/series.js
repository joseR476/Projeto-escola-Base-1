import HOME from "../../js/modules/root.js";
import vmModalExcluir from "../../modules/excluir-modal.js";

let vmApp = new Vue({

    el: '#vmApp',

    data: {},

    methods: {

        novo(){

            vmCadastroModal.titulo = 'Nova Série';
            vmCadastroModal.limparFormulario();

            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });

        },

        async alterar(id_registro){
            vmCadastroModal.titulo = 'Alterar Série';
            await vmCadastroModal.buscarRegistro(id_registro);

            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });
        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-serie', id_registro, true, true);
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
            document.querySelector('#nome').value = '';
        },

        async buscarRegistro(id_registro){

            let dados = new FormData();
            dados.append('id', id_registro);

            let response = await fetch(
                HOME()+'/scripts/buscar-serie', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id').value = data.registro.id;
                document.querySelector('#nome').value = data.registro.nome;
            }

        },

        async salvar()
        {

            let id = document.querySelector('#id').value;
            let nome = document.querySelector('#nome').value;

            let dados = new FormData();
            dados.append('id', id);
            dados.append('nome', nome);

            let response = await fetch(
                id === '' ? HOME()+'/scripts/nova-serie' : HOME()+'/scripts/alterar-serie', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                location.reload();
            }

        }

    }

});
