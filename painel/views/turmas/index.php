<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <div class="flex-space-between">
            <div class="titulo font-bold texto-cor-sucesso">Turmas</div>
            <div>
                <a @click="novo" class="botao botao-arredondado botao-sucesso botao-delineado-sucesso margin-right5">
                    <div class="botao-flex">
                        <span class="icone material-icons">add</span>
                        <span>Adicionar</span>
                    </div>
                </a>

                <a @click="modalRelatorio" class="botao botao-arredondado botao-sucesso botao-delineado-sucesso">
                    <div class="botao-flex">
                        <span class="icone material-icons">assessment</span>
                        <span>Relatório</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="espaco10"></div>

        <div class="flex-a-direita">
            <div class="width300">
                <form action="<?php echo HOME ?>/painel/turmas" method="post" name="formPesquisa">

                    <div class="grupo-input">
                        <input type="text" name="pesquisa" id="pesquisa" class="input input-arredondado input-delineado" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa']; ?>">
                    </div>

                </form>
            </div>
        </div>
        <div class="clear"></div>

    </header>
    <div class="espaco10"></div>

    <section class="bloco-conteudo">

        <?php if(\Geral\Utilidades::getUrl()[1] == 'exclusao-negada'): ?>
            <div class="box-info fundo-listrado-erro">
                <div class="conteudo flex-centro">
                    <div class="fundo-icone">
                        <span class="material-icons icone texto-cor-erro">error_outline</span>
                    </div>

                    <span class="texto-info texto-cor-erro">
                    Exclusão negada! É preciso haver pelo menos um usuário cadastrado.
                </span>
                </div>
            </div>
            <div class="espaco10"></div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="tabela-linha-ativa">
                <thead>
                <tr>
                    <th width="50">Código</th>
                    <th class="texto-esquerda">Turno</th>
                    <th class="texto-esquerda">Série</th>
                    <th class="texto-centro">Turma</th>
                    <th class="texto-centro">Nº Alunos</th>
                    <th width="150"></th>
                </tr>
                </thead>
                <tbody>

                    <?php
                        if(!empty($dados->registros)):
                            foreach ($dados->registros as $registro):

                                $numero_alunos = TurmasAlunosModel::find_by_sql("select count(id_aluno) as total_alunos from alunos_turmas where id_turma = '{$registro->id}' ");

                                echo '
                                    <tr>
                                        <td width="50">'.$registro->id.'</td>
                                        <td class="texto-esquerda">'.($registro->turno == 'manha' ? 'Manhã' : 'Tarde').'</td>
                                        <td class="texto-esquerda">'.(SeriesModel::find_by_id($registro->id_serie)->nome).'</td>
                                        <td class="texto-centro">'.$registro->turma.'</td>
                                        <td class="texto-centro">'.$numero_alunos[0]->total_alunos.'</td>
                                        <td class="flex-a-direita">
                                            <button data-tippy-content="Alterar Cadastro" @click="alterar('.$registro->id.')" href="" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">create</i></button>
                                            <a data-tippy-content="Matérias" href="'.HOME.'/painel/materias-turma/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">auto_stories</i></a>
                                            <a data-tippy-content="Alunos" href="'.HOME.'/painel/alunos-turma/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">perm_identity</i></a>
                                            <a data-tippy-content="Diários de Classe" href="'.HOME.'/painel/diarios-turma/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">note_alt</i></a>
                                            <button data-tippy-content="Excluir" @click="excluir('.$registro->id.')" href="#delete-modal" rel="modal:open" endereco="" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno bt-excluir" type="button"><i class="material-icons icone">delete</i></button>
                                        </td>
                                    </tr>              
                                ';

                            endforeach;
                        endif;
                    ?>

                </tbody>
            </table>
        </div>

    </section>
</div>

<script type="module" src="<?php echo HOME ?>/assets/painel/js/turmas.js"></script>

<?php

ModalComIcone(
    'relatorio-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">assessment</span>',
    '<div>Relatório de Acompanhamento</div>',
    '
            <div>
                           
                <div class="row">
                
                    <div class="col-md-6">         
                        <div class="grupo-input">
                            <label for="">Data Inicial</label>
                            <input type="text" name="data_inicio_relatorio" id="data_inicio_relatorio" class="input input-quadrado input-delineado" value="">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="grupo-input">
                            <label for="">Data Final</label>
                            <input type="text" name="data_final_relatorio" id="data_final_relatorio" class="input input-quadrado input-delineado" value="">
                        </div>
                    </div>
                </div>
                
                <div class="grupo-input">
                    <label for="">Turmas</label>
                    <select @change="buscarProfessores" type="text" name="id_turma" id="id_turma" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        '.$dados->turmas.'
                    </select>
                </div>
                
                <div class="grupo-input">
                    <label for="">Professor</label>
                    <select @click="buscarMaterias" type="text" name="id_professor" id="id_professor" class="input input-quadrado input-delineado">
                        <option value=""></option>
                    </select>
                </div>
                
                <div class="grupo-input">
                    <label for="">Matéria</label>
                    <select type="text" name="id_materia" id="id_materia" class="input input-quadrado input-delineado">
                        <option value=""></option>
                    </select>
                </div>
            
            </div>    
          ',
    '
            <button type="button" @click="gerar" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Gerar</button>
            <a href="#" id="bt-fechar-modal-cadastro" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Cancelar</a>
            '
);


ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <input type="hidden" name="id" id="id" value="" />
                        
                <div class="grupo-input">
                    <label for="">Série</label>
                    <select type="text" name="id_serie" id="id_serie" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        '.$dados->series.'
                    </select>
                </div>
                
                <div class="grupo-input">
                    <label for="">Turno</label>
                    <select type="text" name="turno" id="turno" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        <option value="manha">Manhã</option>
                        <option value="tarde">Tarde</option>
                    </select>
                </div>
                        
                <div class="grupo-input">
                    <label for="">Turma</label>
                    <input type="text" name="nome" id="nome" class="input input-quadrado input-delineado" value="">
                </div>
            
            </div>    
          ',
    '
            <button type="button" @click="salvar" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Salvar</button>
            <a href="#" id="bt-fechar-modal-cadastro" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Cancelar</a>
            '
);

ModalComIcone(
    'delete-modal',
    '<span class="material-icons texto-cor-erro icone-modal margin-right10">clear</span>',
    'Exclusão',
    'Confirma a exclusão deste item? ',
    '
            <button type="button" @click="excluir" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Sim</button>
            <a href="#" id="bt-fechar-modal-excluir" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Cancelar</a>
            '
);
?>
