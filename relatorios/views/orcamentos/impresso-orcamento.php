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

        <div id="logo-empresa" <? echo !empty($dados->empresa->logo) ? 'style="background: url('.HOME.'/assets/imagens/empresas/'.$dados->empresa->id.'/logo/'.$dados->empresa->logo.') 50% 50% no-repeat; background-size: contain;"' : ''; ?> >

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
            <?php echo !empty($dados->orcamento->data_emissao) ? 'Emissão: '.$dados->orcamento->data_emissao->format('d/m/Y') : '' ?>
            <br>
            <?php echo !empty($dados->orcamento->validade) ? 'Validade: '.$dados->orcamento->validade .' dias' : '' ?>
            <br>
            <?php echo !empty($dados->orcamento->numero) ? 'Cod.: '.str_pad($dados->orcamento->numero, 7, '0', STR_PAD_LEFT) : '' ?>
        </div>

    </header>

    <div class="box">
        <div class="espaco10"></div>
        <!--<div class="texto-centro" id="titulo-orcamento">ORÇAMENTO # - <?php echo $dados->situacao_orcamento ?></div>-->
        <div class="texto-centro" id="titulo-orcamento">ORÇAMENTO # - <?php echo str_pad($dados->orcamento->numero, 7, '0', STR_PAD_LEFT) ?></div>
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
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">ITENS DO ORÇAMENTO</div>
    </div>
    <div class="espaco10"></div>

    <?php if(!empty($dados->itens_orcamento)): ?>
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
            foreach ($dados->itens_orcamento as $item):
                echo '
                <tr>
                    <td class="texto-centro">'.$dados->cont_item.'</td>
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
                    <td class="texto-direita">'.number_format(round(($item->preco_unidade-($item->preco_unidade*$item->desconto)/100), 1, PHP_ROUND_HALF_UP), 2, ',',  '.').'</td>
                    <td class="texto-direita">'.number_format($item->preco_total, 2,  ',', '.').'</td>
                </tr>
            ';

                $dados->quantidade_itens += $item->quantidade;
                $dados->total_orcamento += $item->preco_total;
                $dados->total_orcamento_sem_desconto += ($item->preco_unidade*$item->quantidade);
                $dados->cont_item++;

            endforeach;
            ?>
            </tbody>

        </table>

    </div>
    <?php endif; ?>

    <?php if(!empty($dados->orcamento->outros_itens)): ?>
        <div class="espaco10"></div>
        <div class="col-xs-12">
            <div class="campo-informacao">
                <div class="titulo">Outros Itens ou Serviços</div>
                <div class="informacao size0-8"><?php echo $dados->orcamento->outros_itens ?></div>
            </div>
        </div>
    <?php endif; ?>

    <div class="espaco10"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">TOTAIS</div>
    </div>
    <div class="espaco10"></div>

    <div>
        <div class="col-xs-1">
            <div class="campo-informacao">
                <div class="titulo">Nº de Itens</div>
                <div class="informacao texto-direita size0-8"><?php echo \Helpers\OrcamentosHelper::numeroItens($dados->orcamento->id) ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Soma das Qtdes</div>
                <div class="informacao texto-direita size0-8"><?php echo \Helpers\OrcamentosHelper::qtdeItens($dados->orcamento->id); ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total Outro Itens</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->orcamento->total_outros_itens, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total dos Itens</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format(\Helpers\OrcamentosHelper::totalItens($dados->orcamento->id), 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-1">
            <div class="campo-informacao">
                <div class="titulo">Desconto</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->orcamento->desconto_orcamento, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-1">
            <div class="campo-informacao">
                <div class="titulo">Outras Desp.</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->orcamento->outras_despesas, 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-1">
            <div class="campo-informacao">
                <div class="titulo">Frete</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->orcamento->frete, 2, ',', '.') ?></div>
            </div>
        </div>

        <?php
        $dados->total_geral_orcamento = $dados->total_orcamento+$dados->orcamento->total_outros_itens+$dados->orcamento->outras_despesas;
        $dados->total_geral_orcamento_sem_desconto = $dados->total_orcamento_sem_desconto+$dados->orcamento->total_outros_itens+$dados->orcamento->outras_despesas;
        ?>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total do Orçamento</div>
                <?php $dados->total_geral_orcamento_com_desconto = (($dados->total_geral_orcamento-($dados->total_geral_orcamento*$dados->orcamento->desconto_orcamento)/100)+$dados->orcamento->frete) ?>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->total_geral_orcamento_com_desconto, 2, ',', '.') ?></div>
            </div>
        </div>

        <!--
        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Tot. un. s/desc.</div>
                <?php
                    $dados->total_geral_orcamento = $dados->total_orcamento+$dados->orcamento->total_outros_itens+$dados->orcamento->outras_despesas;
                    $dados->total_geral_orcamento_sem_desconto = $dados->total_orcamento_sem_desconto+$dados->orcamento->total_outros_itens+$dados->orcamento->outras_despesas;
                ?>
                <div class="informacao texto-direita size0-8"><?php echo number_format(($dados->total_geral_orcamento_sem_desconto+$dados->orcamento->frete), 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Total desc.</div>
                <div class="informacao texto-direita size0-8"><?php echo number_format((($dados->total_geral_orcamento*$dados->orcamento->desconto_orcamento)/100), 2, ',', '.') ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Tot. un. c/desc.</div>
                <?php $dados->total_geral_orcamento_com_desconto = (($dados->total_geral_orcamento-($dados->total_geral_orcamento*$dados->orcamento->desconto_orcamento)/100)+$dados->orcamento->frete) ?>
                <div class="informacao texto-direita size0-8"><?php echo number_format($dados->total_geral_orcamento_com_desconto, 2, ',', '.') ?></div>
            </div>
        </div>
        -->
    </div>

    <div class="espaco20"></div>
    <div class="box"></div>

    <div class="espaco10"></div>
    <div class="col-md-12 texto-direita">
        <div><span class="font-bold texto-cor-sucesso size1">TOTAL: </span> <span class="size1 font-bold"><?php echo number_format($dados->total_geral_orcamento_com_desconto, 2, ',', '.') ?></span></div>
    </div>
    <div class="espaco10"></div>

    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">CONDIÇÕES GERAIS</div>
    </div>
    <div class="espaco5"></div>

    <div class="box">
        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Validade do Orçamento</div>
                <div class="informacao texto-direita size0-8"><?php echo !empty($dados->orcamento->validade) ? $dados->orcamento->validade. ' dias' : ''; ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Prazo de Entrega</div>
                <div class="informacao texto-direita size0-8"><?php echo $dados->orcamento->prazo_entrega ?></div>
            </div>
        </div>

        <div class="col-xs-2">
            <div class="campo-informacao">
                <div class="titulo">Garantia</div>
                <div class="informacao texto-direita size0-8"><?php echo !empty($dados->orcamento->garantia) ? $dados->orcamento->garantia.' dias' : '' ?></div>
            </div>
        </div>
        <div class="espaco5"></div>

        <?php if(!empty($dados->orcamento->observacoes_orcamento)): ?>
            <div class="col-xs-12">
                <div class="campo-informacao" style="height: auto;">
                    <div class="titulo">Observações</div>
                    <div class="informacao"><?php echo $dados->orcamento->observacoes_orcamento ?></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="clear"></div>
    </div>

    <div class="espaco10"></div>

    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div class="box col-md-12">
        <div class="linha-abaixo-titulo" id="titulo-dados-cliente">PAGAMENTO</div>
    </div>
    <div class="espaco5"></div>

    <div>
        <?php if(!empty($dados->parcelas_orcamento)): ?>
            <table class="tabela-orcamento">
                <thead>
                <tr>
                    <th class="texto-centro">Dias</th>
                    <th class="texto-centro">Data</th>
                    <th class="texto-direita">Valor</th>
                    <th>Forma Pagamento</th>
                    <th>Observações</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($dados->parcelas_orcamento as $parcela):

                    $forma_pagamento = FormasPagamentoModel::find_by_id($parcela->id_forma_pagamento);

                    echo '
                    <tr>
                        <td class="texto-centro">'.$parcela->dias.'</td>
                        <td class="texto-centro">'.$parcela->data->format('d/m/Y').'</td>
                        <td class="texto-direita">R$ '.number_format($parcela->valor, 2, ',', '.').'</td>
                        <td>'.$forma_pagamento->nome.'</td>
                        <td>'.$parcela->observacoes.'</td>
                    </tr>
                ';
                endforeach;
                ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>

    <div class="espaco20"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

    <div>
        <div class="size0-8"><?php echo $dados->orcamento->saudacao ?></div>
        <div class="size0-8"><?php echo $dados->orcamento->departamento ?></div>
    </div>

    <div class="espaco20"></div>
    <!-- -------------------------------------------------------------------------------------- -->
    <!-- DIVISÃO DE TIPOS DE DADOS -->

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

                QTDE ITENS: <?php echo $dados->quantidade_itens ?> VALOR TOTAL PEDIDO: <?php echo number_format($dados->total_geral_orcamento_com_desconto, 2, ',', '.') ?>
            </div>
        </div>
    </div>

</div>

<script>
    setInterval(()=>{
        window.print();
        //close();
    }, 500);
</script>