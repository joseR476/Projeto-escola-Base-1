<?php
session_start();
ob_start();

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
ini_set("allow_url_fopen", 1);
ini_set("allow_url_include", 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);

include_once('source/geral/funcoes.php');
date_default_timezone_set('America/Sao_Paulo');
include_once(dirname(__FILE__).'/vendor/autoload.php');

include_once ('config/sessoes.php');
include_once ('config/views.php');
include_once ('config/models.php');
include_once ('config/host.php');
include_once ('config/assets.php');

/*
 * As rotas se dividem em dois tipos:
 * As views do site, que todo usuário terá acesso
 * e as páginas que ficam em áreas restritas.
 * As views ficam soltas dentro da pasta views,
 * as páginas das áreas seguem a estrutura pasta_area/views/nome_pasta
 *
 * Exemplos de rotas para views:
 * $rotas[] = ['link' => '', 'arquivo' => 'home', 'controller' => 'HomeController@index'];
 * $rotas[] = ['link' => '/', 'arquivo' => 'home', 'controller' => 'HomeController@index'];
 * $rotas[] = ['link' => '404', 'arquivo' => '404', 'controller' => 'Erro404Controller@index'];
 * $rotas[] = ['link' => 'home', 'arquivo' => 'home', 'controller' => 'HomeController@index'];
 * $rotas[] = ['link' => 'contato', 'arquivo' => 'contato', 'controller' => 'ContatoController@index'];
 *
 * Exemplo de rotas para views das areas restritas:
 * $rotas[] = ['link' => 'login', 'pasta' => 'login/', 'arquivo' => 'login', 'controller' => 'PainelController@login'];
 * $rotas[] = ['link' => 'sair', 'pasta' => 'login/', 'arquivo' => 'login', 'controller' => 'PainelController@sair'];
 * $rotas[] = ['link' => 'sair', 'pasta' => 'inicio/', 'arquivo' => 'inicio', 'controller' => 'PainelController@index'];
 * $rotas[] = ['link' => 'inicio', 'pasta' => 'inicio/', 'arquivo' => 'inicio', 'controller' => 'PainelController@inicio'];
 *
 * O arquivo a ser chamado pela rota é identificado na própria rota, nos caso de rotas das areas, a pasta onde o arquivo está
 * tambem é identificado na rota. E por ultimo, a rota indica o Controller@metodo a ser chamado.
 */

/*rotas*/
include_once ('config/rotas_site.php');
include_once ('config/rotas_painel.php');
//include_once ('config/rotas_relatorios.php');
