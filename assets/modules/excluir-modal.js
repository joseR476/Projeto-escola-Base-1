import HOME from "../js/modules/root.js";

let vmModalExcluir = new Vue({
    el: '#delete-modal',

    data: {
        url: '',
        id_registro: '',
        reload: '',
    },

    methods: {

        mostrar(url, id_registro, close_existing = true, reload = false){

            this.url = url;
            this.id_registro = id_registro;
            this.reload = reload;

            $('#delete-modal').modal({
                showClose: false,
                clickClose: false,
                closeExisting: close_existing
            });

        },

        async excluir()
        {

            let dados = new FormData();
            dados.append('id', this.id_registro);

            let response = await fetch(
                this.url, {
                    method: 'post',
                    body: dados
                }
            );

            let data = await response.json();

            if(data.status === 'ok'){
                document.querySelector('#bt-fechar-modal-excluir').click();

                if(this.reload){
                    location.reload();
                }

                return true;
            } else {
                $('#erro-delete-modal').modal({
                    showClose: false,
                    clickClose: false,
                });
                return false;
            }

        }

    },
});

export default vmModalExcluir;
