<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilo-tela-login.css"/>

<div id="box-login-novo">

    <div class="texto-centro">
        <div id="avatar-login">
            <!--<span class="material-icons" style="font-size: 6em; color: #000;">add_business</span>-->
            <img src="<?php echo HOME ?>/assets/imagens/logos/logo-colorida.png" width="250" alt="">
        </div>
    </div>
    <!-- <div class="texto-centro" style="color: #0a8f08; font-size: 1.3em; font-family: 'Raleway'; font-weight: 300;">PAINEL ADMINISTRATIVO</div> -->
    <!-- <div class="espaco20"></div> -->

    <?php if(\Geral\Utilidades::getUrl()[1] == 'erro'): ?>
        <div style="width: 100%; padding: 10px; text-align: center; color: #fff;">
            Ops! E-mail ou senha incorretos.
        </div>
        <div class="espaco20"></div>
    <?php endif; ?>

    <form action="<?php echo HOME ?>/painel/login" name="formLogin" id="formLogin" method="post">

        <div class="grupo-input">
            <label for="">CNPJ</label>
            <div class="icone-esqueda-quadrado input-delineado">
                <span class="material-icons texto-cor-sucesso">account_balance</span>
                <input type="text" name="cnpj" id="cnpj" class="input input-quadrado" placeholder="Informe o CNPJ da Empresa">
            </div>
        </div>
        <div class="espaco20"></div>

        <div class="grupo-input">
            <label for="">LOGIN</label>
            <div class="icone-esqueda-quadrado input-delineado">
                <span class="material-icons texto-cor-sucesso">account_circle</span>
                <input type="login" name="login" id="" class="input input-quadrado" placeholder="Entre com seu login">
            </div>
        </div>
        <div class="espaco20"></div>

        <div class="grupo-input">
            <label for="">SENHA</label>
            <div class="icone-esqueda-quadrado input-delineado">
                <span class="material-icons texto-cor-sucesso">lock</span>
                <input type="password" name="senha" id="senha" class="input input-quadrado" placeholder="Entre com sua senha">
            </div>
        </div>
        <div class="espaco20"></div>

        <button type="submit" class="botao botao-sucesso botao-arredondado botao-delineado-sucesso" name="entrar" id="entrar">
            <div class="padding5">
                ENTRAR
            </div>
        </button>
        <div class="espaco10"></div>

        <div class="texto-centro">
            <a href="#" class="texto-centro texto-cor-sucesso">Esqueci minha senha</a>
        </div>

    </form>

</div>

<script>
    $(function () {
        $('#cnpj').mask('99.999.999/9999-99');
    })
</script>