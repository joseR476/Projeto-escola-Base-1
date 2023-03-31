import HOME from "./modules/root.js";

$(function () {

    $('.bt-excluir').click(function () {

        let modal = $(this).attr('href');
        let endereco = $(this).attr('endereco');
        $(modal+' #bt-excluir').attr('href', endereco);

    });

    $('#mostrar_por_pagina').change(function () {
        let por_pagina = $(this).val();
        $.post(
            HOME()+'/scripts/set-por-pagina',
            { quantidade: por_pagina },
            function (data) {
                if(data.status === 'ok'){
                    location.reload();
                }
            }, 'json'
        );
    });

})