<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">
            <img src="<?php echo HOME ?>/assets/imagens/logos/logo-branca.png" style="width: 55%;" alt="">
        </span>
    </div>
    <ul class="nav-links">
        <li id="close-menu-mobile">
            <a>
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>menu</i>
                </div>
                <span class="link_name">Fechar</span>
            </a>
            <div class="espaco20"></div>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/inicio" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::INICIO, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>space_dashboard</i>
                </div>
                <span class="link_name">Início</span>
            </a>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/usuarios" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::USUARIOS, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>account_circle</i>
                </div>
                <span class="link_name">Usuário</span>
            </a>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/series" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::SERIES, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>filter_1</i>
                </div>
                <span class="link_name">Séries</span>
            </a>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/turmas" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::TURMAS, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>class</i>
                </div>
                <span class="link_name">Turmas</span>
            </a>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/materias" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::MATERIAS, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>auto_stories</i>
                </div>
                <span class="link_name">Matérias</span>
            </a>
        </li>

        <li>
            <a href="<?php echo HOME ?>/painel/alunos" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::ALUNOS, \Geral\Utilidades::getUrl()[0]); ?>">
                <div class="fundo-icone">
                    <i class='bx bx-grid-alt material-icons'>perm_identity</i>
                </div>
                <span class="link_name">Alunos</span>
            </a>
        </li>


        <!--
        <li>
            <div class="iocn-link">
                <a href="#">
                    <div class="fundo-icone">
                        <i class='bx bx-collection material-icons' >business_center</i>
                    </div>
                    <span class="link_name">Serviços</span>
                </a>
                <i class='bx bxs-chevron-down arrow material-icons'>expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Ordem de Serviço</a></li>
            </ul>
        </li>
        -->


        <!--
        <li>
            <div class="iocn-link">
                <a href="#" class="<?php echo \Helpers\AsidePainelHelper::menuAtivo(\Helpers\AsidePainelHelper::RELATÓRIOS, \Geral\Utilidades::getUrl()[0]); ?>">
                    <div class="fundo-icone">
                        <i class='bx bx-collection material-icons'>description</i>
                    </div>
                    <span class="link_name">Relatórios</span>
                </a>
                <i class='bx bxs-chevron-down arrow material-icons'>expand_more</i>
            </div>
            <ul class="sub-menu">
                <li><a href="<?php echo HOME ?>/painel/rel-contas-a-apagar-e-receber">Contas a Pagar <br> e Receber</a></li>
                <li><a href="<?php echo HOME ?>/painel/rel-fluxo-caixa">Fluxo de Caixa</a></li>
                <li><a href="<?php echo HOME ?>/painel/rel-comparar-periodos">Comparar Períodos</a></li>
                <li><a href="<?php echo HOME ?>/painel/rel-precificacao">Precificação</a></li>
                <li><a href="<?php echo HOME ?>/painel/rel-vendas">Vendas</a></li>
                <li><a href="<?php echo HOME ?>/painel/rel-comissoes">Comissões</a></li>
            </ul>
        </li>
        -->

        <li>
            <div class="close-menu">
                <i class='bx bx-menu material-icons'>menu_open</i>
            </div>
        </li>
    </ul>
</div>

<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/menu.css">
<script src="<?php echo HOME ?>/assets/painel/js/menu.js"></script>
