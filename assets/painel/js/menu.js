window.addEventListener('DOMContentLoaded', (event) => {
    aplicaEstadoMenu();

    let btMenuMobile = document.querySelector('#bt-menu-mobile');
    btMenuMobile.addEventListener('click', (event) => {
        sidebar.classList.toggle('close');
        verificaMenuMobile();
    });

    let btFecharMenuMobile = document.querySelector('#close-menu-mobile');
    btFecharMenuMobile.addEventListener('click', (event) => {
        sidebar.classList.toggle('close');
        verificaMenuMobile();
    });

    verificaVisibilidadeMenuMobile();

});

window.addEventListener('resize', (event) => {

    let largura = document.documentElement.clientWidth;
    verificaVisibilidadeMenuMobile();

    if(largura >= 960 && sidebar.classList.contains("close")){
        aplicaEstadoMenu();
        sidebar.style.marginLeft = '0';
    }

});

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");

/*
let arrows = document.querySelectorAll(".arrow");

arrows.forEach(element => {
    element.addEventListener('click', e => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
})
*/

//-----------------------------
//Inserção
let LIs = sidebar.querySelectorAll('li');
LIs.forEach(element => {

    element.addEventListener('click', event => {
        if(element.querySelector('.arrow')){
            element.classList.toggle('showMenu');
        }
    });

});
//-----------------------------

sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");

    if(sidebar.classList.contains('close')){
        setEstadoMenu('close');
    } else {
        setEstadoMenu('');
    }

    aplicaEstadoMenu();

});

function verificaVisibilidadeMenuMobile() {
    let largura = document.documentElement.clientWidth;
    //console.log(largura);

    if(largura <= 961){
        sidebar.classList.add('close');
        sidebar.style.marginLeft = '-100px';
    }
}

function verificaMenuMobile() {
    if(sidebar.classList.contains('close')){
        sidebar.style.marginLeft = '-100px';
    } else {
        sidebar.style.marginLeft = '0';
    }
}

function abreFechaConteudo() {
    let estado_menu = getEstadoMenu();

    /*
    if(estado_menu === 'close'){
        document.querySelector('#content').classList.remove('content-fechado');
        document.querySelector('#content').classList.add('content-aberto');
    } else {
        document.querySelector('#content').classList.add('content-fechado');
        document.querySelector('#content').classList.remove('content-aberto');
    }
     */
}

function setEstadoMenu(estado) {
    localStorage.setItem('estado_menu', estado);
}

function getEstadoMenu() {
    return localStorage.getItem('estado_menu');
}

function aplicaEstadoMenu() {
    let estado_menu = getEstadoMenu();

    if(estado_menu === ''){
        document.querySelector('.sidebar').classList.remove('close');

        document.querySelector('#content').classList.add('content-fechado');
        document.querySelector('#content').classList.remove('content-aberto');
    } else {
        document.querySelector('.sidebar').classList.add('close');

        document.querySelector('#content').classList.remove('content-fechado');
        document.querySelector('#content').classList.add('content-aberto');
    }

    abreFechaConteudo();
}
