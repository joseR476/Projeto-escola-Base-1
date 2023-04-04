<?php
    \Geral\Sessao::verificaSessaoPainel();
?>
<header id="topo">

    <div id="sobre-aside">

    </div>

    <div class="container-topo flex-space-between" style="width: 100%">
        <div class="padding10">
            <span id="nome-empresa-topo"><?php echo \Geral\Sessao::getNomeUsuarioPainel() ?></span>
        </div>

        <!--
        <div class="padding20" id="formulario-busca-topo">
            <form action="">
                <div id="box-pesquisa-topo">
                    <input type="text" placeholder="O que está procurando?">
                    <span class="material-icons">search</span>
                </div>
            </form>
        </div>
        -->
    </div>

    <div class="container-topo borda-esquerda-topo">
        <div class="flex-space-between padding10" style="width: 100%">

            <div id="box-botoes-mobile">

                <div id="bt-menu-mobile">
                    <span class="material-icons">menu</span>
                </div>

                <div class="flex-centro">
                <button type="button" id="bt-diminuir-fonte" class="botao-circular botao-circular-grande botao-circular-padrao margin-right5">
                    <span class="material-icons">text_decrease</span>
                </button>

                <button type="button" id="bt-aumentar-fonte" class="botao-circular botao-circular-grande botao-circular-padrao">
                    <span class="material-icons">text_increase</span>
                </button>
                </div>

                <!--
                <a href="<?php echo HOME ?>/painel/configuracoes" style="text-decoration: none;" id="bt-config-topo">
                    <div id="bt-notificacoes-topo">
                        <span class="material-icons">settings</span>
                    </div>
                </a>
                -->


                <div id="bt-sair-mobile">
                    <a href="<?php echo HOME ?>/painel/sair">
                        <span class="material-icons">logout</span>
                    </a>
                </div>

            </div>

            <div class="box-menu-dropdown menu-dropdown-esquerda menu-dropdown-abaixo margin-right10" id="box-menu-usuario-topo">

                <div id="box-avatar-usuario" class="dropdown">
                    <div id="nome-usuario" class="dropdown"><?php echo \Geral\Sessao::getNomeUsuarioPainel() ?></div>
                    <div id="avatar-usuario" class="sombra dropdown" style="background: url(<?php echo \Geral\Sessao::getImagemUsuario() ?>) no-repeat 50% 50%; background-size: cover;"></div>
                </div>

                <div class="menu-dropdown margin-right10">

                    <header class="subtitulo font-bold texto-cor-padrao">
                        <?php echo \Geral\Sessao::getNomeUsuarioPainel() ?>
                    </header>

                    <div class="tag tag-padrao font-light">
                        O QUE DESEJA?
                    </div>
                    <div class="espaco10"></div>

                    <div class="separador"></div>
                    <div class="espaco10"></div>

                    <ul>
                        <li>
                            <span class="icone"></span>
                            <a href="<?php echo HOME ?>/painel/perfil-usuario">Meu Perfil</a>
                        </li>

                        <li>
                            <span class="material-icons icone">logout</span>
                            <a href="<?php echo HOME ?>/painel/sair">Sair</a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

</header>
