import HOME from "./modules/root.js";

$(function () {

    if(!parseInt(sessionStorage['font_size'])){
        sessionStorage['font_size'] = 100;
        console.log(sessionStorage['font_size']);
    }

    let font_size = sessionStorage['font_size'];

    let elementBody = document.querySelector('body');
    let elementSidebar = document.querySelector('.sidebar');

    elementBody.style.fontSize = parseInt(font_size) + '%';
    elementSidebar.style.fontSize = parseInt(font_size) + '%';

    $('.bt-excluir').click(function () {

        let modal = $(this).attr('href');
        let endereco = $(this).attr('endereco');
        $(modal+' #bt-excluir').attr('href', endereco);

    });



    $('#bt-diminuir-fonte').click(function () {

        let porcentagem_diminuicao = 15;
        font_size = parseInt(font_size) - porcentagem_diminuicao ;
        sessionStorage['font_size'] = font_size;

        elementBody.style.fontSize = font_size + '%';
        elementSidebar.style.fontSize = font_size + '%';

    });



    $('#bt-aumentar-fonte').click(function () {

        let porcentagem_aumento = 15;
        font_size = parseInt(font_size) + porcentagem_aumento;
        sessionStorage['font_size'] = font_size;

        elementBody.style.fontSize = font_size + '%';
        elementSidebar.style.fontSize = font_size + '%';

    });

});
