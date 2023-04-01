<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <div class="flex-space-between">
            <div class="titulo font-bold texto-cor-dourado">Matérias</div>
            <div>
                <a @click="novo" class="botao botao-arredondado botao-dourado botao-delineado-dourado">
                    <div class="botao-flex">
                        <span class="icone material-icons">add</span>
                        <span>Adicionar</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="espaco10"></div>

        <div class="flex-a-direita">
            <div class="width300">
                <form action="<?php echo HOME ?>/painel/materias" method="post" name="formPesquisa">

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
                    <th>Matérias</th>
                    <th>Observações</th>
                    <th width="150"></th>
                </tr>
                </thead>
                <tbody>

                    <?php
                        if(!empty($dados->registros)):
                            foreach ($dados->registros as $registro):

                                echo '
                                    <tr>
                                        <td width="50">'.$registro->id.'</td>
                                        <td>'.$registro->nome.'</td>
                                        <td>'.$registro->observacoes.'</td>
                                        <td class="flex-a-direita">
                                            <button data-tippy-content="Alterar Cadastro" @click="alterar('.$registro->id.')" href="" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">create</i></button>
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

<script type="module" src="<?php echo HOME ?>/assets/painel/js/materias.js"></script>

<?php
ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <input type="hidden" name="id" id="id" value="" />
                        
                <div class="grupo-input">
                    <label for="">Nome</label>
                    <input type="text" name="nome" id="nome" class="input input-quadrado input-delineado" value="">
                </div>
                
                <div class="grupo-input">
                    <label for="">Observações</label>
                    <textarea name="observacoes" id="observacoes" rows="5" class="input input-quadrado input-delineado"></textarea>
                </div>
            
            </div>    
          ',
    '
            <button @click="salvar" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Salvar</button>
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

ModalComIcone(
    'erro-delete-modal',
    '<span class="material-icons texto-cor-erro icone-modal">error</span>',
    'Erro',
    'Esta matéria não pode ser excluída pois já está sendo utilizada em uma ou mais turmas.',
    '
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">OK</a>
            '
);
?>
