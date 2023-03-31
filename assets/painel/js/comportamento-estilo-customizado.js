//const topo = document.querySelector('#topo');
const aside = document.querySelector('#barra-lateral');
const content = document.querySelector('#content');

const cores = {
    'padrao' : 'texto-cor-padrao',
    'azul' : 'texto-cor-azul',
    'sucesso' : 'texto-cor-sucesso',
    'aviso' : 'texto-cor-sucesso',
    'erro' : 'texto-cor-erro',
}

if(document.querySelector('#barra-lateral')){

    defineAlturaContent();

    window.addEventListener('resize', (event) => {

        let largura = window.innerWidth;
        let content = document.getElementById('content');

        if(largura < 961){
            content.style.marginTop = '262px'
        } else {
            content.style.marginTop = '70px'
        }

    });

    let btFixaBarraLateral = document.querySelector('#fixa-barra-lateral');
    btFixaBarraLateral.addEventListener('click', (event) => {
        if(aside.classList.contains('abrir-menu-lateral')){
            aside.classList.remove('abrir-menu-lateral');
            aside.classList.add('fechar-menu-lateral');

            content.classList.remove('content-fechado');
            content.classList.add('content-aberto');
        } else {
            aside.classList.add('abrir-menu-lateral');
            aside.classList.remove('fechar-menu-lateral');

            content.classList.add('content-fechado');
            content.classList.remove('content-aberto');
        }
    });

}

function defineAlturaContent() {
    let largura = window.innerWidth;
    let content = document.getElementById('content');

    if(largura < 961){
        content.style.marginTop = '262px'
    } else {
        content.style.marginTop = '70px'
    }
}

/*-----------------------------------------------------------*/
/*Conjunto de Botões*/

function conjuntoBotoes(id_elemento) {

    if(document.querySelector(id_elemento)){

        let conjunto = document.querySelector(id_elemento);
        let botoes = conjunto.querySelectorAll('.botao-conjunto');

        botoes.forEach(element => {
            element.addEventListener('click', (event) => {

                for (var item of conjunto.querySelectorAll('.botao-conjunto')) {
                    item.classList.remove('ativo');
                }

                element.classList.add('ativo');

            })
        });

    }

}

/*Fim Conjunto de Botões*/
/*------------------------------------------------------------*/

/*-----------------------------------------------------------*/
/*Tabs*/

function tabs(id_elemento) {

    if(document.querySelector(id_elemento)){

        let tab = document.querySelector(id_elemento);
        let tabs = tab.querySelectorAll('.tab');

        tabs.forEach(element => {
            element.addEventListener('click', (event) => {

                for (var item of tab.querySelectorAll('.tab')) {
                    item.classList.remove('ativo');
                }

                for (var item of tab.querySelectorAll('.tab-content')) {
                    item.classList.remove('ativo');
                }

                let tabContentAtiva = event.currentTarget.dataset.tab;
                let corTexto = event.currentTarget.dataset.cor;

                //console.log(cores[corTexto]);

                element.classList.add('ativo');
                tab.querySelector('#'+tabContentAtiva).classList.add('ativo');

            });
        });

    }

}

function tabs_tabs(id_elemento) {

    if(document.querySelector(id_elemento)){

        let tab = document.querySelector(id_elemento);
        let tabs = tab.querySelectorAll('.tab-tab');

        tabs.forEach(element => {
            element.addEventListener('click', (event) => {

                for (var item of tab.querySelectorAll('.tab-tab')) {
                    item.classList.remove('ativo');
                }

                for (var item of tab.querySelectorAll(`.tab-tab-content`)) {
                    item.classList.remove('ativo');
                }

                let tabContentAtiva = event.currentTarget.dataset.tab;
                let corTexto = event.currentTarget.dataset.cor;

                //console.log(cores[corTexto]);

                element.classList.add('ativo');
                tab.querySelector('#'+tabContentAtiva).classList.add('ativo');

            });
        });

    }

}

/*Fim Tabs*/
/*------------------------------------------------------------*/

/*------------------------------------------------------------*/
/*Menu DropDown*/

if(document.querySelector('.box-menu-dropdown')){

    let dropdowns = document.querySelectorAll('.box-menu-dropdown');
    dropdowns.forEach((element) => {

        element.addEventListener('click', (event) => {

            for (var item of document.querySelectorAll('.box-menu-dropdown')) {
                item.classList.remove('menu-dropdown-ativo');
            }

           element.classList.toggle('menu-dropdown-ativo');

        });
    });

    document.addEventListener('click', (event) => {

        if(
            !event.target.classList.contains('box-menu-dropdown')
            && !event.target.classList.contains('dropdown')
            && !event.target.classList.contains('menu-dropdown')
        ){

            dropdowns.forEach((element) => {
                element.classList.remove('menu-dropdown-ativo');
            });

        }
    });

}

function ativaMenusDropDown(){
    let dropdowns = document.querySelectorAll('.box-menu-dropdown');
    dropdowns.forEach((element) => {

        element.addEventListener('click', (event) => {

            for (var item of document.querySelectorAll('.box-menu-dropdown')) {
                item.classList.remove('menu-dropdown-ativo');
            }

            element.classList.toggle('menu-dropdown-ativo');

        });
    });

    document.addEventListener('click', (event) => {

        if(
            !event.target.classList.contains('box-menu-dropdown')
            && !event.target.classList.contains('dropdown')
            && !event.target.classList.contains('menu-dropdown')
        ){

            dropdowns.forEach((element) => {
                element.classList.remove('menu-dropdown-ativo');
            });

        }
    });
}

/*Menu DropDown*/
/*------------------------------------------------------------*/

/*------------------------------------------------------------*/
/*Tips*/

tippy("body [data-tippy-content]");

/*
* Site Referencia:
* https://atomiks.github.io/tippyjs/
*
* Scripts
* <script src="https://unpkg.com/@popperjs/core@2"></script>
* <script src="https://unpkg.com/tippy.js@6"></script>
*
* CSS
* <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
*/

/*Tips*/
/*------------------------------------------------------------*/