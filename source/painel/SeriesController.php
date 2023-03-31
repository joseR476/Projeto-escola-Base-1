<?php
namespace Painel;
use Geral\Rotas;

class SeriesController extends Rotas
{

    public function index()
    {

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $this->dados->registros = \SeriesModel::all(['conditions' => ['nome like ?', $pesquisa], 'order' => 'nome asc']);

    }

    public function buscar()
    {

        $id = filtra_int($_POST['id']);
        $registro = \SeriesModel::find_by_id($id);

        echo json_encode([
            'status' => 'ok',
            'registro' => [
                'id' => $registro->id,
                'nome' => $registro->nome,
            ]
        ]);

    }

    public function novo()
    {

        \SeriesModel::setNome(filtra_string($_POST['nome']));
        $retorno = \SeriesModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function alterar()
    {

        \SeriesModel::setId(filtra_int($_POST['id']));
        \SeriesModel::setNome(filtra_string($_POST['nome']));
        $retorno = \SeriesModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function excluir()
    {

        \SeriesModel::setId(filtra_int($_POST['id']));
        $retorno = \SeriesModel::excluir();

        echo json_encode(['status' => $retorno]);

    }

}
