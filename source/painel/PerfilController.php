<?php
namespace Painel;
use Geral\Rotas;
use Geral\Sessao;

class PerfilController extends Rotas
{

    public function index()
    {
        $this->dados->estados = \EstadosModel::all();

        $registro = \UsuariosModel::find_by_id(Sessao::getIdUsuarioPainel());
        $this->dados->registro = $registro;

    }

    public function salvar()
    {

        \UsuariosModel::setId(filtra_int(Sessao::getIdUsuarioPainel()));
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
        $retorno = \UsuariosModel::salvarPerfil();

        $this->Redireciona(HOME.'/painel/perfil-usuario/'.$retorno);

    }

}
