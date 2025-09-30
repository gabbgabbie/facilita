<?php

 $this->layout("_theme",[]);

?>

<div class="container-cadastro">
    <h2>Cadastre-se</h2>
    <form id="form-cadastro" action="#" method="POST">
  
    
      <div class="input-group">
        <label for="name">Seu nome completo</label>
        <input type="text" name="name" id="name"  />
      </div>
    
      <div class="input-group">
        <label for="phone">Seu telefone</label>
        <input type="phone" name="phone" id="phone"  />
      </div>

      <div class="input-group">
        <label for="email">Seu e-mail</label>
        <input type="email" name="email" id="email"  />
      </div>
    <input type="hidden" name="role" value="owner">

      <div class="input-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password"  />
      </div>
    
      <div class="input-group">
        <label for="confirm-password">Confirme sua senha</label>
        <input type="password" name="confirm-password" id="confirm-password"  />
      </div>
    
      <button><a id="btn-register">Cadastrar</a></button>
    </form>
    
    
    <p class="link-login">
      Já tem uma conta? <a href="<?=url("login")?>">Entrar</a>
    </p>
  </div>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/register.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/web/register.js') ?>"></script>
