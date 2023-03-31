import HOME from './root.js';

export default function buscaCidades(estado_id, elemento_retorno) {

    let dados = new FormData();
    dados.append('estado_id', estado_id);

    const url = HOME()+'/scripts/busca-cidades';
    const options = {
        method: 'POST',
        body: dados
    }

    let promessa = new Promise((resolve, reject) => {
        fetch(url, options)
            .then(response => response.text())
            .then(data => {
                resolve(data);
            });
    })

    promessa
        .then(data => {
           document.querySelector(elemento_retorno).innerHTML = data;
        });



}