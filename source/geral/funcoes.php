<?php

/*Dados de criação e alteração*/
function dadosCriacao($variavel){
    $variavel->usuario_criacao = \Geral\Sessao::getIdUsuarioPainel();
    $variavel->usuario_alteracao = \Geral\Sessao::getIdUsuarioPainel();

    $variavel->data_criacao = date('Y-m-d H:i:s');
    $variavel->data_alteracao = date('Y-m-d H:i:s');
}

function dadosAlteracao($variavel){
    $variavel->usuario_alteracao = \Geral\Sessao::getIdUsuarioPainel();
    $variavel->data_alteracao = date('Y-m-d H:i:s');
}

function Redireciona($redirecionamento){
    header('location:'.$redirecionamento);
}

/*Dados Admin*/
function NomeUsuarioAdmin(){
    $usuario = \UsuariosModel::find($_SESSION['usuario-admin']['id']);
    return $usuario->nome;
}

function IdUsuarioAdmin(){
    $usuario = \UsuariosModel::find($_SESSION['usuario-admin']['id']);
    return $usuario->id;
}

/*Dados Painel da Empresa*/
function NomeUsuarioEmpresa(){
    $usuario = \UsuariosEmpresaModel::find($_SESSION[SESSAO_USUARIO_PAINEL]['id_empresa']);
    return $usuario->nome_fantasia;
}

function IdUsuarioEstabelecimento(){
    $usuario = \EstabelecimentosModel::find($_SESSION['usuario-estabelecimento']['id_estabelecimento']);
    return $usuario->id;
}


function IdEstabelecimento(){
    $estabelecimento = \EstabelecimentosModel::find($_SESSION['usuario-estabelecimento']['id_estabelecimento']);
    return $estabelecimento->id;
}

function ImagemUsuarioEstabelecimento(){
    $usuario = \EstabelecimentosModel::find($_SESSION['usuario-estabelecimento']['id_estabelecimento']);
    return $usuario->imagem;
}


function Modal($id = '', $titulo = '', $texto = '', $botoes = '')
{
    ?>
    <div tabindex="-1" class="modal fade" id="<?php echo $id ?>" style="display: none; padding-right: 16px;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="pmd-card-title-text"><?php echo $titulo ?></h2>
                </div>
                <div class="modal-body">
                    <p><?php echo $texto ?></p>
                </div>
                <div class="pmd-modal-action pmd-modal-bordered text-right">
                    <?php echo $botoes ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function ModalSemIcone($id = '', $titulo = '', $texto = '', $botoes = '')
{
    ?>
    <div id="<?php echo $id ?>" class="modal">

        <div class="grid-modal">

            <h2 class="subtitulo font-bold"><?php echo $titulo ?></h2>
            <div class="espaco20"></div>

            <p><?php echo $texto ?></p>
            <div class="espaco20"></div>

            <?php echo $botoes ?>

        </div>

    </div>
    <?php
}

function ModalComIcone($id = '', $icone = '', $titulo = '', $texto = '', $botoes = '')
{
    ?>
    <div id="<?php echo $id ?>" class="modal">

        <div class="grid-modal">

            <?php echo $icone ?>
            <div class="espaco10"></div>

            <h2 class="subtitulo font-bold"><?php echo $titulo ?></h2>
            <div class="espaco20"></div>

            <p><?php echo $texto ?></p>
            <div class="espaco20"></div>

            <?php echo $botoes ?>

        </div>


    </div>
    <?php
}

function UltimaOrdem($model, $tabela)
{

    $registro = $model::find_by_sql("select ordem from {$tabela} order by ordem desc limit 1");

    if(!empty($registro)):
        return $registro[0]->ordem;
    else:
        return 0;
    endif;

}

function ProximaOrdem($model, $tabela)
{

    $registro = $model::find_by_sql("select ordem from {$tabela} order by ordem desc limit 1");
    $ultimaOrdem = $registro[0]->ordem;

    if(!empty($ultimaOrdem)):
        return $ultimaOrdem+1;
    else:
        return 1;
    endif;

}

function Mascara($mask,$str){

    $str = str_replace(" ","",$str);

    for($i=0;$i<strlen($str);$i++){
        //if(!empty($str[$i]) && $str[$i] != '0'):
            $mask[strpos($mask,"#")] = $str[$i];
        //endif;
    }

    $mask = str_replace('#', '', $mask);
    return $mask;

}

function filtra_string($variavel){
    return filter_var(trim($variavel), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
}

function filtra_int($variavel){
    return filter_var(trim($variavel), FILTER_SANITIZE_NUMBER_INT);
}

function filtra_float($variavel){
    return filter_var(trim($variavel), FILTER_SANITIZE_NUMBER_FLOAT);
}

function dataPadraoBrasileiro($data)
{
    return implode('/', array_reverse(explode('-', $data)));
}

function dataHoraPadraoBrasileiro($data)
{
    $partes = explode(' ', $data);
    $data = implode('/', array_reverse(explode('-', $partes[0])));
    $hora = $partes[1];

    return $data.' '.$hora;
}

function dataPadraoAmericano($data)
{
    return implode('-', array_reverse(explode('/', $data)));
}

function dataHoraPadraoAmericano($data)
{
    $partes = explode(' ', $data);
    $data = implode('-', array_reverse(explode('/', $partes[0])));
    $hora = $partes[1];

    return $data.' '.$hora;
}

function removeCaracteresEspeciais($string){

    $string = strtolower($string);

    // assume que esteja em UTF-8
    $map = array(
        'á' => 'a',
        'à' => 'a',
        'ã' => 'a',
        'â' => 'a',
        'ä' => 'a',
        'é' => 'e',
        'ê' => 'e',
        'ë' => 'e',
        'è' => 'e',
        'í' => 'i',
        'ï' => 'i',
        'ì' => 'i',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ú' => 'u',
        'ü' => 'u',
        'ç' => 'c',
        'ñ' => 'n',
        '_' => '-',
        ' ' => '-',
        '+' => '-',
        '´' => '-',
        '!' => '-',
        '@' => '-',
        '#' => '-',
        '$' => '-',
        '%' => '-',
        '¨' => '-',
        '&' => '-',
        '*' => '-',
        '(' => '-',
        ')' => '-',
        '[' => '-',
        ']' => '-',
        '{' => '-',
        '}' => '-',
        'º' => '-',
        'ª' => '-',
        '``' => '-',
        '\'' => '-',
        ' ' => '-',
    );

    return strtr($string, $map); // funciona corretamente

}
