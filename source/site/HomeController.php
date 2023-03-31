<?php
namespace Site;
use Geral\Rotas;

class HomeController extends Rotas
{

    public function index()
    {

        $this->Redireciona(HOME.'/painel');

    }

}
