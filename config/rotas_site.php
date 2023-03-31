<?php

use Geral\Rotas;

$rotas = new Rotas();
$rotas->add('busca-cidades', 'painel', '', 'CidadesController@buscaCidades');
$rotas->add('busca-cidades-selecionada', 'painel', '', 'CidadesController@buscaCidadesSelecionada');
$rotas->add('validacao1', 'painel', '', 'ValidacoesController@validacao1');
$rotas->add('validacao2', 'painel', '', 'ValidacoesController@validacao2');
$rotas->add('validacao3', 'painel', '', 'ValidacoesController@validacao3');

/*site*/
$rotas->add('', 'site', 'home', 'HomeController@index');
$rotas->add('/', 'site', 'home', 'HomeController@index');
$rotas->add('404', 'site', '404', 'Erro404Controller@index');
$rotas->add('home', 'site', 'home', 'HomeController@index');
$rotas->add('contato', 'site', 'contato', 'ContatoController@index');
