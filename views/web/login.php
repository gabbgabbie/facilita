<?php

 $this->layout("_theme",[]);

?>

<main class="login-wrapper">
  <div class="login-card">
    <div class="login-image-side">
      <h2>Bem-vindo de volta!</h2>
      <p>Conecte-se para gerenciar sua cafeteria com facilidade.</p>
    </div>

    <div class="login-form-side">
      <h1>Login</h1>
      <p>Entre com seu e-mail e senha para acessar sua conta.</p>

      <form id="formLogin" action="#" method="POST">
        <div class="input-group">
          <input type="email" name="email" id="email" placeholder=" "  />
          <label for="email">E-mail</label>
        </div>

        <div class="input-group">
          <input type="password" name="password" id="password" placeholder=" "  />
          <label for="password">Senha</label>
        </div>

        <button type="submit">Entrar</button>
      </form>

      <div class="login-form-footer">
        <span>Não tem conta? <a href="<?=url("cadastro")?>">Cadastre-se</a></span>
      </div>
    </div>
  </div>
</main>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/login.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/web/login.js') ?>"></script>

