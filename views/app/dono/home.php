  
  <?php

 $this->layout("_theme",[]);

?>
  <div class="content-wrapper">
<aside class="sidebar">
      <div class="profile-section">
        <img class="foto-perfil" src="" alt="Foto de perfil">
        <input type="file" id="photoInput" accept="image/*" style="display: none;">
      </div>

      <div class="sidebar-section user-section">
      <h3 id="username"><i class="fas fa-user" ></i> Meu Perfil</h3>
      <div class="user-info" id="user-info">
      <div class="user-name-display" id="user-name"></div>
      </div>
    </div>

      <div class="sidebar-section">
        <h3>Dados da Cafeteria</h3>
        <p><strong>Nome:</strong> Tal Cafeteria</p>
        <p><strong>CNPJ:</strong> 12.345.678/0001-90</p>
        <p><strong>Endereço:</strong> Rua do Café, 123</p>
        <a href="<?=url("app/dono/perfil")?>" class="sidebar-btn">Editar Perfil</a>
        <a href="/facilita/" class="sidebar-btn">Sair</a>
      </div>
    </aside>

    <main class="dashboard-container">
      <h2 class="titulo-secao">Painel de Gerenciamento - Tal Cafeteria</h2>

      <div class="grid-cards">
        <a href="<?=url("app/dono/funcionarios")?>" class="card">
          <h3>Funcionários</h3>
          <p>Adicione ou remova membros da equipe.</p>
        </a>

        <a href="<?=url("app/dono/produtos")?>" class="card">
          <h3>Produtos</h3>
          <p>Gerencie os ingredientes da cafeteria.</p>
        </a>
        
        <a href="<?=url("app/dono/pedidos")?>" class="card">
          <h3>Pedidos</h3>
          <p>Prepare os pedidos com organização.</p>
        </a>

        <a href="<?=url("app/dono/tarefas")?>" class="card">
          <h3>Tarefas</h3>
          <p>Organize o dia da equipe com tarefas.</p>
        </a>
      </div>
    </main>
</div>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/home.css"); ?>">
<?php $this->end(); ?>

<?php  $this->start("specific-script"); ?>
<script type="module" src="<?= url('assets/js/app/dono/home.js') ?>"></script>
<?php $this->end(); ?>