<?php

use ActiveRecord\Model;

class SeriesModel extends Model
{

    private static $id;
    private static $nome;

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

    public static $table_name = 'series';

    public static function salvar()
    {

        self::find_by_id(self::getId())
            ? $registro = self::find_by_id(self::getId())
            : $registro = new self();

        $registro->nome = self::getNome();
        $registro->save();

        return 'ok';

    }

    public static function excluir()
    {

        $registro = self::find_by_id(self::getId());

        if(TurmasModel::find_by_id_serie($registro->id)):
            return 'erro';
        endif;

        $registro->delete();

        return 'ok';

    }

}
