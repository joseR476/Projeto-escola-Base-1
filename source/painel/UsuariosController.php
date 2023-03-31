<?php
namespace Painel;
use Geral\Rotas;
use Geral\Sessao;
use Geral\Utilidades;
use Helpers\BcryptHelper;
use Helpers\PermissoesHelper;
use Interfaces\iControllers;

class UsuariosController extends Rotas implements iControllers
{


    public function index()
    {

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $this->dados->registros = \UsuariosModel::all(['conditions' => ['nome like ? or email like ? or telefone like ? or rua like ? or numero like ? or bairro like ? or complemento like ? or estado like ? or cidade like ? or cep like ?', $pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa], 'order' => 'nome asc']);
    }

    public function novo()
    {

        $this->dados->estados = \EstadosModel::all();

        if(isset($_POST['salvar'])):

            \UsuariosModel::setTipo(filtra_string($_POST['tipo']));
            \UsuariosModel::setNome(filtra_string($_POST['nome']));
            \UsuariosModel::setEmail(filtra_string($_POST['email']));
            \UsuariosModel::setTelefone(filtra_string($_POST['telefone']));
            \UsuariosModel::setRua(filtra_string($_POST['rua']));
            \UsuariosModel::setNumero(filtra_string($_POST['numero']));
            \UsuariosModel::setBairro(filtra_string($_POST['bairro']));
            \UsuariosModel::setComplemento(filtra_string($_POST['complemento']));
            \UsuariosModel::setEstado(filtra_string($_POST['estado']));
            \UsuariosModel::setCidade(filtra_string($_POST['cidade']));
            \UsuariosModel::setCep(filtra_string($_POST['cep']));
            \UsuariosModel::setLogin(filtra_string($_POST['login']));
            \UsuariosModel::setSenha(filtra_string($_POST['senha']));
            $retorno = \UsuariosModel::salvar();

            $this->Redireciona(HOME.'/painel/novo-usuario/'.$retorno);

        endif;

    }

    public function alterar()
    {
        $id = Utilidades::getUrl()[1];
        $registro = \UsuariosModel::find_by_id($id);
        $this->dados->registro = $registro;

        $this->dados->estados = \EstadosModel::all();

        if(isset($_POST['salvar'])):

            \UsuariosModel::setId(filtra_int($id));
            \UsuariosModel::setTipo(filtra_string($_POST['tipo']));
            \UsuariosModel::setNome(filtra_string($_POST['nome']));
            \UsuariosModel::setEmail(filtra_string($_POST['email']));
            \UsuariosModel::setTelefone(filtra_string($_POST['telefone']));
            \UsuariosModel::setRua(filtra_string($_POST['rua']));
            \UsuariosModel::setNumero(filtra_string($_POST['numero']));
            \UsuariosModel::setBairro(filtra_string($_POST['bairro']));
            \UsuariosModel::setComplemento(filtra_string($_POST['complemento']));
            \UsuariosModel::setEstado(filtra_string($_POST['estado']));
            \UsuariosModel::setCidade(filtra_string($_POST['cidade']));
            \UsuariosModel::setCep(filtra_string($_POST['cep']));
            $retorno = \UsuariosModel::salvar();

            $this->Redireciona(HOME.'/painel/alterar-usuario/'.$id.'/'.$retorno);

        endif;
    }

    public function alterarSenha()
    {
        $id = filtra_int($_POST['id']);
        $senha_atual = filtra_string($_POST['senha_atual']);
        $nova_senha = filtra_string($_POST['nova_senha']);
        $confirma_nova_senha = filtra_string($_POST['confirma_nova_senha']);

        $registro = \UsuariosModel::find_by_id($id);

        if(!BcryptHelper::check($senha_atual, $registro->senha)):
            echo json_encode(['status' => 'erro']);
        else:
            \UsuariosModel::setId($id);
            \UsuariosModel::setSenha($nova_senha);
            $retorno = \UsuariosModel::alterarSenha();
            echo json_encode(['status' => $retorno]);
        endif;

    }

    public function status()
    {
        $id = Utilidades::getUrl()[1];
        $registro = \UsuariosModel::find_by_id($id);

        if($registro->status == 'a'):
            $registro->status = 'i';
        elseif($registro->status == 'i'):
            $registro->status = 'a';
        endif;
        $registro->save();

        $this->Redireciona(HOME.'/painel/usuarios');
    }

    public function excluir()
    {
        $id = Utilidades::getUrl()[1];
        $registro = \UsuariosModel::find_by_id($id);

        if(count(\UsuariosModel::all()) < 2):
            $this->Redireciona(HOME.'/painel/usuarios/exclusao-negada');
        else:
            \UsuariosModel::setId($id);
            $retorno = \UsuariosModel::excluir();
            $this->Redireciona(HOME.'/painel/usuarios/'.$retorno);
        endif;
    }

}
