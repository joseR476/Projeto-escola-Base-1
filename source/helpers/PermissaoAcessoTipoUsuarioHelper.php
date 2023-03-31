<?php
namespace Helpers;
use Geral\Rotas;
use Geral\Utilidades;

class PermissaoAcessoTipoUsuarioHelper extends Rotas
{

    public static function verificaTipoUsuario($tipo)
    {

        switch ($tipo):
            case 'vendedor':
                $url_acessada = Utilidades::getUrl()[0];
                $urls_vendedores = array_merge(
                    AsidePainelHelper::INICIO,
                    AsidePainelHelper::CLIENTES,
                    AsidePainelHelper::ORCAMENTOS,
                    ['produto-por-tabela-precos'],
                    [
                        'perfil-usuario',
                        'salvar-perfil',
                        'perfil-usuario/erro-login',
                        'perfil-usuario/erro-cpf',
                        'clientes-pesquisa',
                    ]);
                if(!in_array($url_acessada, $urls_vendedores)):
                    self::Redireciona(HOME.'/painel/inicio');
                endif;
        endswitch;

    }

}