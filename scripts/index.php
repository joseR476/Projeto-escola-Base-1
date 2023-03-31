<?php
include_once ('../config.php');
use Geral\Rotas;
$rota = new Rotas();
$rota->VerificaRota('scripts', $getUrl);
