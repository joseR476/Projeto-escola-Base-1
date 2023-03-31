<link rel="stylesheet" href="<?php echo HOME ?>/assets/css/estilo-tela-login-nova.css"/>

<section id="box-login">

    <div id="box-form-login">

        <form action="<?php echo HOME ?>/painel/login" name="formLogin" id="formLogin" method="post">

            <img src="<?php echo HOME ?>/assets/imagens/logo/logo.png" style="max-width: 270px" alt="">
            <div class="espaco40"></div>
            <?php if(isset(\Geral\Utilidades::getUrl()[1]) && \Geral\Utilidades::getUrl()[1] == 'erro'): ?>
                <div class="box-info fundo-erro border-radius10 texto-cor-erro">
                    Ops! Alguma informação está incorreta. <br> Tente novamente.
                </div>
                <div class="espaco20"></div>
            <?php endif; ?>

            <div class="grupo-input">
                <span class="material-icons texto-cor-sucesso">supervisor_account</span>
                <select name="tipo" id="tipo">
                    <option value="admin">Administrativo</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <div class="espaco10"></div>

            <div class="grupo-input">
                <span class="material-icons texto-cor-sucesso">account_circle</span>
                <input type="tel" name="login" id="login" placeholder="Entre com seu login">
            </div>
            <div class="espaco10"></div>

            <div class="grupo-input">
                <span class="material-icons texto-cor-sucesso">lock</span>
                <input type="password" name="senha" id="senha" placeholder="Entre com sua senha">
            </div>
            <div class="espaco20"></div>

            <button type="submit" class="botao-login" name="entrar" id="entrar">
                entrar
            </button>
            <div class="espaco10"></div>

        </form>

    </div>

</section>

<script src="<?php echo HOME ?>/assets/painel/js/login.js"></script>