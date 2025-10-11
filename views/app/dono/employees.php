  
  <?php

 $this->layout("_theme",[]);

?>
<div class="content-wrapper">
    <aside class="sidebar">
      <div class="profile-section" >
        <img class="profile-photo"></img>   
        <h2 class="profile-name" id="profile-name"></h2>
        <p class="profile-role">Proprietário</p>
        <a href="<?=url("app/dono/")?>" class="sidebar-btn">Dashboard</a>
      </div>

      <div class="sidebar-section">
        <h3>Sistema</h3>
        <a href="<?=url("app/dono/funcionarios")?>" class="sidebar-btn">Funcionários</a>
        <a href="<?=url("app/dono/produtos")?>" class="sidebar-btn">Produtos</a>
        <a href="<?=url("app/dono/pedidos")?>" class="sidebar-btn">Pedidos</a>
        <a href="<?=url("app/dono/tarefas")?>" class="sidebar-btn">Tarefas</a>
        <a class="sidebar-btn" id="sair">Sair</a>
      </div>
    </aside>

    <main class="dashboard-container">
      <div class="section-header">
        <h2 class="titulo-secao">Gerenciamento de Funcionários</h2>
      </div>

      <!-- Formulário de novo funcionário -->
      <div class="employee-form-container">
        <div class="form-header">
          <h3 class="form-title">Adicionar Novo Funcionário</h3>
        </div>
        <form id="employee-form">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label">Nome</label>
              <input type="text" name="name" class="form-input" required>
            </div>
    <input type="hidden" name="role" value="employee">

            <div class="form-group">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-input" required>
            </div>
            <div class="form-group">
              <label class="form-label">Telefone</label>
              <input type="tel" name="phone" class="form-input" required>
            </div>
 
            <div class="form-group full-width">
              <label class="form-label">Senha</label>
              <input type="password" name="password" class="form-input" required>
            </div>
            <div class="input-group">
        <label for="confirm-password" class="form-label">Confirme a senha</label>
        <input type="password" name="confirm-password" class="form-input" id="confirm-password" required />
      </div>
          </div>
          <div class="form-actions">
            <button type="button" class="btn-cancel" id="cancel-form">Limpar</button>
            <button type="submit" class="btn-save">Salvar</button>
          </div>
        </form>
      </div>

      <div class="search-filter">
        <input type="text" class="search-input" placeholder="Buscar funcionário...">
        <button class="search-btn">
          <i class="fas fa-search"></i>
        </button>
      </div>

      <table class="employees-table">
        <thead>
          <tr>
            <th>Funcionário</th>
            <th>Email</th>
            <th>Telefone</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
           
        </tbody>
      </table>
    </main>
  </div>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/add-employees.css"); ?>">
<?php $this->end(); ?>

<?php  $this->start("specific-script"); ?>
<script type="module" src="<?= url('assets/js/app/dono/employees.js') ?>"></script>
<?php $this->end(); ?>
