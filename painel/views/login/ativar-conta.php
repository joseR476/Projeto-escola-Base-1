<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilo-tela-login-nova.css"/>

<section id="box-login">

    <article class="coluna1">

        <div id="box-form-login">

            <form action="<?php echo HOME ?>/painel/ativar-conta/<?php echo \Geral\Utilidades::getUrl()[1]; ?>" name="formLogin" id="formLogin" method="post">

                <img src="<?php echo HOME ?>/assets/imagens/logos/logo-colorida.png" style="max-width: 270px" alt="">
                <div class="espaco20"></div>

                <?php if(\Geral\Utilidades::getUrl()[2] == 'erro'): ?>
                    <div class="box-info fundo-erro border-radius10 texto-cor-erro">
                        Ops! O código inserido é inválido!
                    </div>
                    <div class="espaco10"></div>
                <?php endif; ?>

                <label for="">
                    <span>Código de Ativação</span>
                </label>
                <div class="grupo-input">
                    <span class="material-icons texto-cor-sucesso">code</span>
                    <input type="codigo_ativacao" name="codigo_ativacao" id="" style="font-size: 1.5em; font-weight: bold;" class="texto-cor-sucesso texto-centro">
                </div>
                <div class="espaco10"></div>

                <button type="submit" class="botao-login" name="ativar" id="ativar">
                    ativar
                </button>
                <div class="espaco10"></div>

                <a href="<?php echo HOME ?>/painel/login" class="botao-login">
                    voltar
                </a>
                <div class="espaco10"></div>

            </form>

        </div>

    </article>

    <!-- DIVISÃO DE COLUNAS -->

    <article class="coluna2">

        <p>
            Sua <span class="font-bold">gestão financeira</span> <br>
            estratégica <span class="font-bold">completa,</span> <br>
            <span class="font-bold">prática</span> e que realmente <br>
            <span class="font-bold">funciona.</span>
        </p>

    </article>

</section>