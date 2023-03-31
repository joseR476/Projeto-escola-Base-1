<?php
namespace Helpers;
use Geral\Rotas;
use Geral\Utilidades;

class AsidePainelHelper extends Rotas
{

    /*Admin*/
    const INICIO_ADMIN = ['inicio-admin'];
    const USUARIOS_ADMIN = ['usuarios-admin'];
    const EMPRESAS_ADMIN = ['empresas-admin'];

    /*Painel*/
    const INICIO = ['inicio'];
    const USUARIOS = ['usuarios', 'novo-usuario', 'alterar-usuario'];
    const SERIES = ['series'];
    const TURMAS = ['turmas', 'nova-turma', 'alterar-turma'];
    const MATERIAS = ['materias'];
    const ALUNOS = ['alunos', 'novo-aluno', 'alterar-aluno'];

    const RELATÓRIOS = [
        'rel-contas-a-apagar-e-receber', 'rel-fluxo-caixa', 'rel-comparar-periodos',
        'rel-precificacao', 'rel-vendas', 'rel-comissoes'
    ];

    public static function menuAtivo($menu, $url)
    {
        $url = Utilidades::getUrl()[0];
        if(in_array($url, $menu)):
            return 'menu-ativo';
        endif;
    }

}
