<?php
namespace Geral;
use Geral\Rotas;
use Helpers\SessaoHelper;

class Sessao{

    /*---------------------------------------------------------------------------*/
    /*Painel*/

    /**
     * Verifica se existe sessão do cliente criada,
     * caso não exista, envia-o para a tela de login.
     */
    static public function verificaSessaoPainel(){
        if(!isset($_SESSION[SESSAO_USUARIO_PAINEL])):
            $rota = new Rotas();
            $rota->Redireciona(HOME.'/painel');
        endif;
    }

    /**
     * Cria uma sessão para quando usuário realiza login,
     * armazenando o tipo de usuário, id, nome e nome da imagem.
     * @param $usuario
     */
    static function criaSessaoUsuarioPainel($usuario)
    {
        SessaoHelper::regenerarSessao(SESSAO_USUARIO_PAINEL);
        $_SESSION[SESSAO_USUARIO_PAINEL]['id_usuario'] = $usuario->id;
        $_SESSION[SESSAO_USUARIO_PAINEL]['nome_usuario'] = $usuario->nome;
        $_SESSION[SESSAO_USUARIO_PAINEL]['imagem_usuario'] = $usuario->imagem;
    }

    /*Metodo para retornar o id do usuario logaodo*/
    static public function getIdUsuarioPainel()
    {
        return $_SESSION[SESSAO_USUARIO_PAINEL]['id_usuario'];
    }

    /*Metodo para retornar o nome do usuario logaodo*/
    static public function getNomeUsuarioPainel()
    {
        $usuario = \UsuariosModel::find_by_id($_SESSION[SESSAO_USUARIO_PAINEL]['id_usuario']);
        $nome = explode(' ', $usuario->nome);
        return $nome[0];
    }

    public static function setImagemUsuario($imagem)
    {
        $_SESSION[SESSAO_USUARIO_PAINEL]['imagem_usuario'] = $imagem;
    }

    public static function getImagemUsuario()
    {
        $imagem = HOME.'/assets/imagens/usuarios/'.self::getIdUsuarioPainel().'/'.$_SESSION[SESSAO_USUARIO_PAINEL]['imagem_usuario'];
        return $imagem;
    }

    /*Metodo que encerra sessao do usuario*/
    static public function encerraSessaoPainel()
    {
        unset($_SESSION[SESSAO_USUARIO_PAINEL]);
    }

    /*Fim Painel*/
    /*---------------------------------------------------------------------------*/

    /*---------------------------------------------------------------------------*/
    /*Paginacao*/
    public static function setPorPagina($quantidade)
    {
        $_SESSION['SESSAO_PAGINACAO_PAINEL'] = $quantidade;
    }

    public static function getPorPagina()
    {
        return $_SESSION['SESSAO_PAGINACAO_PAINEL'];
    }

        /*Saldo do extrato por pagina Extrato*/
        public static function setSaldoPaginaAnteiorExtrato($saldo)
        {
            $_SESSION['SALDO_ANTERIOR_EXTRATO'] = $saldo;
        }

        public static function getSaldoPaginaAnteiorExtrato()
        {
            return $_SESSION['SALDO_ANTERIOR_EXTRATO'];
        }


}