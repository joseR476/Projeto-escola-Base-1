let vmDuvidas = new Vue({
    el: '#sessao-lista-duvidas',
    data:{},
    methods: {
        toggleResposta(event){

            let pergunta = event.currentTarget.dataset.idResposta;
            if(document.querySelector(`#resposta-${pergunta}`).classList.contains('mostrar-resposta')){
                event.currentTarget.classList.remove('resposta-aberta');
                document.querySelector(`#resposta-${pergunta}`).classList.remove('mostrar-resposta')
            } else {
                event.currentTarget.classList.add('resposta-aberta');
                document.querySelector(`#resposta-${pergunta}`).classList.add('mostrar-resposta')
            }

        },
    },
    mounted(){},
});