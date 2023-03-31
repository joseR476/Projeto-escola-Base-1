<?php


class SEOModel extends \ActiveRecord\Model
{

    public static $table_name = 'seo';

    public static $url;
    public static $titulo;
    public static $descricao;
    public static $palavras_chave;

    public static function salvar($id)
    {

        self::find_by_id($id)
            ? $registro = self::find_by_id($id)
            : $registro = new self();

        $registro->url = self::$url;
        $registro->titulo = self::$titulo;
        $registro->descricao = self::$descricao;
        $registro->palavras_chave = self::$palavras_chave;
        $registro->save();

        return 'ok';
    }

    public static function salvarOutros($id, $id_outro, $model)
    {

        self::find_by_id($id)
            ? $registro = self::find_by_id($id)
            : $registro = new self();

        $registro->url = self::$url;
        $registro->titulo = self::$titulo;
        $registro->descricao = self::$descricao;
        $registro->palavras_chave = self::$palavras_chave;
        $registro->save();

        $id_seo = $registro->id;

        $salvar_outro = $model::find_by_id($id_outro);
        $salvar_outro->id_seo = $id_seo;
        $salvar_outro->save();

        return 'ok';
    }

    public static function excluir($id)
    {
        $registro = self::find_by_id($id);
        $registro->delete();
        return 'ok';
    }

}