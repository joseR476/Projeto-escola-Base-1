<?php
if(!function_exists('criarPasta')){
    function criarPasta($local)
    {
        if(!file_exists($local)):
            mkdir($local, 0777, true);
        endif;
    }
}

if(!function_exists('formataDataFormatoAmericano')){
    function formataDataFormatoAmericano($data)
    {
        return implode('-', array_reverse(explode('/', $data)));
    }
}

if(!function_exists('formataDataHoraFormatoAmericano')){
    function formataDataHoraFormatoAmericano($data_hora)
    {
        $pedacos = explode(' ', $data_hora);
        $data = implode('-', array_reverse(explode('/', $pedacos[0])));
        $hora = $pedacos[1];
        return $data.' '.$hora;
    }
}

if(!function_exists('removeCaracteres')){
    function removeCaracteres(array $caracteres, string $valor)
    {
        if(!empty($caracteres)):
            foreach ($caracteres as $caractere):
                $valor = str_replace($caractere, '', $valor);
            endforeach;
        endif;

        return $valor;
    }
}

if(!function_exists('removerLetras')){
    function removerLetras($string)
    {
        return preg_replace("/[^0-9]/", "", $string);
    }
}
