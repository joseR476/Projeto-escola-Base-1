<?php
/*Orçamentos*/
$rotas[] = ['link' => 'imprimir-orcamento', 'nivel' => 'relatorios', 'pasta' => 'orcamentos', 'arquivo' => 'impresso-orcamento', 'controller' => 'OrcamentosController@imprimir'];

/*Ordens de Serviço*/
$rotas[] = ['link' => 'imprimir-ordem-servico', 'nivel' => 'relatorios', 'pasta' => 'ordens-servico', 'arquivo' => 'impresso-ordem-servico', 'controller' => 'OrdensServicoController@imprimir'];