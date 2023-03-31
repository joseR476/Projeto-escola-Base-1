<?php
include_once ('../config.php');
use Geral\Rotas;
$rota = new Rotas();
$rota->VerificaRota('relatorios', $getUrl, $rotas);