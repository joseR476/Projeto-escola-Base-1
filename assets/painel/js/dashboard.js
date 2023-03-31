import HOME from "../../admin/js/modules/root.js";

let btPeriodoRecebimentosPagamentos = document.querySelectorAll('.bt-abre-selecao-periodo');
let boxPeriodoSelecionado = '';

btPeriodoRecebimentosPagamentos.forEach((element) => {
    element.addEventListener('click', (event) => {
        let acao = event.currentTarget.dataset.acao;
        boxPeriodoSelecionado = acao;
        console.log(acao);

        $('#selecao-periodo-modal').modal({
            clickClose: false,
        });
    });
});

let opcoesFiltro = document.querySelectorAll('.opcao-filtro');
let calendario2 = document.querySelector('#box-calendario2');
opcoesFiltro.forEach((element) => {
    element.addEventListener('click', (event) => {
        let tipo = event.currentTarget.dataset.tipo;
        let periodo = event.currentTarget.dataset.periodo;

        removeOpcaoAtivaFiltroData();
        selecionaPeriodo(periodo);

        event.currentTarget.classList.add('ativo');
        if(tipo === 'personalizado'){
            calendario2.classList.remove('oculto');
        } else {
            calendario2.classList.add('oculto');
        }
    });
});

function removeOpcaoAtivaFiltroData() {
    opcoesFiltro.forEach((element) => {
        element.classList.remove('ativo');
    });
    calendario2.classList.add('oculto');
}



async function selecionaPeriodo(periodo) {

    let dados = new FormData();
    dados.append('periodo', periodo);

    let response = await axios({
        url: HOME()+'/scripts/selecao-periodo',
        method: 'post',
        data: dados,
    });

    if(response.data.status === 'ok'){
        btAplicarFiltroDatas.dataset.inicio = response.data.data_inicio;
        btAplicarFiltroDatas.dataset.final = response.data.data_final;
        return 'ok';
    }
}

let btAplicarFiltroDatas = document.querySelector('#bt-aplicar-filtro-datas');
btAplicarFiltroDatas.addEventListener('click', (event) => {
    //document.getElementById('filtrar-contas').click();
    aplicarFiltroDatas();
});


async function aplicarFiltroDatas() {
    let data_inicio = btAplicarFiltroDatas.dataset.inicio;
    let data_final = btAplicarFiltroDatas.dataset.final;

    let dados = new FormData();
    dados.append('data_inicio', data_inicio);
    dados.append('data_final', data_final);

    function mostraPeriodoSelecionado() {
        let data_inicio_formatada = new Date(data_inicio).toLocaleDateString('pt-BR');
        let data_final_formatada = new Date(data_final).toLocaleDateString('pt-BR');

        if(data_inicio_formatada === data_final_formatada){
            return data_inicio_formatada;
        } else {
            return 'De '+data_inicio_formatada+' à '+data_final_formatada;
        }
    }

    switch (boxPeriodoSelecionado) {
        case 'pagamentos-recebimentos':
            let response1 = await axios({
                url: HOME()+'/scripts/dashboard-pagamentos-recebimentos',
                method: 'post',
                data: dados,
            });

            if(response1.data.status === 'ok'){
                document.querySelector('#periodo-'+boxPeriodoSelecionado).textContent = mostraPeriodoSelecionado();

                document.querySelector('#total-a-receber-atrasado').textContent = response1.data.a_receber_atrasado;
                document.querySelector('#total-a-receber').textContent = response1.data.a_receber;
                document.querySelector('#total-geral-a-receber').textContent = response1.data.total_a_receber;

                document.querySelector('#total-a-pagar-atrasado').textContent = response1.data.a_pagar_atrasado;
                document.querySelector('#total-a-pagar').textContent = response1.data.a_pagar;
                document.querySelector('#total-geral-a-pagar').textContent = response1.data.total_a_pagar;

                /*
                document.querySelector('#total-atrasado').textContent = response1.data.total_atrasado;
                document.querySelector('#total-sem-atraso').textContent = response1.data.total_sem_atraso;
                document.querySelector('#total-geral').textContent = response1.data.total_geral;
                 */
            }
            break;

        case 'saldos-disponiveis':
            let response2 = await axios({
                url: HOME()+'/scripts/dashboard-saldos-disponiveis',
                method: 'post',
                data: dados,
            });

            if(response2.data.status === 'ok'){
                document.querySelector('#periodo-'+boxPeriodoSelecionado).textContent = mostraPeriodoSelecionado();
                document.querySelector('#lista-saldos').innerHTML = response2.data.saldos;
            }
            break;

        case 'ponto-equilibrio':
            let response3 = await axios({
                url: HOME()+'/scripts/dashboard-ponto-equilibrio',
                method: 'post',
                data: dados,
            });

            if(response3.data.status === 'ok'){

            }
            break;

        case 'faturamento':
            let response4 = await axios({
                url: HOME()+'/scripts/dashboard-faturamento',
                method: 'post',
                data: dados,
            });

            if(response4.data.status === 'ok'){
                document.querySelector('#periodo-faturamento').textContent = mostraPeriodoSelecionado();
                document.querySelector('#total-faturamento').innerHTML = response4.data.faturamento;
                document.querySelector('#total-receita').innerHTML = response4.data.receita;
            }
            break;


        case 'meus-orcamentos':
            let response5 = await axios({
                url: HOME()+'/scripts/dashboard-meus-orcamentos',
                method: 'post',
                data: dados,
            });

            if(response5.data.status === 'ok'){
                document.querySelector('#periodo-'+boxPeriodoSelecionado).textContent = mostraPeriodoSelecionado();
                document.querySelector('#lista-meus-orcamentos').innerHTML = response5.data.meus_orcamentos;
            }
            break;
    }

    //$('#data_inicio').val(data_inicio);
    //$('#data_final').val(data_final);

    //console.log(new Date(data_inicio).toLocaleDateString('pt-BR'));
    //console.log(new Date(data_final).toLocaleDateString('pt-BR'));

    fecharFiltroDatas();
}

function fecharFiltroDatas() {
    document.getElementById('bt-fechar-filtro-datas').click();
};


//------------------------------
//Carrengando automatico dos dados ao entrar no dashboard
setTimeout(async () => {
    function mostraPeriodoSelecionado() {

        let options = {
            timeZone: 'America/Sao_Paulo', // Lista de Timezones no fim do artigo
            hour12: false, // Alterna entre a mostragem dos horários em 24 horas, ou então AM/PM
        }

        let data_inicio = btAplicarFiltroDatas.dataset.inicio;
        let data_final = btAplicarFiltroDatas.dataset.final;

        let data_inicio_formatada = new Date(data_inicio).toLocaleDateString('pt-BR', options);
        let data_final_formatada = new Date(data_final).toLocaleDateString('pt-BR', options);


        if(data_inicio_formatada === data_final_formatada){
            return data_inicio_formatada;
        } else {
            console.log('De '+data_inicio_formatada+' à '+data_final_formatada);
            return 'De '+data_inicio_formatada+' à '+data_final_formatada;
        }
    }

    //recebimentos e pagamentos
    boxPeriodoSelecionado = 'pagamentos-recebimentos';
    let response = await selecionaPeriodo('mes');
    if(response === 'ok'){
        if(document.querySelector('#periodo-pagamentos-recebimentos')){
            document.querySelector('#periodo-pagamentos-recebimentos').textContent = mostraPeriodoSelecionado();
            btAplicarFiltroDatas.click();
        }
    }

    //saldos das contas
    boxPeriodoSelecionado = 'saldos-disponiveis';
    let response2 = await selecionaPeriodo('mes');
    if(response2 === 'ok'){
        if(document.querySelector('#periodo-saldos-disponiveis')){
            document.querySelector('#periodo-saldos-disponiveis').textContent = mostraPeriodoSelecionado();
            btAplicarFiltroDatas.click();
        }
    }

    //faturamento
    boxPeriodoSelecionado = 'faturamento';
    let response4 = await selecionaPeriodo('mes');
    if(response4 === 'ok'){
        if(document.querySelector('#periodo-faturamento')){
            document.querySelector('#periodo-faturamento').textContent = mostraPeriodoSelecionado();
            btAplicarFiltroDatas.click();
        }
    }

    //Vendedores

    //meus-orcamentos
    boxPeriodoSelecionado = 'meus-orcamentos';
    let response5 = await selecionaPeriodo('mes');
    if(response5 === 'ok'){
        if(document.querySelector('#periodo-meus-orcamentos')){
            document.querySelector('#periodo-meus-orcamentos').textContent = mostraPeriodoSelecionado();
            btAplicarFiltroDatas.click();
        }
    }


}, 100);

//------------------------------