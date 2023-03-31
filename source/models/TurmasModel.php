<?php

use ActiveRecord\Model;

class TurmasModel extends Model
{

    private static $id;
    private static $id_serie;
    private static $turma;
    private static $turno;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getIdSerie()
    {
        return self::$id_serie;
    }

    public static function setIdSerie($id_serie)
    {
        self::$id_serie = $id_serie;
    }

    public static function getTurma()
    {
        return self::$turma;
    }

    public static function setTurma($turma)
    {
        self::$turma = $turma;
    }

    public static function getTurno()
    {
        return self::$turno;
    }

    public static function setTurno($turno)
    {
        self::$turno = $turno;
    }

    public static $table_name = 'turmas';

    public static function salvar()
    {

        self::find_by_id(self::getId())
            ? $registro = self::find_by_id(self::getId())
            : $registro = new self();

        $registro->id_serie = self::getIdSerie();
        $registro->turma = self::getTurma();
        $registro->turno = self::getTurno();
        $registro->save();

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());

        $alunos = TurmasAlunosModel::all(['conditions' => ['id_turma = ?', $registro->id]]);
        $materias = TurmasMateriasModel::all(['conditions' => ['id_turma = ?', $registro->id]]);
        $diarios = DiariosModel::all(['conditions' => ['id_turma = ?', $registro->id]]);
        $registros_diarios = RegistrosDiarioClasseModel::all(['conditions' => ['id_turma = ?', $registro->id]]);

        if(!empty($alunos)):
            foreach ($alunos as $aluno):
                $aluno->delete();
            endforeach;
        endif;

        if(!empty($materias)):
            foreach ($materias as $materia):
                $materia->delete();
            endforeach;
        endif;

        if(!empty($diarios)):
            foreach ($diarios as $diario):
                $diario->delete();
            endforeach;
        endif;

        if(!empty($registros_diarios)):
            foreach ($registros_diarios as $registro_diario):
                $registro_diario->delete();
            endforeach;
        endif;

        $registro->delete();

        return 'ok';

    }

}
