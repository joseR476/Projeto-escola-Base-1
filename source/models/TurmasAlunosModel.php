<?php

use ActiveRecord\Model;

class TurmasAlunosModel extends Model
{

    private static $id;
    private static $id_turma;
    private static $id_aluno;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getIdTurma()
    {
        return self::$id_turma;
    }

    public static function setIdTurma($id_turma)
    {
        self::$id_turma = $id_turma;
    }

    public static function getIdAluno()
    {
        return self::$id_aluno;
    }

    public static function setIdAluno($id_aluno)
    {
        self::$id_aluno = $id_aluno;
    }

    public static $table_name = 'alunos_turmas';

    public static function adicionar()
    {

        if(!self::find_by_id_turma_and_id_aluno(self::getIdTurma(), self::getIdAluno())):
            $registro = new self();
            $registro->id_turma = self::getIdTurma();
            $registro->id_aluno = self::getIdAluno();
            $registro->save();

            return 'ok';

        else:

            return 'erro';
        endif;

    }

    public static function salvarNumero($dados)
    {

        if(!empty($dados['ordem'])):
            foreach ($dados['ordem'] as $id => $ordem):
                $registro = self::find_by_id($id);
                $registro->ordem = $ordem;
                $registro->save();
            endforeach;
        endif;

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());
        $registro->delete();

        return 'ok';

    }

}
