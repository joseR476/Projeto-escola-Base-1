import HOME from "../../js/modules/root.js";
import vmModalExcluir from "../../modules/excluir-modal.js";
import mostraDatePicke from "../../components/datetime-picker/options.js";

let vmApp = new Vue({

    el: '#vmApp',

    data: {},

    methods: {

        modalRelatorio(){
            $('#relatorio-modal').modal({
                showClose: false,
                clickClose: false,
            });
        },

        novo(){

            vmCadastroModal.titulo = 'Nova Turma';
            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });

        },

        async alterar(id_registro){

            vmCadastroModal.titulo = 'Alterar Turma';
            await vmCadastroModal.buscarRegistro(id_registro);

            $('#cadastro-modal').modal({
                showClose: false,
                clickClose: false,
            });

        },

        excluir(id_registro){
            vmModalExcluir.mostrar(HOME()+'/scripts/excluir-turma', id_registro, true, true);
        },

    },

    mounted()
    {

        setTimeout(() => {
            mostraDatePicke('#data_inicio_relatorio');
            mostraDatePicke('#data_final_relatorio');
        }, 150);

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
            document.querySelector('#id_serie').value = '';
            document.querySelector('#turno').value = '';
            document.querySelector('#nome').value = '';
        },

        async buscarRegistro(id_registro){

            let dados = new FormData();
            dados.append('id', id_registro);

            let response = await fetch(
                HOME()+'/scripts/buscar-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id').value = data.registro.id;
                document.querySelector('#id_serie').value = data.registro.id_serie;
                document.querySelector('#turno').value = data.registro.turno;
                document.querySelector('#nome').value = data.registro.turma;
            }

        },

        async salvar()
        {

            let id = document.querySelector('#id').value;
            let id_serie = document.querySelector('#id_serie').value;
            let turno = document.querySelector('#turno').value;
            let nome = document.querySelector('#nome').value;

            let dados = new FormData();
            dados.append('id', id);
            dados.append('id_serie', id_serie);
            dados.append('turno', turno);
            dados.append('nome', nome);

            let response = await fetch(
                id === ''
                    ? HOME()+'/scripts/nova-turma'
                    : HOME()+'/scripts/alterar-turma', {
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

let vmRelatorioModal = new Vue({

    el: '#relatorio-modal',

    data: {},

    methods: {

        async buscarProfessores()
        {

            let id_turma = document.querySelector('#id_turma').value;

            let dados = new FormData();
            dados.append('id_turma', id_turma);

            let response = await fetch(
                HOME()+'/scripts/buscar-professores-turma', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id_professor').innerHTML = data.lista;
                await this.buscarMaterias();
            }

        },

        async buscarMaterias()
        {

            let id_turma = document.querySelector('#id_turma').value;
            let id_professor = document.querySelector('#id_professor').value;

            let dados = new FormData();
            dados.append('id_turma', id_turma);
            dados.append('id_professor', id_professor);

            let response = await fetch(
                HOME()+'/scripts/buscar-materias-professor', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#id_materia').innerHTML = data.lista;
            }

        },

        async gerar()
        {

            let dados = new FormData();
            dados.append('data_inicio', document.querySelector('#data_inicio_relatorio').value);
            dados.append('data_final', document.querySelector('#data_final_relatorio').value);
            dados.append('id_turma', document.querySelector('#id_turma').value);
            dados.append('id_professor', document.querySelector('#id_professor').value);
            dados.append('id_materia', document.querySelector('#id_materia').value);

            let response = await fetch(
                HOME()+'/scripts/gerar-relatorio', {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                let relatorio = window.open("", "Relatório", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=200,top="+(screen.height-400)+",left="+(screen.width-840));
                relatorio.document.body.innerHTML = data.conteudo;
            }

        }

    },

    mounted(){}

});