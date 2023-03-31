<?php
    include_once ('config.php');
    //include_once ('classes/funcoes.php');
    use Geral\Rotas;
    $rota = new Rotas();

    //$titulo_pagina = \Geral\TituloPaginas::titulo('site', \Geral\Utilidades::getUrl()[0]);
    //$paginas_site = ['', 'home', 'contato', '404'];


    $titulo_posicao_um = ['sobre-cirurgia', 'sobre-proedimento', 'artigo'];

    !in_array(\Geral\Utilidades::getUrl()[0], $titulo_posicao_um)
        ? $url = \Geral\Utilidades::getUrl()[0]
        : $url = \Geral\Utilidades::getUrl()[1];

    !empty($url)
        ? $url = $url
        : $url = 'home';

    //$seo = SEOModel::find_by_url($url);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <title>Título - <?php //echo $seo->titulo ?></title>
    <link rel="icon" href="<?php echo HOME ?>/assets/imagens/favicon.png">

    <!-- fontes -->
    <!-- <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/fontes/icones.css" media="screen"/> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet"> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/boot.css" media="screen"/>
    <link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilo-site.css" media="screen"/>

    <script src="<?php echo HOME ?>/assets/painel/js/jquery-1.12.2.min.js"></script>
    <script src="<?php echo HOME ?>/assets/painel/js/jquery.mask.min.js"></script>

    <script src="<?php echo HOME ?>/assets/js/vue2/es6-promise.auto.js"></script>

    <!-- development version, includes helpful console warnings -->
    <?php
    echo $tipo_conexao == 'localhost'
        ? '<script src="'.HOME.'/assets/js/vue2/vue.js"></script>'
        : '<script src="'.HOME.'/assets/js/vue2/vue2_prod.js"></script>';
    ?>

    <script src="<?php echo HOME ?>/assets/js/vue2/vuex.js"></script>

    <script src="<?php echo HOME ?>/assets/js/vue2/lodash.min.js"></script>
    <script src="<?php echo HOME ?>/assets/js/vue2/vuex-persist.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<body>

    <?php
    include_once(VIEWS.'/'.'topo.php');
    $rota->VerificaRota('site', $setUrl);
    include_once(VIEWS.'/'.'rodape.php');
    ?>

</body>
</html>
