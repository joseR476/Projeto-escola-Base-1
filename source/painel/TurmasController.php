<?php
namespace Painel;
use Geral\Rotas;

class TurmasController extends Rotas
{

    public function index()
    {

        $pesquisa = !empty(filtra_string($_POST['pesquisa'])) ? '%'.filtra_string($_POST['pesquisa']).'%' : '%';
        $this->dados->registros = \TurmasModel::all(['conditions' => ['turma like ?', $pesquisa], 'order' => 'turma asc']);

        $series = \SeriesModel::all(['order' => 'nome asc']);
        $lista_series = '';
        if(!empty($series)):
            foreach ($series as $serie):

                $lista_series .= '<option value="'.$serie->id.'">'.$serie->nome.'</option>';

            endforeach;
        endif;

        $turmas = \VTurmasModel::all(['order' => 'nome_serie asc']);
        $lista_turmas = '';
        if(!empty($turmas)):
            foreach ($turmas as $turma):

                $lista_turmas .= '<option value="'.$turma->id.'">'.$turma->nome_serie.' '.$turma->turma.'</option>';

            endforeach;
        endif;

        $this->dados->turmas = $lista_turmas;

    }

    public function professoresTurma()
    {

        $id_turma = filtra_int($_POST['id_turma']);
        $professores = \VTurmasMateriasModel::find_by_sql("select id_professor, nome_professor from v_turmas_materias where id_turma = '{$id_turma}' group by id_professor order by nome_professor");
        $lista_professores = '';

        if(!empty($professores)):
            foreach ($professores as $professor):

                $lista_professores .= '<option value="'.$professor->id_professor.'">'.$professor->nome_professor.'</option>';

            endforeach;
        endif;

        echo json_encode(['status' => 'ok', 'lista' => $lista_professores]);

    }

    public function materiasProfessor(){

        $id_turma = filtra_int($_POST['id_turma']);
        $id_professor = filtra_int($_POST['id_professor']);

        $materias = \VTurmasMateriasModel::find_by_sql("select id_materia, nome_materia from v_turmas_materias where id_turma = '{$id_turma}' and id_professor = '{$id_professor}' group by id_materia order by nome_materia");
        $lista_materias = '';

        if(!empty($materias)):

            $lista_materias .= '<option value="">Todas</option>';

            foreach ($materias as $materia):

                $lista_materias .= '<option value="'.$materia->id_materia.'">'.$materia->nome_materia.'</option>';

            endforeach;
        endif;

        echo json_encode(['status' => 'ok', 'lista' => $lista_materias]);

    }

    public function buscar()
    {

        $id = filtra_int($_POST['id']);
        $registro = \TurmasModel::find_by_id($id);

        echo json_encode([
            'status' => 'ok',
            'registro' => [
                'id' => $registro->id,
                'id_serie' => $registro->id_serie,
                'turma' => $registro->turma,
                'turno' => $registro->turno,
            ]
        ]);

    }

    public function novo()
    {

        \TurmasModel::setTurno(filtra_string($_POST['turno']));
        \TurmasModel::setIdSerie(filtra_int($_POST['id_serie']));
        \TurmasModel::setTurma(filtra_string($_POST['nome']));
        $retorno = \TurmasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function alterar()
    {

        \TurmasModel::setId(filtra_int($_POST['id']));
        \TurmasModel::setTurno(filtra_string($_POST['turno']));
        \TurmasModel::setIdSerie(filtra_int($_POST['id_serie']));
        \TurmasModel::setTurma(filtra_string($_POST['nome']));
        $retorno = \TurmasModel::salvar();

        echo json_encode(['status' => $retorno]);

    }

    public function excluir()
    {

        \TurmasModel::setId(filtra_int($_POST['id']));
        $retorno = \TurmasModel::excluir();

        echo json_encode(['status' => $retorno]);

    }

}
