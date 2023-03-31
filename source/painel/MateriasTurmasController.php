<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;

class MateriasTurmasController extends Rotas
{

    public function index()
    {

        $id = Utilidades::getUrl()[1];
        $this->dados->turma = \TurmasModel::find_by_id($id);

        $professores = \UsuariosModel::all(['conditions' => ['tipo = ?', 'professor'], 'order' => 'nome asc']);
        $materias = \MateriasModel::all(['order' => 'nome asc']);

        $lista_professores = '';
        if(!empty($professores)):
            foreach ($professores as $professor):
                $lista_professores .= '<option value="'.$professor->id.'">'.$professor->nome.'</option>';
            endforeach;
        endif;

        $lista_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):
                $lista_materias .= '<option value="'.$materia->id.'">'.$materia->nome.'</option>';
            endforeach;
        endif;

        $this->dados->professores = $lista_professores;
        $this->dados->materias = $lista_materias;

        $this->dados->registros = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ?', $id]]);

    }

    public function buscar()
    {

        $id = filtra_int($_POST['id']);
        $registro = \TurmasMateriasModel::find_by_id($id);

        echo json_encode([
            'status' => 'ok',
            'registro' => [
                'id' => $registro->id,
                'id_turma' => $registro->id_turma,
                'id_materia' => $registro->id_materia,
                'id_professor' => $registro->id_professor,
                'observacoes' => $registro->observacoes,
            ]
        ]);

    }

    public function novo()
    {

        \TurmasMateriasModel::setIdMateria(filtra_int($_POST['id_materia']));
        \TurmasMateriasModel::setIdTurma(filtra_int($_POST['id_turma']));
        \TurmasMateriasModel::setIdProfessor(filtra_int($_POST['id_professor']));
        \TurmasMateriasModel::setObservacoes(filtra_string($_POST['observacoes']));
        $retorno = \TurmasMateriasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function alterar()
    {

        \TurmasMateriasModel::setId(filtra_int($_POST['id']));
        \TurmasMateriasModel::setIdTurma(filtra_int($_POST['id_turma']));
        \TurmasMateriasModel::setIdMateria(filtra_int($_POST['id_materia']));
        \TurmasMateriasModel::setIdProfessor(filtra_int($_POST['id_professor']));
        \TurmasMateriasModel::setObservacoes(filtra_string($_POST['observacoes']));
        $retorno = \TurmasMateriasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function excluir()
    {

        \TurmasMateriasModel::setId(filtra_int($_POST['id']));
        $retorno = \TurmasMateriasModel::excluir();

        echo json_encode(['status' => $retorno]);

    }

}
