<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/grid.css">
<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/boot.css">
<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/orcamento.css">

<style>
    .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{
        padding-right: 2px;
        padding-left: 2px;
    }
</style>

<div class="container">

    <header id="cabecalho">

        <div id="logo-empresa" <? echo !empty($dados->empresa->logo) ? 'style="background: url('.HOME.'/assets/imagens/empresas/'.$dados->empresa->id.'/logo/'.$dados->empresa->logo.') 50% 50% no-repeat; background-size: cover;"' : ''; ?> >

        </div>

        <div>
            <div class="nome-fantasia"><?php echo $dados->empresa->nome_fantasia?></div>
            <div class="espaco10"></div>
            <div class="dados-empresa">
                <?php echo $dados->empresa->rua ?>, Nº <?php echo $dados->empresa->numero ?>, <?php echo $dados->empresa->rua ?>, <?php echo $dados->cidade->nome ?> - <?php echo $dados->estado->nome ?> - CEP: <?php echo $dados->empresa->cep ?> - CNPJ: <?php echo $dados->empresa->cnpj ?>
                - E-mail: <?php echo $dados->empresa->email ?> - <?php echo !empty($dados->empresa->telefone) ? 'Tel.: '.$dados->empresa->telefone : ''  ?> - <?php echo !empty($dados->empresa->nome_responsavel) ? 'Representante: '.$dados->empresa->nome_responsavel : '' ?> -
                <?php echo !empty($dados->empresa->email_responsavel) ? 'E-mail: '. $dados->empresa->email_responsavel : '' ?> - <?php echo !empty($dados->empresa->telefone_responsavel) ? 'Tel.: '.$dados->empresa->telefone_responsavel : '' ?>
            </div>
        </div>

        <div class="texto-direita dados-orcamento">
            <?php echo !empty($dados->ordem_servico->data_emissao) ? 'Criada em: '.$dados->ordem_servico->data_emissao->format('d/m/Y') : '' ?>
            <br>
            <?php echo !empty($dados->ordem_servico->validade) ? 'Validade: '.$dados->ordem_servico->validade .' dias' : '' ?>
            <br>
            <?php echo !empty($dados->ordem_servico->numero) ? 'Cod.: '.str_pad($dados->ordem_servico->numero, 7, '0', STR_PAD_LEFT) : '' ?>
        </div>

    </header>

    <div class="box">
        <div class="espaco10"></div>
        <!--<div class="texto-centro" id="titulo-orcamento">ORÇAMENTO # - <?php echo $dados->situacao_ordem_servico ?></div>-->
        <div class="texto-centro" id="titulo-orcamento">ORDEM DE SERVIÇO # - <?php echo str_pad($dados->ordem_servico->numero, 7, '0', STR_PAD_LEFT) ?></div>
    </div>
    <div class="espaco20"></div>

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">DADOS DO CLIENTE</div>
    </div>
    <div class="espaco10"></div>

    <div>
        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Código</div>
                <div class="informacao"><?php echo $dados->cliente->id ?></div>
            </div>
        </div>

        <div class="col-xs-5">
            <div class="campo-informacao">
                <div class="titulo">Nome Fantasia</div>
                <div class="informacao"><?php echo $dados->cliente->nome_fantasia ?></div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="campo-informacao">
                <div class="titulo">Razão Soacial</div>
                <div class="informacao"><?php echo $dados->cliente->razao_social ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

        <div class="col-xs-9">
            <div class="campo-informacao">
                <div class="titulo">Endereço</div>
                <div class="informacao"><?php echo $dados->cliente->rua ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Número</div>
                <div class="informacao"><?php echo $dados->cliente->numero ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Bairro</div>
                <div class="informacao"><?php echo $dados->cliente->bairro ?></div>
            </div>
        </div>

        <div class="col-xs-9">
            <div class="campo-informacao">
                <div class="titulo">Complemento</div>
                <div class="informacao"><?php echo $dados->cliente->complemento ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Cidade</div>
                <div class="informacao"><?php echo $dados->cidade_cliente->nome ?></div>
            </div>
        </div>

        <div class="col-xs-1">
            <div class="campo-informacao">
                <div class="titulo">UF</div>
                <div class="informacao"><?php echo $dados->estado_cliente->uf ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">CEP</div>
                <div class="informacao"><?php echo $dados->cliente->cep ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">CNPJ/CPF</div>
                <div class="informacao"><?php echo $dados->cliente->tipo_pessoa == 'j' ? (!empty($dados->cliente->cnpj) ? Mascara('##.###.###/####-##', $dados->cliente->cnpj) : '') : (!empty($dados->cliente->cpf) ? Mascara('###.###.###-##', $dados->cliente->cpf) : ''); ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">I.E/RG</div>
                <div class="informacao"><?php echo $dados->cliente->inscricao_estadual ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

        <div class="col-xs-5">
            <div class="campo-informacao">
                <div class="titulo">Telefone</div>
                <div class="informacao"><?php echo $dados->cliente->telefone ?></div>
            </div>
        </div>

        <div class="col-xs-7">
            <div class="campo-informacao">
                <div class="titulo">E-mail</div>
                <div class="informacao"><?php echo $dados->cliente->email ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

    </div>

    <div class="espaco10"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->
    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">DADOS DA OS</div>
    </div>
    <div class="espaco10"></div>

    <div>
        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Vendedor</div>
                <div class="informacao"><?php echo $dados->vendedor->nome; ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Data Prevista Para Finalização</div>
                <div class="informacao"><?php echo !empty($dados->ordem_servico->data_prevista_finalizacao) ? $dados->ordem_servico->data_prevista_finalizacao->format('d/m/Y') : '' ?></div>
            </div>
        </div>
        <div class="espaco10"></div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Data Finalização</div>
                <div class="informacao"><?php echo !empty($dados->ordem_servico->data_finalizacao) ? $dados->ordem_servico->data_finalizacao->format('d/m/Y') : '' ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Data Saída</div>
                <div class="informacao"><?php echo !empty($dados->ordem_servico->data_saida) ? $dados->ordem_servico->data_saida->format('d/m/Y') : '' ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Hora Início</div>
                <div class="informacao"><?php echo !empty($dados->ordem_servico->hora_inicio) ? $dados->ordem_servico->hora_inicio : '' ?></div>
            </div>
        </div>

        <div class="col-xs-3">
            <div class="campo-informacao">
                <div class="titulo">Hora Término</div>
                <div class="informacao"><?php echo !empty($dados->ordem_servico->hora_termino) ? $dados->ordem_servico->hora_termino : '' ?></div>
            </div>
        </div>
    </div>

    <div class="espaco10"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">PRODUTOS DA ORDEM DE SERVIÇO</div>
    </div>
    <div class="espaco10"></div>

    <?php if(!empty($dados->produtos_ordem_servico)): ?>
        <div>
            <table class="tabela-orcamento">
                <thead>
                <tr>
                    <th class="texto-centro">SEQ</th>
                    <th>DESCRIÇÃO</th>
                    <th class="texto-centro">UN</th>
                    <th class="texto-centro">QTD</th>
                    <th class="texto-direita">VL. UNIT S/ DESC.</th>
                    <th class="texto-centro">% DESC.</th>
                    <th class="texto-direita">VL. DESC.</th>
                    <th class="texto-direita">VL. UNIT C/ DESC.</th>
                    <th class="texto-direita">TOTAL</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($dados->produtos_ordem_servico as $item):
                    echo '
                <tr>
                    <td class="texto-centro">'.$dados->cont_produto.'</td>
                    <td style="max-width: 250px;">
                        <div>'.$item->nome.'</div>
                        <div class="espaco5"></div>
                        <div class="size0-8 font-regular">'.$item->observacoes.'</div>
                    </td>
                    <td class="texto-centro">'.$item->unidade_medida.'</td>
                    <td class="texto-centro">'.$item->quantidade.'</td>
                    <td class="texto-direita">'.number_format($item->preco_unidade, 2, ',', '.').'</td>
                    <td class="texto-centro">'.number_format($item->desconto, 2, ',', '').' %</td>
                    <td class="texto-direita">'.number_format((($item->preco_unidade*$item->desconto)/100), 2, ',', '.').'</td>
                    <td class="texto-direita">'.number_format(($item->preco_unidade-($item->preco_unidade*$item->desconto)/100), 2, ',',  '.').'</td>
                    <td class="texto-direita">'.number_format($item->preco_total, 2,  ',', '.').'</td>
                </tr>
            ';

                    $dados->quantidade_itens += $item->quantidade;
                    $dados->total_produtos_ordem_servico += $item->preco_total;
                    $dados->cont_produto++;

                endforeach;
                ?>
                </tbody>

            </table>

        </div>
    <?php endif; ?>
    <div class="espaco20"></div>

    <!-- ---------------------------------------------------------------------------- -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">SERVIÇOS DA ORDEM DE SERVIÇO</div>
    </div>
    <div class="espaco10"></div>

    <?php if(!empty($dados->servicos_ordem_servico)): ?>
        <div>
            <table class="tabela-orcamento">
                <thead>
                <tr>
                    <th class="texto-centro">SEQ</th>
                    <th>DESCRIÇÃO</th>
                    <th class="texto-centro">UN</th>
                    <th class="texto-centro">QTD</th>
                    <th class="texto-direita">VL. UNIT S/ DESC.</th>
                    <th class="texto-centro">% DESC.</th>
                    <th class="texto-direita">VL. DESC.</th>
                    <th class="texto-direita">VL. UNIT C/ DESC.</th>
                    <th class="texto-direita">TOTAL</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($dados->servicos_ordem_servico as $item):
                    echo '
                <tr>
                    <td class="texto-centro">'.$dados->cont_servico.'</td>
                    <td style="max-width: 250px;">
                        <div>'.$item->nome.'</div>
                        <div class="espaco5"></div>
                        <div class="size0-8 font-regular">'.$item->observacoes.'</div>
                    </td>
                    <td class="texto-centro">'.$item->unidade_medida.'</td>
                    <td class="texto-centro">'.$item->quantidade.'</td>
                    <td class="texto-direita">'.number_format($item->preco_unidade, 2, ',', '.').'</td>
                    <td class="texto-centro">'.number_format($item->desconto, 2, ',', '').' %</td>
                    <td class="texto-direita">'.number_format((($item->preco_unidade*$item->desconto)/100), 2, ',', '.').'</td>
                    <td class="texto-direita">'.number_format(($item->preco_unidade-($item->preco_unidade*$item->desconto)/100), 2, ',',  '.').'</td>
                    <td class="texto-direita">'.number_format($item->preco_total, 2,  ',', '.').'</td>
                </tr>
            ';

                    $dados->quantidade_itens += $item->quantidade;
                    $dados->total_servicos_ordem_servico += $item->preco_total;
                    $dados->cont_servico++;

                endforeach;
                ?>
                </tbody>

            </table>

        </div>
    <?php endif; ?>
    <div class="espaco10"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <?php if(!empty($dados->ordem_servico->descricao_servicos) && !empty($dados->ordem_servico->observacoes_gerais)): ?>
    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">OBSERVAÇÕES</div>
    </div>
    <div class="espaco5"></div>

    <div class="box">

        <?php if(!empty($dados->ordem_servico->descricao_servicos)): ?>
            <div class="col-xs-12">
                <div class="campo-informacao" style="height: auto;">
                    <div class="font-bold size0-8 texto-cor-padrao">Descrição do Serviço</div>
                    <div class="espaco10"></div>

                    <div class="informacao"><?php echo $dados->ordem_servico->descricao_servicos ?></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear"></div>
    </div>
    <div class="espaco10"></div>

    <div class="box">

        <?php if(!empty($dados->ordem_servico->observacoes_gerais)): ?>
            <div class="col-xs-12">
                <div class="campo-informacao" style="height: auto;">
                    <div class="font-bold size0-8 texto-cor-padrao">Observações Gerais</div>
                    <div class="espaco10"></div>

                    <div class="informacao"><?php echo $dados->ordem_servico->observacoes_gerais ?></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear"></div>
    </div>
    <div class="espaco10"></div>
    <?php endif; ?>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">TOTAIS</div>
    </div>
    <div class="espaco10"></div>

    <div class="col-md-12">
        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Frete</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->ordem_servico->frete, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Desconto</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->ordem_servico->desconto, 2, ',', '.') ?> %</div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total em Produtos</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->total_produtos_ordem_servico, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total em Serviços</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->total_servicos_ordem_servico, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total da O.S</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format(($dados->total_produtos_ordem_servico+$dados->total_servicos_ordem_servico+$dados->ordem_servico->frete), 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total da O.S c/ Desc.</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format((\Helpers\OrdensServicoHelper::calculaTotal($dados->ordem_servico->id)), 2, ',', '.') ?></div>
            </div>
        </div>
    </div>
    <div class="espaco10"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <?php if(!empty($dados->ordem_servico->garantia)): ?>
        <div class="campo-informacao" style="height: auto;">
            <div class="font-bold size0-8 texto-cor-padrao">Garantia</div>
            <div class="espaco10"></div>

                <div class="informacao"><?php echo $dados->ordem_servico->garantia ?></div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <?php if(!empty($dados->ordem_servico->responsavel)): ?>
        <div class="campo-informacao" style="height: auto;">
            <div class="font-bold size0-8 texto-cor-padrao">Responsável pela O.S</div>
            <div class="espaco10"></div>

            <div class="informacao"><?php echo $dados->ordem_servico->responsavel ?></div>
        </div>
        <div class="espaco10"></div>
    <?php endif; ?>

    <div class="espaco20"></div>

    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="espaco40"></div>

    <div class="texto-centro">
        <div style="display: inline-block">
            <div class="texto-centro size0-8 flex-centro">
                DATA:
                <div style="display: flex; align-items: flex-end" class="margin-right10">
                    <hr width="30" noshade="">
                    /
                    <hr width="30" noshade="">
                    /
                    <hr width="30" noshade="">
                </div>

                ASSINATURA:
                <div style="display: flex; align-items: flex-end" class="margin-right10">
                    <hr width="150" noshade="">
                    .
                </div>

                VALOR TOTAL DA O.S: <?php echo number_format(\Helpers\OrdensServicoHelper::calculaTotal($dados->ordem_servico->id), 2, ',', '.') ?>
            </div>
        </div>
    </div>


</div>