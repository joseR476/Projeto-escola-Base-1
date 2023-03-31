<?php

/*
 *
 * A Variável HOME é a url base da aplicação
 * A linha abaixo defina qual o banco de dados será utilizado
 * Caso não use nenhum, deixar linha comentada
 *
 *
 */

$tipo_conexao = $_SERVER['HTTP_HOST'];

switch ($tipo_conexao):
    case 'localhost':
    case '127.0.0.1':
        define('HOME', 'http://localhost/sistema-escolar');
        $cfg->set_connections(array('development' => 'mysql://root:@localhost/sistema_escolar'));
        break;

    case 'atalhus.agenciakelps.com.br':
        define('HOME', 'http://atalhus.agenciakelps.com.br');
        $cfg->set_connections(array('development' => 'mysql://u890512860_atalhus:Mudar123@localhost/u890512860_atalhus'));
        break;

    default:
        define('HOME', 'http://localhost/mvc');
        $cfg->set_connections(array('development' => 'mysql://root:@localhost/mvc'));
        break;
endswitch;

/*Configuração de URL*/
$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
$setUrl = (empty($getUrl) ? 'home' : $getUrl);
$Url = explode('/', $setUrl);
