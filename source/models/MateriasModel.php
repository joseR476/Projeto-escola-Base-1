<?php

use ActiveRecord\Model;

class MateriasModel extends Model
{

    private static $id;
    private static $nome;
    private static $observacoes;

    public static function getId()
    {
        return self::$id;
    }

    public static function setId($id)
    {
        self::$id = $id;
    }

    public static function getNome()
    {
        return self::$nome;
    }

    public static function setNome($nome)
    {
        self::$nome = $nome;
    }

    public static function getObservacoes()
    {
        return self::$observacoes;
    }

    public static function setObservacoes($observacoes)
    {
        self::$observacoes = $observacoes;
    }

    public static $table_name = 'materias';

    public static function salvar()
    {

        self::find_by_id(self::getId())
            ? $registro = self::find_by_id(self::getId())
            : $registro = new self();

        $registro->nome = self::getNome();
        $registro->observacoes = self::getObservacoes();
        $registro->save();

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());

        if(TurmasMateriasModel::find_by_id_materia($registro->id)):
            return 'erro';
        endif;

        $registro->delete();

        return 'ok';

    }

}
