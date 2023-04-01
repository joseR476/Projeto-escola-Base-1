<div class="col-md-12">
    <header class="bloco-conteudo">

        <div class="flex-space-between">
            <div class="titulo font-bold texto-cor-dourado">Usuários</div>
            <div>
                <a href="<?php echo HOME ?>/painel/novo-usuario" class="botao botao-arredondado botao-dourado botao-delibotao-dourado">
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
                <form action="<?php echo HOME ?>/painel/usuarios" method="post" name="formPesquisa">

                    <div class="grupo-input">
                        <input type="text" name="pesquisa" id="pesquisa" class="input input-arredondado input-delineado" placeholder="Pesquisa" value="<?php echo $_POST['pesquisa']; ?>">
                    </div>

                </form>
            </div>
        </div>
        <div class="clear"></div>

    </header>
    <div class="espaco10"></div>

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

    <?php if(\Geral\Utilidades::getUrl()[1] == 'erro-professor'): ?>
        <div class="box-info fundo-erro">
            <div class="conteudo flex-centro">
                <div class="fundo-icone">
                    <span class="material-icons icone texto-cor-erro">error_outline</span>
                </div>

                <span class="texto-info texto-cor-erro">
                    Ops! Este professor não pode ser excluído pois já está sendo utilizado em uma ou mais turmas.
                </span>
            </div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <section class="bloco-conteudo">

        <?php
        if(!empty($dados->registros)):
            ?>

            <div class="table-responsive">
                <table class="tabela-linha-ativa">
                    <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Nome</th>
                        <th width="300">Login</th>
                        <th width="150">Status</th>
                        <th width="150"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($dados->registros as $registro):

                        echo '<tr>';
                        echo '<td data-title="tipo">'.($registro->tipo == 'admin' ? 'Administrativo' : 'Professor').'</td>';
                        echo '<td data-title="nome">'.$registro->nome.'</td>';
                        echo '<td data-title="login">'.$registro->login.'</td>';
                        echo $registro->status == 'a' ? '<td>Ativo</td>' : '<td>Inativo</td>';

                        echo '<td data-title="" style="text-align: right" class="flex-centro">'.
                            '<a data-tippy-content="Alterar Status" href="'.HOME.'/painel/status-usuario/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">autorenew</i></a>'.
                            '<a data-tippy-content="Alterar Cadastro" href="'.HOME.'/painel/alterar-usuario/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno margin-right10"><i class="material-icons icone">create</i></a>'.
                            '<a data-tippy-content="Excluir" href="#delete-modal" rel="modal:open" endereco="'.HOME.'/painel/excluir-usuario/'.$registro->id.'" class="botao-circular botao-circular-padrao-claro botao-circular-pequeno bt-excluir" type="button"><i class="material-icons icone">delete</i></a>'.
                            '</td>';
                        echo '</tr>';
                    endforeach;
                    ?>

                    </tbody>
                </table>
            </div>

        <?php
        else:
        ?>

            <div class="box-info fundo-padrao">
                <div class="conteudo flex-centro">
                    <div class="fundo-icone">
                        <span class="material-icons icone texto-cor-padrao">info</span>
                    </div>

                    <span class="texto-info texto-cor-padrao">
                    Nenhum usuário cadastrado
                </span>
                </div>
            </div>
            <div class="espaco10"></div>

        <?php
        endif;
        ?>

    </section>
</div>

<script src="<?php echo HOME ?>/assets/painel/js/usuarios.js"></script>

<?php
ModalComIcone(
    'delete-modal',
    '<span class="material-icons texto-cor-erro icone-modal margin-right10">clear</span>',
    'Exclusão',
    'Confirma a exclusão deste usuário? ',
    '
            <a href="" id="bt-excluir" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120">Sim</a>
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Cancelar</a>
            '
);
?>
