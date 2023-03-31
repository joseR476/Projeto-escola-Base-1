<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;

class AlunosController extends Rotas
{

    public function index()
    {

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $this->dados->registros = \AlunosModel::all(['conditions' => ['nome like ? or ra like ? or email like ? or telefone like ? or rua like ? or numero like ? or bairro like ? or complemento like ? or estado like ? or cidade like ? or cep like ?', $pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa,$pesquisa], 'order' => 'nome asc']);

    }

    public function novo()
    {

        $this->dados->estados = \EstadosModel::all();

        if(isset($_POST['salvar'])):

            \AlunosModel::setNome(filtra_string($_POST['nome']));
            \AlunosModel::setRa(filtra_string($_POST['ra']));
            \AlunosModel::setEmail(filtra_string($_POST['email']));
            \AlunosModel::setTelefone(filtra_string($_POST['telefone']));
            \AlunosModel::setRua(filtra_string($_POST['rua']));
            \AlunosModel::setNumero(filtra_string($_POST['numero']));
            \AlunosModel::setBairro(filtra_string($_POST['bairro']));
            \AlunosModel::setComplemento(filtra_string($_POST['complemento']));
            \AlunosModel::setEstado(filtra_string($_POST['estado']));
            \AlunosModel::setCidade(filtra_string($_POST['cidade']));
            \AlunosModel::setCep(filtra_string($_POST['cep']));
            $retorno = \AlunosModel::salvar();

            $this->Redireciona(HOME.'/painel/novo-aluno/'.$retorno);

        endif;

    }

    public function alterar()
    {

        $id = Utilidades::getUrl()[1];
        $this->dados->registro = \AlunosModel::find_by_id($id);

        $this->dados->estados = \EstadosModel::all();

        if(isset($_POST['salvar'])):

            \AlunosModel::setId(filtra_string($_POST['id']));
            \AlunosModel::setNome(filtra_string($_POST['nome']));
            \AlunosModel::setRa(filtra_string($_POST['ra']));
            \AlunosModel::setEmail(filtra_string($_POST['email']));
            \AlunosModel::setTelefone(filtra_string($_POST['telefone']));
            \AlunosModel::setRua(filtra_string($_POST['rua']));
            \AlunosModel::setNumero(filtra_string($_POST['numero']));
            \AlunosModel::setBairro(filtra_string($_POST['bairro']));
            \AlunosModel::setComplemento(filtra_string($_POST['complemento']));
            \AlunosModel::setEstado(filtra_string($_POST['estado']));
            \AlunosModel::setCidade(filtra_string($_POST['cidade']));
            \AlunosModel::setCep(filtra_string($_POST['cep']));
            $retorno = \AlunosModel::salvar();

            $this->Redireciona(HOME.'/painel/alterar-aluno/'.$id.'/'.$retorno);

        endif;

    }


    public function excluir()
    {

        $id = Utilidades::getUrl()[1];
        \AlunosModel::setId($id);
        \AlunosModel::excluir();

        $this->Redireciona(HOME.'/painel/alunos/');

    }

}
