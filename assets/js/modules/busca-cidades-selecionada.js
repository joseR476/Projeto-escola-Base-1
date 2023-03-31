import HOME from './root.js';

export default function buscaCidadesSelecionada(estado_id, nome_cidade, elemento_retorno) {

    let dados = new FormData();
    dados.append('estado_id', estado_id);
    dados.append('nome_cidade', nome_cidade);

    const url = HOME()+'/scripts/busca-cidades-selecionada';
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