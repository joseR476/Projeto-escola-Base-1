<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;

class AlunosTurmasController extends Rotas
{

    public function index(){

        $id_turma = Utilidades::getUrl()[1];
        $this->dados->registros = \VAlunosTurmas::all(['conditions' => ['id_turma = ?', $id_turma], 'order' => 'ordem asc']);

    }

    public function buscar(){

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $alunos = \AlunosModel::all(['conditions' => ['nome like ?', $pesquisa], 'order' => 'nome asc']);
        $lista_alunos = [];

        $lista_alunos = array_map(function ($aluno){
           return [
               'id' => $aluno->id,
               'nome' => $aluno->nome,
               'ra' => $aluno->ra,
               'email' => $aluno->email,
               'telefone' => $aluno->telefone,
           ];
        }, $alunos);

        echo json_encode([
            'status' => 'ok',
            'registros' => $lista_alunos
        ]);

    }

    public function novo(){

        $id_turma = filtra_int($_POST['id_turma']);
        $id_aluno = filtra_int($_POST['id_aluno']);

        \TurmasAlunosModel::setIdTurma($id_turma);
        \TurmasAlunosModel::setIdAluno($id_aluno);
        $retorno = \TurmasAlunosModel::adicionar();

        echo json_encode(['status' => $retorno]);

    }

    public function salvarNumero()
    {

        $id_turma = Utilidades::getUrl()[1];
        \TurmasAlunosModel::salvarNumero($_POST);
        $this->Redireciona(HOME.'/painel/alunos-turma/'.$id_turma);

    }

    public function excluir(){
        $id = filtra_int($_POST['id']);
        \TurmasAlunosModel::setId($id);
        $retorno = \TurmasAlunosModel::excluir();

        echo json_encode(['status' => $retorno]);
    }

}
