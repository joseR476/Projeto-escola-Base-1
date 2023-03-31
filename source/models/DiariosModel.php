<?php

use ActiveRecord\Model;
use Geral\Utilidades;

class DiariosModel extends Model
{

    private static $id;
    private static $id_turma;
    private static $id_materia;
    private static $data;
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

    public static function getData()
    {
        return self::$data;
    }

    public static function setData($data)
    {
        self::$data = !empty($data) ? Utilidades::formataDataFormatoAmericano($data) : '';
    }

    public static function getObservacoes()
    {
        return self::$observacoes;
    }

    public static function setObservacoes($observacoes)
    {
        self::$observacoes = $observacoes;
    }


    public static $table_name = 'diario_classe';

    public static function novo()
    {

        if(!self::find_by_id_turma_and_id_materia_and_data(self::getIdTurma(), self::getIdMateria(), self::getData())):

            $registro = new self();
            $registro->id_turma = self::getIdTurma();
            $registro->id_materia = self::getIdMateria();
            $registro->data = self::getData();
            $registro->save();
            return ['status' => 'ok', 'id' => $registro->id];

        else:

            $registro = self::find_by_id_turma_and_id_materia_and_data(self::getIdTurma(), self::getIdMateria(), self::getData());
            return ['status' => 'ok', 'id' => $registro->id];

        endif;

    }

    public static function excluir()
    {



    }

}