
<?php

 $this->layout("_theme",[]);

?>

<div class="container-cadastro">
    <h2>Registre sua cafeteria</h2>
    <form id="form-cadastro" method="POST">
  
    <div class="input-group">
        <label for="cafe">Nome do estabelecimento</label>
        <input type="text" name="name" id="cafe" required />
      </div>
    
      <div class="input-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" maxlength="18" required />
      </div>
    
      <div class="input-group">
        <label for="address">Endereço</label>
        <input type="text" name="address" id="address" required />
      </div>
    
      <button>Cadastrar</button>
    </form>
  </div>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/register.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/app/dono/register.js') ?>"></script>
