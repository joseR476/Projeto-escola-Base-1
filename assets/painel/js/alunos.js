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

    $('.bt-excluir').click(function () {
        let endereco = document.querySelector('.bt-excluir').dataset.endereco;
        document.querySelector('#bt-excluir').setAttribute('href', endereco);
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
