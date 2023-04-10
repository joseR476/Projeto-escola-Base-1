<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <div class="flex-space-between">
            <div class="titulo font-bold texto-cor-dourado">Alunos</div>
            <div>
                <a href="<?php echo HOME ?>/painel/alterar-aluno" class="botao botao-arredondado botao-dourado botao-delineado-dourado">
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
                <form action="<?php echo HOME ?>/painel/alunos" method="post" name="formPesquisa">

                    <div class="grupo-input">
                        <input type="text" name="pesquisa" id="pesquisa" class="input input-arredondado input-delineado" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa']; ?>">
                    </div>

                </form>
            </div>
        </div>
        <div class="clear"></div>

    </header>
    <div class="espaco10"></div>

    <?php if(\Geral\Utilidades::getUrl()[1] == 'erro'): ?>
        <div class="box-info fundo-erro">
            <div class="conteudo flex-centro">
                <div class="fundo-icone">
                    <span class="material-icons icone texto-cor-erro">error_outline</span>
                </div>

                <span class="texto-info texto-cor-erro">
                    Este aluno não pode ser excluído pois já está matriculado em uma ou mais turmas.
                </span>
            </div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <section class="bloco-conteudo">

        <div class="table-responsive">
            <table class="tabela-linha-ativa">
                <thead>
                    <tr>
                        <th width="50">Código</th>
                        <th class="texto-esquerda">Aluno</th>
                        <th class="texto-centro">RA</th>
                        <th class="texto-centro">E-mail</th>
                        <th class="texto-centro">E-mail Responsãvel</th>
                        <th class="texto-centro">Telefone</th>
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
                                <td class="texto-esquerda">'.$registro->nome.'</td>
                                <td class="texto-centro">'.$registro->ra.'</td>
                                <td class="texto-centro">'.$registro->email.'</td>
                                <td class="texto-centro">'.$registro->email_responsavel.'</td>
                                <td class="texto-centro">'.$registro->telefone.'</td>
                                <td class="flex-a-direita">
                                    <a href="'.HOME.'/painel/alterar-aluno/'.$registro->id.'" data-tippy-content="Alterar" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right5"><i class="material-icons icone">edit</i></a>
                                    <a data-tippy-content="Excluir" href="#delete-modal" rel="modal:open" endereco="'.HOME.'/painel/excluir-aluno/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno bt-excluir" type="button"><i class="material-icons icone">delete</i></a>
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

<script type="module" src="<?php echo HOME ?>/assets/painel/js/alunos.js"></script>

<?php
ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <input type="hidden" name="id" id="id" value="" />
                        
                <div class="grupo-input">
                    <label for=""></label>
                    <input type="text" name="nome" id="nome" class="input input-quadrado input-delineado" value="">
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
    '<span class="material-icons texto-cor-erro icone-modal">clear</span>',
    'Exclusão',
    'Confirma a exclusão deste item? ',
    '
            <a href="" id="bt-excluir" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Sim</a>
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Cancelar</a>
            '
);

ModalComIcone(
    'erro-delete-modal',
    '<span class="material-icons texto-cor-erro icone-modal">error</span>',
    'Erro',
    'Este aluno não pode ser excluído pois já está matriculado em uma ou mais turmas.',
    '
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">OK</a>
            '
);
?>
