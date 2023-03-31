$(function () {

    $('.bt-excluir').click(function () {
        var modal = $(this).attr('data-target');
        var endereco = $(this).attr('endereco');
        $(modal+' #bt-excluir-registro').attr('href', endereco);
    });

    //$('[data-toggle="tooltip"]').tooltip();
    $('body [data-toggle="tooltip"]').tooltip();

});

function buscaCidade(estado, popula_elemento)
{
    var estado_id = $(estado).val();
    $.post(HOME()+'/scripts/busca-cidades', { estado_id: estado_id }, function (data) {
        $(popula_elemento).html(data);
    });
}