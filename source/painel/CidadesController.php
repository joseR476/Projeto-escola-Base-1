<?php
namespace Painel;
use Geral\Rotas;

class CidadesController extends Rotas
{

    public function buscaCidades()
    {

        $estado_id = filter_input(INPUT_POST, 'estado_id', FILTER_VALIDATE_INT);
        $cidades = \CidadesModel::all(['conditions' => ['estado_id = ?', $estado_id], 'order' => 'nome asc']);

        if(!empty($cidades)):
            echo '<option value=""></option>';
            foreach ($cidades as $cidade):
                echo '<option value="'.$cidade->id.'">'.$cidade->nome.'</option>';
            endforeach;
        endif;

    }

    public function buscaCidadesSelecionada()
    {

        $estado_id = filter_input(INPUT_POST, 'estado_id', FILTER_VALIDATE_INT);
        $nome_cidade = filter_input(INPUT_POST, 'nome_cidade', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $cidades = \CidadesModel::all(['conditions' => ['estado_id = ?', $estado_id], 'order' => 'nome asc']);

        if(!empty($cidades)):
            echo '<option value=""></option>';
            foreach ($cidades as $cidade):
                echo strtoupper($cidade->nome) == $nome_cidade ? '<option selected value="'.$cidade->id.'">'.$cidade->nome.'</option>' : '<option value="'.$cidade->id.'">'.$cidade->nome.'</option>';
            endforeach;
        endif;

    }

}
