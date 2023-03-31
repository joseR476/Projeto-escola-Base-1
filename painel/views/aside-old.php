<!--
<aside id="barra-lateral" class="custom-scrollbar abrir-menu-lateral">

    <header>

    </header>

    <div class="padding20">
        <ul id="menu-barra-lateral">

            <li>
                <a href="<?php echo HOME ?>/painel/inicio" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::INICIO, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">space_dashboard</span>
                        </div>
                        <span>Início</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/usuarios" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::USUARIOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">account_circle</span>
                        </div>
                        <span>Usuários</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/bancos" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::BANCOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">account_balance</span>
                        </div>
                        <span>Bancos</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/tipos-contas-bancarias" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::TIPOS_CONTAS_BANCATIAS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">account_balance_wallet</span>
                        </div>
                        <span>Tipos de Contas <br> Bancárias</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/contas-bancarias" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::CONTAS_BANCATIAS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">account_balance</span>
                        </div>
                        <span>Contas Bancárias</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/tipos-clientes" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::TIPOS_CLIENTES, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">contacts</span>
                        </div>
                        <span>Tipos de Clientes</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/clientes" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::CLIENTES, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">assignment_ind</span>
                        </div>
                        <span>Clientes</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/contas-contabeis" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::CONTAS_CONTABEIS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">pin</span>
                        </div>
                        <span>Conta Contábeis</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/contas-a-pagar" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::CONTAS_A_PAGAR, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">request_quote</span>
                        </div>
                        <span>Contas a Pagar</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/contas-a-receber" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::CONTAS_A_RECEBER, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">request_quote</span>
                        </div>
                        <span>Contas a Receber</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/unidades-medidas" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::UNIDADES_MEDIDAS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">straighten</span>
                        </div>
                        <span>Unidades</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/origens-saida" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::ORIGENS_SAIDA, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">north</span>
                        </div>
                        <span>Origens de Saída <br> do Estoque</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/produtos" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::PRODUTOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">archive</span>
                        </div>
                        <span>Produtos e Serviços</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/formas-pagamento" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::FORMAS_PAGAMENTOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">payments</span>
                        </div>
                        <span>Formas de Pagamento</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/tabelas-precos" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::TABELAS_PRECOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">price_change</span>
                        </div>
                        <span>Tabelas de Preços</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/vendedores" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::VENDEDORES, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">verified</span>
                        </div>
                        <span>Vendedores</span>
                    </div>
                </a>
            </li>

            <li>
                <a href="<?php echo HOME ?>/painel/orcamentos" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::ORCAMENTOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="flex-centro">
                        <div class="fundo-icone">
                            <span class="material-icons">assignment</span>
                        </div>
                        <span>Orçamentos</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>

    <ul id="fixa-barra-lateral">
        <li>
            <div class="flex-centro">
                <span class="material-icons margin-right30">keyboard_tab</span>
                <div>Abrir / Fechar Menu</div>
            </div>
        </li>
    </ul>

</aside>
-->