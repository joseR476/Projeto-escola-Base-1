<?php
    use Geral\Rotas;
    use Geral\Sessao;
    include_once ('../config.php');
    include_once ('../source/geral/funcoes.php');

    $titulo_pagina = \Geral\TituloPaginas::titulo('painel', \Geral\Utilidades::getUrl()[0]);

    /*Verificando se existe a sessão do usuário*/
    /*
    if(
            \Geral\Utilidades::getUrl()[0] != '' &&
            \Geral\Utilidades::getUrl()[0] != 'login' &&
            \Geral\Utilidades::getUrl()[0] != 'esqueci-senha'
    ):
        Sessao::verificaSessaoPainel();
    endif;
    */

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="<?php echo HOME ?>/assets/imagens/favicon.png">

    <title><?php echo $titulo_pagina ?></title>

    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/grid.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/boot.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilo-painel.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilos-personalizados-painel.css"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/cumtom-scroollbars.css"/>

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- DataTables css -->
    <link rel="stylesheet" type="text/css" href="<?php echo HOME ?>/assets/js/data-tables/css/jquery.dataTables.min.css">

    <!-- Tips -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" //scale.css"/>

    <!-- DateTime Picker -->
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/components/datetime-picker/mc-calendar.min.css">
    <script src="<?php echo HOME ?>/assets/components/datetime-picker/mc-calendar.min.js"></script>


    <script src="<?php echo HOME ?>/assets/painel/js/jquery-1.12.2.min.js"></script>
    <script src="<?php echo HOME ?>/assets/painel/js/jquery.mask.min.js"></script>

    <script src="<?php echo HOME ?>/assets/js/vue2/es6-promise.auto.js"></script>

    <!-- development version, includes helpful console warnings -->
    <script src="<?php echo HOME ?>/assets/js/vue2/vue.js"></script>
    <script src="<?php echo HOME ?>/assets/js/vue2/vuex.js"></script>

    <script src="<?php echo HOME ?>/assets/js/vue2/lodash.min.js"></script>
    <script src="<?php echo HOME ?>/assets/js/vue2/vuex-persist.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

    <?php
    /*Se não for tela de login*/
    if(
            !empty($Url[0]) &&
            (
                $Url[0] != 'login' &&
                $Url[0] != 'sair' &&
                $Url[0] != 'home' &&
                $Url[0] != 'esqueci-senha' &&
                $Url[0] != 'recuperar-senha' &&
                $Url[0] != 'ativar-conta'
            )
    ):
        include_once(VIEWS_PAINEL.'/aside.php');
        include_once(VIEWS_PAINEL.'/topo.php');
        ?>
        <!--content area start-->
        <div id="content" class="content-fechado">
            <div class="content-fluido">
        <?php

            $rota = new Rotas();
            $rota->VerificaRota('painel', $getUrl)

        ?>
            </div>
        </div>
        <!--end content area-->
    <?php
        include_once(VIEWS_PAINEL.'/rodape.php');
    else:
    /*Se for tela de login*/

        $rota = new Rotas();
        $rota->VerificaRota('painel', $getUrl);

    endif;
    ?>

</body>
</html>
