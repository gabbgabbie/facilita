<?php $this->layout("_theme",[]);?>
<div class="content-wrapper">
    <aside class="sidebar">
      <div class="profile-section">
        <div class="profile-photo">LU</div>
        <h2 class="profile-name">Luisa Borba</h2>
        <p class="profile-role">Funcionario (a)</p>
      </div>

      <div class="sidebar-section">
        <a href="<?=url("")?>" class="sidebar-btn">Sair</a>
      </div>
    </aside>

    <main class="dashboard-container">
    <div class="section-header">
      <h2 class="titulo-secao">Painel do Funcionário</h2>
    </div>

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
      <!-- Seção de Receitas -->
      <div class="section-card">
        <h3 class="section-title">
          <i class="fas fa-book"></i>
          Pedidos
        </h3>
        <div class="recipes-list">
          
          <div class="recipe-item" >
            <div class="recipe-header">
              <div class="recipe-icon"><i class="fas fa-mug-hot"></i></div>
              <div class="recipe-name">Cappuccino</div>
            </div>
          </div>
          
          <div class="recipe-item" >
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
            <input type="checkbox" class="task-checkbox" >
            <div class="task-content">
              <div class="task-title">Ligar a geladeira</div>
              <div class="task-details">
              </div>
            </div>
          </div>

        </div>

        
      </div>
    </div>
    </main>
  </div>
  </div>
  
  <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/funcionario/home.css"); ?>">
<?php $this->end(); ?>