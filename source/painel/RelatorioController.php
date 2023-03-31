<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;

class RelatorioController extends Rotas
{

    public function gerar()
    {

        $data_inicio = !empty($_POST['data_inicio']) ? Utilidades::formataDataFormatoAmericano(filtra_string($_POST['data_inicio'])) : '';
        $data_final = !empty($_POST['data_final']) ? Utilidades::formataDataFormatoAmericano(filtra_string($_POST['data_final'])) : '';

        if(!empty($data_inicio) && empty($data_final)):
            $data_final = $data_inicio;
        endif;

        $id_turma = !empty($_POST['id_turma']) ? filtra_int($_POST['id_turma']) : '%';
        $id_professor = !empty($_POST['id_professor']) ? filtra_int($_POST['id_professor']) : '%';
        $id_materia = !empty($_POST['id_materia']) ? filtra_int($_POST['id_materia']) : '%';

        if(!empty($data_inicio)):
            $between = " and data between '{$data_inicio}' and '{$data_final}' ";
            $periodo_relatorio = '
                <div>De '.$_POST['data_inicio'].' até '.$_POST['data_final'].'</div>
                <div class="espaco20"></div>
                ';
        else:
            $between = "";
            $periodo_relatorio = '';
        endif;

        $materias = \VTurmasMateriasModel::all(['conditions' => ['id_professor = ? and id_materia like ?', $id_professor, $id_materia], 'order' => 'nome_materia asc']);
        //$registros = \VRegistrosDiarioModel::find_by_sql("select * from v_registros_diario where id_turma like '{$id_turma}' and id_materia like '{$id_materia}' {$between} order by ordem asc ");

        $colunas_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):

                $colunas_materias .= '
                    <td class="texto-centro" colspan="4">'.$materia->nome_materia.'</td>
                ';

            endforeach;
        endif;

        $colunas_dados_materias = '';
        if(!empty($materias)):
            foreach ($materias as $materia):

                $colunas_dados_materias .= '
                    <td class="texto-centro">Aulas</td>
                    <td class="texto-centro">P</td>
                    <td class="texto-centro">F</td>
                    <td class="texto-centro">%</td>
                ';

            endforeach;
        endif;

        $alunos = \VAlunosTurmas::all(['conditions' => ['id_turma = ?', $id_turma], 'order' => 'ordem asc']);
        $dados_alunos = '';

        if(!empty($alunos)):
            foreach ($alunos as $aluno):

                $colunas_aluno_materia = '';
                if(!empty($materias)):
                    foreach ($materias as $materia):

                        $total_aulas = \DiariosModel::find_by_sql("select count(id) as total from diario_classe where id_turma = '{$id_turma}' and id_materia like '{$materia->id_materia}' {$between} ");
                        $chamadas = \VRegistrosDiarioModel::find_by_sql("select id, presente_chamada1 as p1, presente_chamada2 as p2 from v_registros_diario where id_turma = '{$id_turma}' and id_materia = '{$materia->id_materia}' and id_aluno = '{$aluno->id_aluno}' {$between} ");
                        $total_presencas = 0;
                        $aproveitamento = 0;

                        if(!empty($chamadas)):
                            foreach ($chamadas as $chamada):
                                $chamada->p1 == 's' ? $total_presencas += 0.5 : '';
                                $chamada->p2 == 's' ? $total_presencas += 0.5 : '';
                            endforeach;
                        endif;

                        if(!empty($total_aulas) && !empty($total_presencas)):
                            $aproveitamento = (($total_presencas/$total_aulas[0]->total)*100);
                        else:
                            $aproveitamento = 0;
                        endif;

                        $colunas_aluno_materia .= '
                            <td class="texto-centro">'.$total_aulas[0]->total.'</td>
                            <td class="texto-centro">'.$total_presencas.'</td>
                            <td class="texto-centro">'.($total_aulas[0]->total-$total_presencas).'</td>
                            <td class="texto-centro">'.$aproveitamento.'%</td>
                        ';

                    endforeach;
                endif;

                $dados_alunos .= '
                    <tr>
                        <td>'.$aluno->ordem.'</td>
                        <td>'.$aluno->nome_aluno.'</td>
                        '.$colunas_aluno_materia.'
                    </tr>
                ';

            endforeach;
        endif;

        $html = '
            <html>
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width">
                     
                    <title>Relatório</title>
                    <link rel="icon" href="'.HOME.'/assets/imagens/favicon.png">
                    <link rel="stylesheet" href="'.HOME.'/assets/css/grid.css"/>
                    <link rel="stylesheet" href="'.HOME.'/assets/css/boot.css"/>
                    <link rel="stylesheet" href="'.HOME.'/assets/css/estilo-painel.css"/>
                    <link rel="stylesheet" href="'.HOME.'/assets/css/relatorio.css"/>
                </head>
                
                <body>
                
                    <div class="espaco10"></div>
                    <div class="size1-1 font-bold">Professor: '.(\UsuariosModel::find_by_id($id_professor)->nome).'</div>
                    <div class="espaco10"></div>
                    
                    '.$periodo_relatorio.'
                
                    <table class="tabela-linha-ativa">
                        <thead>
                            
                            <tr>
                                <th rowspan="2" width="50">Número</th>
                                <th rowspan="2" class="texto-esquerda">Aluno</th>
                                '.$colunas_materias.'
                            </tr> 
                            
                            <tr>
                                '.$colunas_dados_materias.'
                            </tr> 
                            
                        </thead>
                        <tbody>
                            '.$dados_alunos.'                        
                        </tbody>
                    </table>
                    
                </body>
            </html>
        ';

        echo json_encode(['status' => 'ok', 'conteudo' => $html]);
        
    }

}