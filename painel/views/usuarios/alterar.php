<div class="col-md-12" id="vmApp">
    <header class="bloco-conteudo">

        <div class="flex-centro">
            <a href="<?php echo HOME ?>/painel/usuarios" class="botao-circular botao-circular-padrao-claro botao-circular-medio margin-right10">
                <div><span class="material-icons icone">keyboard_arrow_left</span></div>
            </a>

            <div class="titulo font-light texto-cor-dourado">
                <?php echo empty($dados->registro) ? 'Novo Usuário' : 'Alterar Usuário'; ?>
                <?php echo !empty($dados->registro) ? '<span class="font-bold texto-cor-sucesso">'.$dados->registro->nome.'</span>' : ''; ?>
            </div>
        </div>
        <div class="clear"></div>

    </header>
    <div class="espaco10"></div>

    <?php if(\Geral\Utilidades::getUrl()[1] == 'ok' || \Geral\Utilidades::getUrl()[2] == 'ok'): ?>
        <div class="box-info fundo-sucesso">
            <div class="conteudo flex-centro">
                <div class="fundo-icone">
                    <span class="material-icons icone texto-cor-sucesso">done</span>
                </div>

                <span class="texto-info texto-cor-sucesso">
                    Dados salvos com sucesso
                </span>
            </div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <?php if(\Geral\Utilidades::getUrl()[1] == 'erro-senha-atual' || \Geral\Utilidades::getUrl()[2] == 'erro-senha-atual'): ?>
        <div class="box-info fundo-erro">
            <div class="conteudo flex-centro">
                <div class="fundo-icone">
                    <span class="material-icons icone texto-cor-erro">error</span>
                </div>

                <span class="texto-info texto-cor-erro">
                    A Senha Atual está incorreta
                </span>
            </div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <section class="bloco-conteudo">
        <div class="espaco20"></div>

        <form method="post" action="<?php echo empty($dados->registro) ? HOME.'/painel/novo-usuario' : HOME.'/painel/alterar-usuario/'.$dados->registro->id ?>" name="formDados" id="formDados" enctype="multipart/form-data">

            <div class="col-lg-3">

                <div class="col-md-12 fundo-padrao box-info">

                    <div class="flex-centro">
                        <span class="material-icons margin-right10">insert_photo</span>
                        <div class="font-bold">IMAGEM</div>
                    </div>
                    <div class="espaco20"></div>

                    <div id="bt-imagem" class="box-imagem" <?php echo !empty($dados->registro->imagem) ? 'style="background: url('.HOME.'/assets/imagens/usuarios/'.$dados->registro->imagem.') 50% 50% no-repeat; background-size: cover;"' : '' ?>>

                        <?php if(empty($dados->registro->imagem)): ?>
                            <span class="material-icons" style="font-size: 2.5em;">add_circle_outline</span>
                        <?php endif; ?>

                    </div>

                    <input type="file" name="imagem" id="imagem" class="oculto" value="">

                </div>

            </div>

            <!-- --------------------------------------------------- -->
            <!-- DIVISÃO DE COLUNAS -->

            <div class="col-lg-9">
                <input type="hidden" name="id" id="id" value="<?php echo $dados->registro->id ?>">

                <div class="col-md-4">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Tipo</label>
                        <select name="tipo" id="tipo" class="input input-delineado input-quadrado" autocomplete="off" required>
                            <option value=""></option>
                            <option <?php echo $dados->registro->tipo == 'admin' ? 'selected' : '' ?> value="admin">Administrativo</option>
                            <option <?php echo $dados->registro->tipo == 'professor' ? 'selected' : '' ?> value="professor">Professor</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="grupo-input">
                        <label class="control-label">Nome Completo</label>
                        <input type="text" name="nome" id="nome" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->nome; ?>" required>
                    </div>
                </div>
                <div class="espaco10"></div>

                <div class="col-md-4">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="input input-delineado input-quadrado mascara-telefone" autocomplete="off"  value="<?php echo $dados->registro->telefone; ?>">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">E-mail</label>
                        <input type="email" name="email" id="email" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->email; ?>">
                    </div>
                </div>
                <div class="espaco20"></div>

                <div class="col-md-12">
                    <div class="font-bold size1-2">ENDEREÇO</div>
                </div>
                <div class="espaco10"></div>

                <div class="col-md-10">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Rua</label>
                        <input type="text" name="rua" id="rua" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->rua; ?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Número</label>
                        <input type="text" name="numero" id="numero" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->numero; ?>">
                    </div>
                </div>
                <div class="espaco20"></div>

                <div class="col-md-6">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->bairro; ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Complemento</label>
                        <input type="text" name="complemento" id="complemento" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->complemento; ?>">
                    </div>
                </div>
                <div class="espaco20"></div>

                <div class="col-md-4">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Estado</label>
                        <select name="estado" id="estado" class="input input-delineado input-quadrado" autocomplete="off">
                            <option value=""></option>
                            <?php
                            if(!empty($dados->estados)):
                                foreach ($dados->estados as $estado):
                                    echo $dados->registro->estado == $estado->uf
                                        ? '<option selected value="'.$estado->uf.'">'.$estado->uf.'</option>'
                                        : '<option value="'.$estado->uf.'">'.$estado->uf.'</option>';
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->cidade; ?>">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="grupo-input">
                        <label for="regular1" class="control-label">CEP</label>
                        <input type="text" name="cep" id="cep" class="input input-delineado input-quadrado mascara-cep" autocomplete="off"  value="<?php echo $dados->registro->cep; ?>">
                    </div>
                </div>
                <div class="espaco20"></div>

                <?php if(\Geral\Utilidades::getUrl()[0] == 'novo-usuario'): ?>
                <div class="col-md-12">
                    <div class="fundo-padrao padding10 border-radius5">

                        <div class="espaco20"></div>
                        <div class="col-md-12">
                            <div class="font-bold size1-2">DADOS DE ACESSO</div>
                        </div>
                        <div class="espaco20"></div>

                        <div class="col-md-4">
                            <div class="grupo-input">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" id="login" class="input input-delineado input-quadrado" autocomplete="off"  value="" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="grupo-input">
                                <label class="control-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="input input-delineado input-quadrado" autocomplete="off"  value="" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="grupo-input">
                                <label class="control-label">Confirme a Senha</label>
                                <input type="password" name="confirma_senha" id="confirma_senha" class="input input-delineado input-quadrado" autocomplete="off"  value="" required>
                            </div>
                        </div>
                        <div class="espaco10"></div>

                    </div>
                </div>
                <?php endif; ?>

                <?php if(\Geral\Utilidades::getUrl()[0] == 'alterar-usuario'): ?>

                <div class="col-md-12">
                    <div class="fundo-padrao padding10 border-radius5">

                        <div class="espaco20"></div>
                        <div class="col-md-12">
                            <div class="font-bold size1-2">DADOS DE ACESSO</div>
                        </div>
                        <div class="espaco20"></div>

                        <div class="col-md-4">
                            <div class="grupo-input">
                                <label class="control-label">Login</label>
                                <input type="text" name="login" id="login" class="input input-delineado input-quadrado" autocomplete="off"  value="<?php echo $dados->registro->login ?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="espaco15"></div>
                            <button @click="abrirModalAlteraSenha" type="button" class="botao botao-dourado botao-arredondado botao-delineado-sucesso">Alterar Senha</button>
                        </div>
                        <div class="clear"></div>

                    </div>
                </div>

                <?php endif; ?>

                <div class="espaco10"></div>
            </div>

            <div class="col-md-12">
                <button type="submit" name="salvar" id="salvar" class="botao botao-dourado botao-quadradro botao-delineado-dourado">
                    <div class="botao-flex">
                        <span class="material-icons icone">done</span>
                        <div class="texto">Salvar</div>
                    </div>
                </button>
            </div>
            <div class="espaco20"></div>

        </form>

    </section>

</div>

<!-- elemento que chama modal (ocultos) -->
<a href="#senha-modal" rel="modal:open" id="chama-senha-dialog" class="oculto"></a>

<script type="module" src="<?php echo HOME ?>/assets/painel/js/usuarios.js"></script>

<?php
ModalComIcone(
    'alterar-senha-modal',
    '<span class="material-icons texto-cor-padrao icone-modal">lock</span>',
    'Alterar Senha',
    '<div class="col-md-12">

                <div class="grupo-input">
                    <label for="senha_atual">Senha Atual</label>
                    <input type="password" name="senha_atual" id="senha_atual" class="input input-quadrado input-delineado" value="">
                </div>

                <div class="grupo-input">
                    <label for="nova_senha">Nova Atual</label>
                    <input type="password" name="nova_senha" id="nova_senha" class="input input-quadrado input-delineado" value="">
                </div>

                <div class="grupo-input">
                    <label for="confirma_nova_senha">Confirme a Nova Atual</label>
                    <input type="password" name="confirma_nova_senha" id="confirma_nova_senha" class="input input-quadrado input-delineado" value="">
                </div>

            </div>',
    '
            <button @click="alterarSenha" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">Alterar Senha</button>
            <a href="#" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">Cancelar</a>
            '
);

ModalComIcone(
    'campos-obrigatorios-senha-modal',
    '<span class="material-icons texto-cor-erro icone-modal margin-right10">error</span>',
    'Erro Senha',
    'Todos os campos são obrigatório.',
    '<a href="#" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">OK</a>'
);

ModalComIcone(
    'senha-modal',
    '<span class="material-icons texto-cor-erro icone-modal margin-right10">error</span>',
    'Erro Senha',
    'A senha e a confirmação não são iguais',
    '<a href="#" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">OK</a>'
);

ModalComIcone(
    'erro-senha-atual-modal',
    '<span class="material-icons texto-cor-erro icone-modal">error</span>',
    'Erro Senha',
    'A senha atual está incorreta.',
    '<a href="#" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">OK</a>'
);

ModalComIcone(
    'senha-alterada-modal',
    '<span class="material-icons texto-cor-sucesso icone-modal">done</span>',
    'Sucesso',
    'Senha alterada com sucesso.',
    '<a href="#" class="botao botao-padrao-claro botao-arredondado texto-cor-padrao width120" rel="modal:close">OK</a>'
);

?>
