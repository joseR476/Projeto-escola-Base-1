export default function validacao(campos) {

    let continuar = true;

    campos.forEach(campo => {

        if(continuar){

            if(document.querySelector(campo.elemento).value === ''){

                let modal = criaModal(campo.titulo, campo.mensagem);

                if(!document.getElementById('validacao-modal')){
                    document.body.insertAdjacentHTML('beforeend', modal);
                } else {
                    document.querySelector('#titulo-modal-modal').innerHTML = campo.titulo;
                    document.querySelector('#texto-modal-modal').innerHTML = campo.mensagem;
                }

                $('#validacao-modal').modal({
                    showClose: false,
                    clickClose: false,
                    closeExisting: false,
                });

                continuar = false;

            }

        }

    });

    return continuar;

}

function criaModal(titulo, mensagem) {

    let modal = '' +
        '<div id="validacao-modal" class="modal">' +
        '' +
        '        <div class="grid-modal">' +
        '' +
        '            <span class="material-icons icone-modal texto-cor-erro">error</span>' +
        '            <div class="espaco10"></div>' +
        '' +
        '            <h2 id="titulo-modal-modal" class="subtitulo font-bold">'+titulo+'</h2>' +
        '            <div class="espaco20"></div>' +
        '' +
        '            <p id="texto-modal-modal">'+mensagem+'</p>' +
        '            <div class="espaco20"></div>' +
        '' +
        '            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">OK</a>' +
        '' +
        '        </div>' +
        '' +
        '' +
        '    </div>';

    return modal;

}