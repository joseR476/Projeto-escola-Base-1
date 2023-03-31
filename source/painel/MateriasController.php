<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;

class MateriasController extends Rotas
{

    public function index()
    {

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $this->dados->registros = \MateriasModel::all(['conditions' => ['nome like ?', $pesquisa], 'order' => 'nome asc']);

    }

    public function buscar()
    {

        $id = filtra_int($_POST['id']);
        $registro = \MateriasModel::find_by_id($id);

        echo json_encode([
            'status' => 'ok',
            'registro' => [
                'id' => $registro->id,
                'nome' => $registro->nome,
                'observacoes' => $registro->observacoes,
            ]
        ]);

    }

    public function novo()
    {

        \MateriasModel::setNome(filtra_string($_POST['nome']));
        \MateriasModel::setObservacoes(filtra_string($_POST['observacoes']));
        $retorno = \MateriasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function alterar()
    {

        \MateriasModel::setId(filtra_int($_POST['id']));
        \MateriasModel::setNome(filtra_string($_POST['nome']));
        \MateriasModel::setObservacoes(filtra_string($_POST['observacoes']));
        $retorno = \MateriasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }


    public function excluir()
    {

        \MateriasModel::setId(filtra_int($_POST['id']));
        $retorno = \MateriasModel::excluir();

        echo json_encode(['status' => $retorno]);

    }

}
