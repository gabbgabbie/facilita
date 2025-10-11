  <?php

 $this->layout("_theme",[]);

?>
  <div class="content-wrapper">
    <aside class="sidebar">
      <!-- Seção de Perfil -->
      <div class="profile-section">
        <img src="" alt="Foto do usuário" class="profile-photo" id="userPhoto">
        <h3 class="profile-name" id="userName"></h3>
        <p class="profile-role" id="userRole">Funcionario (a)</p>
      </div>

      <div class="cafe-section">
        <h3 class="profile-name" id="cafeName"></h3>
        <br>
        <p class="cafe" id="cafeAddress"></p>
        <p class="cafe" id="cafeCNPJ"></p>

      </div>

      <div class="sidebar-section">
        <button class="sidebar-btn" id="editperfil">Editar perfil</button>
      </div>
      <div class="sidebar-section">
        <button class="sidebar-btn" id="sair">Sair</button>
      </div>
    </aside>

    <main class="dashboard-container">
 
      <!-- Cards de Estatísticas -->
      <div class="stats-grid">
        <div class="stat-card recipes">
          <div class="stat-icon"><i class="fas fa-book"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Pedidos</p>
        </div>
        <div class="stat-card pending">
          <div class="stat-icon"><i class="fas fa-clock"></i></div>
          <h3 class="stat-number">1</h3>
          <p class="stat-label">Tarefas Pendentes</p>
        </div>
        <div class="stat-card completed">
          <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
          <h3 class="stat-number">0</h3>
          <p class="stat-label">Tarefas Concluídas</p>
        </div>
      </div>

      <div class="main-sections">
        <!-- Seção de Pedidos -->
        <div class="section-card">
          <h3 class="section-title">
            <i class="fas fa-book"></i>
            Pedidos
          </h3>
          <div class="recipes-list">
            <div class="recipe-item">
              <div class="recipe-header">
                <div class="recipe-icon"><i class="fas fa-mug-hot"></i></div>
                <div class="recipe-name">Cappuccino</div>
              </div>
            </div>
            <div class="recipe-item">
              <div class="recipe-header">
                <div class="recipe-icon"><i class="fas fa-coffee"></i></div>
                <div class="recipe-name">Brownie</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Seção de Tarefas -->
        <div class="section-card">
          <h3 class="section-title">
            <i class="fas fa-tasks"></i>
            Minhas Tarefas
          </h3>
          <div class="tasks-list">
            <div class="task-item">
              <input type="checkbox" class="task-checkbox">
              <div class="task-content">
                <div class="task-title">Ligar a geladeira</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/funcionario/home.css"); ?>">
<?php $this->end(); ?>


<script type="module" src="<?= url('assets/js/app/funcionario/home.js') ?>"></script>
