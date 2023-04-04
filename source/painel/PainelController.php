<?php
namespace Painel;

use Geral\Rotas;
use Geral\Sessao;
use Geral\Utilidades;
use Helpers\BcryptHelper;
use Helpers\CSRFHelper;

class PainelController extends Rotas {

    public function index()
    {

    }

    public function inicio()
    {


    }

    public function login()
    {

        if(isset($_POST['entrar'])):

            $tipo = trim(filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT));
            $login = trim(filter_input(INPUT_POST, 'login', FILTER_DEFAULT));
            $senha = trim(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));

            //$usuario = \UsuariosModel::find_by_login_and_senha($login, md5($senha));
            $usuario = \UsuariosModel::find_by_tipo_and_login($tipo, $login);

            if(!empty($usuario) && (BcryptHelper::check($senha, $usuario->senha))):
                Sessao::criaSessaoUsuarioPainel($usuario);

                if($usuario->tipo == 'admin'):
                    $this->Redireciona(HOME.'/painel/inicio');
                else:
                    $this->Redireciona(HOME.'/painel/turmas');
                endif;
            else:
                $this->Redireciona(HOME.'/painel/login/erro');
            endif;

        endif;

    }

    public function sair()
    {
        Sessao::encerraSessaoPainel();
        $this->Redireciona(HOME.'/painel/login');
    }


}