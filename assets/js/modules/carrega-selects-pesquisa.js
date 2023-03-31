//Necessita do jQuery carregado no site para funcionar
//É utilizado para carregar os selects que utilizam o select2

export let selects_pesquisa = {};

export function carregaSelectsPesquisa(selects) {
    setTimeout(() => {
        $(function () {
            Object.keys(selects).forEach((item) => {
                console.log(selects[item].id);
                $(selects[item].id).val(selects[item].dado).trigger('change');
            });
        });
    }, 300);
}