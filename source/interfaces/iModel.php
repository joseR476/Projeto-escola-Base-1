<?php
namespace Interfaces;

interface iModel
{

    public static function novo($dados);
    public static function alterar($dados);
    public static function status($id);
    public static function excluir($id);

}