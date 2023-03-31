<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo topo-fixo-ao-rolar">

        <div class="flex-space-between">

            <div class="flex-centro">
                <a href="<?php echo HOME ?>/painel/turmas" class="botao-circular botao-circular-padrao-claro botao-circular-medio margin-right10">
                    <div><span class="material-icons icone">keyboard_arrow_left</span></div>
                </a>

                <div class="titulo font-bold texto-cor-sucesso">Alunos da Turma: Nome da Turma</div>
            </div>

            <div>
                <a @click="novo" class="botao botao-arredondado botao-sucesso botao-delineado-sucesso">
                    <div class="botao-flex">
                        <span class="icone material-icons">add</span>
                        <span>Adicionar</span>
                    </div>
                </a>
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

        <form action="<?php echo HOME ?>/painel/salvar-numero-alunos-turma/<?php echo \Geral\Utilidades::getUrl()[1] ?>" method="post">

            <div class="table-responsive">
                <table class="tabela-linha-ativa tabelaOrdem">
                    <thead>
                        <tr>
                            <th width="150"></th>
                            <th class="texto-esquerda">Aluno</th>
                            <th class="texto-centro">RA</th>
                            <th class="texto-centro">E-mail</th>
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
                                    <td>
                                        <div class="flex-centro">
                                            <span class="material-icons margin-right5 texto-cor-padrao-claro">drag_handle</span>
                                            <div class="grupo-input" style="margin-bottom: 0;">
                                                <input style="padding: 8px 10px;" type="text" name="ordem['.$registro->id.']" value="" class="input input-delineado input-quadrado clique-nulo texto-centro ordem" size="2" readonly/>
                                            </div>
                                        </div>
                                    </td>
                                      
                                    <td class="texto-esquerda">'.$registro->nome_aluno.'</td>
                                    <td class="texto-centro">'.$registro->ra.'</td>
                                    <td class="texto-centro">'.$registro->email.'</td>
                                    <td class="texto-centro">'.$registro->telefone.'</td>
                                    <td class="flex-a-direita">
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

            <div class="espaco20"></div>
            <div class="col-md-12">
                <button type="submit" name="salvar" id="salvar" class="botao botao-sucesso botao-quadradro botao-delineado-sucesso">
                    <div class="botao-flex">
                        <span class="material-icons icone">list</span>
                        <div class="texto">Salvar Ordenação</div>
                    </div>
                </button>
            </div>
            <div class="espaco10"></div>

        </form>

    </section>
</div>

<script src="<?php echo HOME ?>/assets/painel/js/tabelas/jquery.tablednd.min.js"></script>
<script type="module" src="<?php echo HOME ?>/assets/painel/js/turma-alunos.js"></script>

<style>
    #cadastro-modal{
        max-width: 800px;
    }
</style>

<?php
ModalComIcone(
    'cadastro-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">add</span>',
    '<div>{{ titulo }}</div>',
    '
            <div>
            
                <div class="grupo-input">
                    <label for="">Pesquisar</label>
                    <input @keypress.enter="carregarDados" type="text" name="pesquisa_modal" id="pesquisa_modal" class="input input-quadrado input-delineado" value="" placeholder="">
                </div>         
                <div class="espaco10"></div>
                
                <table class="tabela-linha-ativa">
                <thead>
                <tr>
                    <th width="30"></th>
                    <th width="50">Código</th>
                    <th>Aluno</th>
                    <th class="texto-centro">RA</th>
                    <th class="texto-centro">E-mail</th>
                    <th class="texto-centro">Telefone</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="registro in registros" :key="registro.id">
                    <td width="30">
                        <a @click="adicionar(registro.id)" class="botao-circular botao-circular-padrao-claro botao-circular-medio margin-right10">
                            <div>
                                <span class="material-icons icone">add</span>
                            </div>
                        </a>
                    </td>
                    <td width="50">{{ registro.id }}</td>
                    <td class="texto-esquerda">{{ registro.nome }}</td>
                    <td class="texto-centro">{{ registro.ra }}</td>
                    <td class="texto-centro">{{ registro.email }}</td>
                    <td class="texto-centro">{{ registro.telefone }}</td>
                </tr>

                </tbody>
            </table>
            
            </div>     
          ',
    '
            <button type="button" onclick="location.reload()" id="bt-fechar-modal-cadastro" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">Sair</button>
            '
);

ModalComIcone(
    'sucesso-modal',
    '<span class="material-icons texto-cor-erro icone-modal">done</span>',
    'Sucesso',
    'Aluno adicionado com sucesso.',
    '
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">OK</a>
            '
);

ModalComIcone(
    'erro-modal',
    '<span class="material-icons texto-cor-erro icone-modal margin-right10">clear</span>',
    'Erro',
    'Aluno já adicionado.',
    '
            <a href="#" class="botao botao-padrao-claro botao-arredondado width100" rel="modal:close">OK</a>
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
