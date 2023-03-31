<?php
namespace Geral;
use Geral\Rotas;

class TituloPaginas extends Rotas
{

    public static function titulo($nivel, $pagina)
    {
        /*
        $id_origem = $_SESSION['origem-cardapio']['id'];
        $origem = \OrigensModel::find_by_id($id_origem);
        */

        $titulo_site = 'CheckCarro';

        $nomes = [
            'site' => [
                /**/
                ['pagina' => '', 'titulo' => $titulo_site],

            ],

            'admin' => [
                /**/
                ['pagina' => '', 'titulo' => $titulo_site.' - Painel Administrador'],

            ],

            'painel' => [
                /**/
                ['pagina' => '', 'titulo' => $titulo_site.' - Login'],
                ['pagina' => 'login', 'titulo' => $titulo_site.' - Login'],

            ],

            'relatorios' => [
                //['pagina' => 'imprimir-orcamento', 'titulo' => $titulo_site.' - Imprimir Orçamento'],
            ],
        ];

        if(!empty($nomes)):
            foreach ($nomes[$nivel] as $dados):
                if($pagina == $dados['pagina']):
                    return $dados['titulo'];
                endif;
            endforeach;
        endif;
    }

}