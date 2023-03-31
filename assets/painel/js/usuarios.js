import HOME from "../../js/modules/root.js";

$(function () {

    $('.mascara-telefone').mask('(99)99999-9999');
    $('.mascara-cep').mask('99.999-999');

    $('.box-imagem').click(function () {
        $('#imagem').click();
    })

    $('#imagem').change(function () {
        readURL(this, 'bt-imagem');
    });

    function readURL(input, element) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                //$('#'+element+' #preview-imagem').remove();
                $('#'+element).css({'background': 'url('+e.target.result+') 50% 50% no-repeat', 'background-size' : 'cover'});
                $('#'+element).find('.material-icons').remove();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#senha_atual').keyup(function () {

        let dados = $(this).val();
        if(dados !== ''){
            $('#senha').attr('required', true);
        } else {
            $('#senha').attr('required', false);
        }

    });

    $('#salvar').click(function () {

        var senha = $('#senha').val();
        var confirma_senha = $('#confirma_senha').val();

        if(senha != confirma_senha){
            $('#chama-senha-dialog').click();

            $("#senha-modal").modal({
                escapeClose: false,
                clickClose: false,
            });

            return false;
        }

    });

});

function readURL(input, element) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            //$('#'+element+' #preview-imagem').remove();
            $('#'+element).css({'background': 'url('+e.target.result+') 50% 50% no-repeat', 'background-size' : 'cover'});
            $('#'+element).find('.material-icons').remove();
        }

        reader.readAsDataURL(input.files[0]);
    }
}

let vmApp = new Vue({
    el: '#vmApp',

    data: {},

    methods: {

        abrirModalAlteraSenha(){
            $('#alterar-senha-modal').modal({
                showClose: false,
                clickClose: false,
            });
        }

    },

    mounted(){}
});

let vmModalAlterarSenha = new Vue({
    el: '#alterar-senha-modal',

    data: {},

    methods: {

        async alterarSenha(){

            let id = document.querySelector('#id').value;
            let senha_atual = document.querySelector('#senha_atual').value;
            let nova_senha = document.querySelector('#nova_senha').value;
            let confirma_nova_senha = document.querySelector('#confirma_nova_senha').value;

            let dados = new FormData();
            dados.append('id', id);
            dados.append('senha_atual', senha_atual);
            dados.append('nova_senha', nova_senha);
            dados.append('confirma_nova_senha', confirma_nova_senha);

            if(
                senha_atual === '' ||
                nova_senha === '' ||
                confirma_nova_senha === ''
            ){
                $('#campos-obrigatorios-senha-modal').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });
                return false;
            }

            if(nova_senha !== confirma_nova_senha){
                $('#senha-modal').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });
                return false;
            }

            let response = await fetch(
                HOME()+'/scripts/alterar-senha-usuario', {
                    method: 'post',
                    body: dados,
                }
            )

            let data = await response.json();

            if(data.status === 'ok'){

                $('#senha-alterada-modal').modal({
                    showClose: false,
                    clickClose: false,
                });

            } else {

                $('#erro-senha-atual-modal').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });

            }

        }

    },

    mounted(){}
});
