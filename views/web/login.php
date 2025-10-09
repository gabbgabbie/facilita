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
            <input type="email" name="email" id="email" placeholder=" " required />
            <label for="email">E-mail</label>
          </div>

          <div class="input-group">
            <input type="password" name="password" id="password" placeholder=" " required />
            <label for="password">Senha</label>
          </div>

          <button type="submit">Entrar</button>
        </form>

        <button id="btnPassword">Esqueci minha senha</button>

        <div class="login-form-footer">
          <span>Não tem conta? <a href="#">Cadastre-se</a></span>
        </div>
      </div>
    </div>
  </main>

  <!-- Modal de Recuperação de Senha -->
  <div class="modal-overlay" id="modalPassword">
    <div class="modal-content">
      <div class="modal-header">
        <h2>Recuperar Senha</h2>
        <button class="modal-close" id="closeModal">&times;</button>
      </div>
      <div class="modal-body">
        <div id="modalFormContainer">
          <p>Digite seu e-mail e enviaremos instruções para redefinir sua senha.</p>
          <form id="formRecoverPassword" class="modal-form">
            <div class="input-group">
              <input type="email" name="email" id="recovery-email" placeholder=" " />
              <label for="recovery-email">E-mail</label>
            </div>
            <button id="btnModal" type="submit">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/login.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/web/login.js') ?>"></script>

