<form action="<?php echo HOME ?>/painel/salvar-diario-turma/<?php echo $dados->materia->id_turma ?>/<?php echo $dados->materia->id_materia ?>/<?php echo $dados->diario->id ?>" method="post" name="formDados" id="formDados">
<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <input type="hidden" id="id_diario" name="id_diario" value="<?php echo $dados->diario->id ?>">

        <div class="flex-space-between">

            <div class="flex-centro">
                <a href="<?php echo HOME ?>/painel/diarios-turma/<?php echo \Geral\Utilidades::getUrl()[1] ?>" class="botao-circular botao-circular-padrao-claro botao-circular-medio margin-right10">
                    <div><span class="material-icons icone">keyboard_arrow_left</span></div>
                </a>

                <div>
                <div class="titulo font-bold texto-cor-dourado">Diários da Turma: <?php echo $dados->materia->nome_serie .' '. $dados->materia->nome_turma ?></div>
                <div class="titulo font-bold texto-cor-dourado">Matéria: <?php echo $dados->materia->nome_materia ?></div>
                <div class="titulo font-bold texto-cor-dourado">Data: <?php echo $dados->diario->data->format('d/m/Y') ?></div>
                </div>
            </div>

            <div class="flex-centro">
                <a @click="novo" class="botao botao-arredondado botao-dourado botao-delineado-dourado margin-right5">
                    <div class="botao-flex">
                        <span class="icone material-icons">add</span>
                        <span>Adicionar</span>
                    </div>
                </a>

                <button type="submit" class="botao botao-arredondado botao-dourado botao-delibotao-dourado">
                    <div class="botao-flex">
                        <span class="icone material-icons">save</span>
                        <span>Salvar</span>
                    </div>
                </button>
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

        <input type="hidden" name="id_turma" id="id_turma" value="<?php echo \Geral\Utilidades::getUrl()[1] ?>">

        <div class="table-responsive">
            <table class="tabela-linha-ativa">
                <thead>
                <tr>
                    <th width="50">Número</th>
                    <th class="texto-esquerda">Aluno</th>
                    <th width="100" class="texto-centro">Presença Antes do Intervalo</th>
                    <th width="100" class="texto-centro">Presença Após do Intervalo</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if(!empty($dados->registros)):
                    foreach ($dados->registros as $registro):

                        echo '
                            <tr>
                                <td width="50">'.$registro->ordem.'</td>
                                <td class="texto-esquerda">'.$registro->nome.'</td>
                                
                                <td class="texto-centro">
                                    <div class="interruptor__container margin-right10">
                                        <input id="presenca_antes_interalo_'.$registro->id.'" type="checkbox" name="presenca_antes_interalo['.$registro->id.']" '.($registro->presente_chamada1 == 's' ? 'checked' : '').' class="interruptor interruptor-sucesso selecao-conta"> 
                                        <label for="presenca_antes_interalo_'.$registro->id.'"></label>
                                    </div>
                                </td>
                                
                                <td class="texto-centro">
                                    <div class="interruptor__container margin-right10">
                                        <input id="presenca_apos_interalo_'.$registro->id.'" type="checkbox" name="presenca_apos_interalo['.$registro->id.']" '.($registro->presente_chamada2 == 's' ? 'checked' : '').' class="interruptor interruptor-sucesso selecao-conta"> 
                                        <label for="presenca_apos_interalo_'.$registro->id.'"></label>
                                    </div>
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
</form>

<script type="module" src="<?php echo HOME ?>/assets/painel/js/turma-diarios.js"></script>

<?php
ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <input type="hidden" name="id" id="id" value="" />
                        
                <div class="grupo-input">
                    <label for="">Data</label>
                    <input type="text" name="data_diario" id="data_diario" class="input input-quadrado input-delineado"/>
                </div>
                        
                <div class="grupo-input">
                    <label for="">Matéria</label>
                    <select type="text" name="id_materia_diario" id="id_materia_diario" class="input input-quadrado input-delineado">
                        <option value=""></option>
                        '.$dados->materias.'
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
