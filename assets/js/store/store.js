import trataValor from "../../painel/js/modules/tratavalor.js";

const vuexLocal = new window.VuexPersistence.VuexPersistence({
    storage: window.sessionStorage,
});

const store = new Vuex.Store({
    state: {

    },
    mutations: {
        /*
        LIMPAR_PRODUTOS_SIMULACAO(state){
            state.produtos_simulacao.length = 0;
        },


        ADICIONAR_PRODUTO(state, produto){
            state.produtos_simulacao.push(produto);
        },

        EXCLUIR_PRODUTO(state, id_orcamento_simulacao){
            state.produtos_simulacao = state.produtos_simulacao.filter(item => item.id_orcamento_simulacao !== id_orcamento_simulacao);
        },

        ATUALIZAR_PRODUTO(state, produto){
            let item = state.produtos_simulacao.find(item => item.id_orcamento_simulacao === produto.id_orcamento_simulacao);
            item.nome_produto = produto.nome_produto;
            item.preco_venda = produto.preco_venda !== null ? parseFloat(trataValor(produto.preco_venda).toLocaleString('pt-br', { minimumFractionDigits: 2, maximumFractionDigits: 2, currency: 'BRL' })) : 0;
        },
         */

    },

    actions: {
        /*
        limparProdutosSimulacao(context){
            context.commit('LIMPAR_PRODUTOS_SIMULACAO');
        },
         */

    },

    getters: {
        /*
        listaSimulacoes: state => {
            return state.produtos_simulacao;
        },

        verificaSeProdutoExiste: (state) => (id_orcamento_simulacao) => {
            if(state.produtos_simulacao.find(item => item.id_orcamento_simulacao === id_orcamento_simulacao)){
                return true;
            } else {
                return false;
            }
        },
         */
    },

    plugins: [vuexLocal.plugin]
});

export {
    store
}