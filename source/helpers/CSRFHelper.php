<?php
namespace Helpers;
use Geral\Rotas;

/**
 * Class CSRFHelper
 * @package Helpers
 * Utilização:
 *
 * Para inserir o campo com o hash no form:
 * \Helpers\CSRFHelper::getCampoHash()
 *
 * Para verificar o hash no Model:
 * \Helpers\CSRFHelper::verificar($dados['_hash']);
 */

class CSRFHelper extends Rotas
{

    public static function gerarHash()
    {
        if(!isset($_SESSION['SESSAO_CSRF'])):
        $_SESSION['SESSAO_CSRF'] = hash('sha512', rand(100, 1000));
        endif;
    }

    public static function getCampoHash()
    {
        return '<input type="hidden" name="_hash" id="_hash" value="'.$_SESSION['SESSAO_CSRF'].'">';
    }

    public static function verificar($hash)
    {

        if(empty($hash) || empty($_SESSION['SESSAO_CSRF']) || ($hash != $_SESSION['SESSAO_CSRF'])):
            echo 'Hash Inválida';
            exit();
        endif;

    }

}