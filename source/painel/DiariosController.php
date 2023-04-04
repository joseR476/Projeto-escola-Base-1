<?php
namespace Painel;
use Geral\Rotas;
use Geral\Sessao;
use Geral\Utilidades;
use phpDocumentor\Reflection\Types\This;

class DiariosController extends Rotas
{

    public function index(){

        $id = Utilidades::getUrl()[1];
        $this->dados->turma = \TurmasModel::find_by_id($id);

        $tipo_usuario = Sessao::getTipoUsuarioPainel();

        if($tipo_usuario == 'admin'):
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ?', $id], 'order' => 'nome_materia asc']);
        else:
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ? and id_professor = ?', $id, Sessao::getIdUsuarioPainel()], 'order' => 'nome_materia asc']);
        endif;
        $this->dados->registros = $materias;

        $lista_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):
                $lista_materias .= '<option value="'.$materia->id_materia.'">'.$materia->nome_materia.'</option>';
            endforeach;
        endif;

        $this->dados->materias = $lista_materias;

    }

    public function listar()
    {

        $id_turma = Utilidades::getUrl()[1];
        $id_materia = Utilidades::getUrl()[2];

        $this->dados->turma = \TurmasModel::find_by_id($id_turma);

        $this->dados->id_turma = $id_turma;
        $this->dados->id_materia = $id_materia;

        $this->dados->diarios = \DiariosModel::all(['conditions' => ['id_turma = ? and id_materia = ?', $id_turma, $id_materia], 'order' => 'data desc']);

        $tipo_usuario = Sessao::getTipoUsuarioPainel();

        if($tipo_usuario == 'admin'):
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ?', $id_turma], 'order' => 'nome_materia asc']);
        else:
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ? and id_professor = ?', $id_turma, Sessao::getIdUsuarioPainel()], 'order' => 'nome_materia asc']);
        endif;
        //$this->dados->registros = $materias;

        $lista_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):
                $lista_materias .= '<option value="'.$materia->id_materia.'">'.$materia->nome_materia.'</option>';
            endforeach;
        endif;

        $this->dados->materias = $lista_materias;

    }

    public function novo(){

        \DiariosModel::setIdTurma(filtra_int($_POST['id_turma']));
        \DiariosModel::setIdMateria(filtra_int($_POST['id_materia']));
        \DiariosModel::setData(filtra_string($_POST['data']));
        \DiariosModel::setObservacoes(filtra_string($_POST['observacoes']));
        $retorno = \DiariosModel::novo();

        echo json_encode($retorno);

    }

    public function alterar(){

        $id_turma = Utilidades::getUrl()[1];
        $id_materia = Utilidades::getUrl()[2];
        $id_diario = Utilidades::getUrl()[3];

        $this->dados->turma = \TurmasModel::find_by_id($id_turma);

        $this->dados->id_turma = $id_turma;
        $this->dados->id_materia = $id_materia;

        $this->dados->diarios = \DiariosModel::all(['conditions' => ['id_turma = ? and id_materia = ?', $id_turma, $id_materia], 'order' => 'data desc']);

        $tipo_usuario = Sessao::getTipoUsuarioPainel();

        if($tipo_usuario == 'admin'):
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ?', $id_turma], 'order' => 'nome_materia asc']);
        else:
            $materias = \VTurmasMateriasModel::all(['conditions' => ['id_turma = ? and id_professor = ?', $id_turma, Sessao::getIdUsuarioPainel()], 'order' => 'nome_materia asc']);
        endif;
        //$this->dados->registros = $materias;

        $lista_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):
                $lista_materias .= '<option value="'.$materia->id_materia.'">'.$materia->nome_materia.'</option>';
            endforeach;
        endif;

        $this->dados->materias = $lista_materias;

        $materia = \VTurmasMateriasModel::find_by_id_turma_and_id_materia($id_turma, $id_materia);
        $this->dados->materia = $materia;

        $diario = \DiariosModel::find_by_id($id_diario);
        $this->dados->diario = $diario;

        \RegistrosDiarioClasseModel::setIdDiario($id_diario);
        $this->dados->registros = \RegistrosDiarioClasseModel::verificarItens();

    }

    public function salvar()
    {

        $id_turma = Utilidades::getUrl()[1];
        $id_materia = Utilidades::getUrl()[2];
        $id_diario = Utilidades::getUrl()[3];
        \RegistrosDiarioClasseModel::salvar($_POST);

        $alunos = \VRegistrosDiarioModel::all(['conditions' => ['id_turma = ? and id_materia = ?', $id_turma, $id_materia]]);
        if(!empty($alunos)):
            foreach ($alunos as $aluno):
                verificarAproveitamento($aluno->id_aluno, $id_turma, $id_materia);
            endforeach;
        endif;

        $this->Redireciona(HOME.'/painel/alterar-diario-turma/'.$id_turma.'/'.$id_materia.'/'.$id_diario.'/ok');
    }

    public function excluir(){

    }

}