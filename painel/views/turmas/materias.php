<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <div class="flex-space-between">

            <div class="flex-centro">
                <a href="<?php echo HOME ?>/painel/turmas" class="botao-circular botao-circular-padrao-claro botao-circular-medio margin-right10">
                    <div><span class="material-icons icone">keyboard_arrow_left</span></div>
                </a>

                <div class="titulo font-bold texto-cor-dourado">Matéria da Turma: <?php echo SeriesModel::find_by_id($dados->turma->id_serie)->nome .' '. $dados->turma->turma.' '.($dados->turma->turno == 'manha' ? 'Manhã' : 'Tarde') ?></div>
            </div>

            <?php if(\Geral\Sessao::getTipoUsuarioPainel() == 'admin'): ?>
            <div>
                <a @click="novo" class="botao botao-arredondado botao-dourado botao-delineado-dourado">
                    <div class="botao-flex">
                        <span class="icone material-icons">add</span>
                        <span>Adicionar</span>
                    </div>
                </a>
            </div>
            <?php endif; ?>
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

        <input type="hidden" name="id_turma" id="id_turma" value="<?php echo \Geral\Utilidades::getUrl()[1] ?>">

        <div class="table-responsive">
            <table class="tabela-linha-ativa">
                <thead>
                <tr>
                    <th width="50">Código</th>
                    <th class="texto-esquerda">Matéria</th>
                    <th class="texto-esquerda">Professor</th>
                    <th width="150"></th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!empty($dados->registros)):
                    foreach ($dados->registros as $registro):

                        if (\Geral\Sessao::getTipoUsuarioPainel() == 'admin'):
                            $botoes = '
                                <button data-tippy-content="Alterar Cadastro" @click="alterar('.$registro->id.')" href="" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">create</i></button>
                                <button data-tippy-content="Excluir" @click="excluir('.$registro->id.')" href="#delete-modal" rel="modal:open" endereco="" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno bt-excluir" type="button"><i class="material-icons icone">delete</i></button>
                            ';
                        else:
                            $botoes = '';
                        endif;

                        echo '
                            <tr>
                                <td width="50">'.$registro->id.'</td>
                                <td class="texto-esquerda">'.$registro->nome_materia.'</td>
                                <td class="texto-esquerda">'.$registro->nome_professor.'</td>
                                <td class="flex-a-direita">
                                    '.$botoes.'
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

<script type="module" src="<?php echo HOME ?>/assets/painel/js/turma-materias.js"></script>

<?php
ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <input type="hidden" name="id" id="id" value="" />
                        
                <div class="grupo-input">
                    <label for="">Matéria</label>
                    <select type="text" name="id_materia" id="id_materia" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        '.$dados->materias.'
                    </select>
                </div>
                        
                <div class="grupo-input">
                    <label for="">Professor</label>
                    <select type="text" name="id_professor" id="id_professor" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        '.$dados->professores.'
                    </select>
                </div>
                
                <div class="grupo-input">
                    <label for="">Observações</label>
                    <textarea name="observacoes" id="observacoes" class="input input-quadrado input-delineado" rows="5"></textarea>
                </div>
            
            </div>     
          ',
    '
            <button @click="salvar" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Sim</button>
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
