<?php

use ActiveRecord\Model;

class TurmasMateriasModel extends Model
{

    private static $id;
    private static $id_turma;
    private static $id_materia;
    private static $id_professor;
    private static $observacoes;

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

    public static function getIdMateria()
    {
        return self::$id_materia;
    }

    public static function setIdMateria($id_materia)
    {
        self::$id_materia = $id_materia;
    }

    public static function getIdProfessor()
    {
        return self::$id_professor;
    }

    public static function setIdProfessor($id_professor)
    {
        self::$id_professor = $id_professor;
    }

    public static function getObservacoes()
    {
        return self::$observacoes;
    }

    public static function setObservacoes($observacoes)
    {
        self::$observacoes = $observacoes;
    }

    public static $table_name = 'turmas_materias';

    public static function salvar()
    {
        self::find_by_id(self::getId())
            ? $registro = self::find_by_id(self::getId())
            : $registro = new self();

        $registro->id_turma = self::getIdTurma();
        $registro->id_materia = self::getIdMateria();
        $registro->id_professor = self::getIdProfessor();
        $registro->observacoes = self::getObservacoes();
        $registro->save();

        return 'ok';

    }

    public static function excluir()
    {
        $registro = self::find_by_id(self::getId());
        $registro->delete();

        return 'ok';
    }

}
