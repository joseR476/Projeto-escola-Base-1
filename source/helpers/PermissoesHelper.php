<?php
namespace Helpers;
use Geral\Rotas;
use Geral\Sessao;

class PermissoesHelper extends Rotas
{

    public static function verificaRegistro($registro, $redirecionamento)
    {

        $id_empresa = Sessao::getIdEmpresaPainel();
        if($registro->id_empresa != $id_empresa):
            self::Redireciona(HOME.'/painel/'.$redirecionamento);
            exit();
        endif;

    }

    public static function verificaEmpresa($id_empresa, $redirecionamento)
    {
        $id_empresa_sessao = Sessao::getIdEmpresaPainel();
        if($id_empresa != $id_empresa_sessao):
            self::Redireciona(HOME.'/painel/'.$redirecionamento);
            exit();
        endif;
    }

}