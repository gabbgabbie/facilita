  <?php

 $this->layout("_theme",[]);

?>
  <div class="content-wrapper">
  <aside class="sidebar">
     <div class="profile-section" >
        <div class="profile-photo">𐙚</div>
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
        <a href="/facilita/" class="sidebar-btn">Sair</a>
      </div>
    </aside>

    <main class="dashboard-container">
      <div class="section-header">
        <h2 class="titulo-secao">Gerenciamento de Tarefas</h2>
      </div>

      <!-- Cards de Estatísticas -->
      <div class="stats-grid">
        <div class="stat-card total">
          <div class="stat-icon"><i class="fas fa-boxes"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Total de Tarefas</p>
        </div>
        <div class="stat-card low-stock">
          <i class="fas fa-check-circle"></i>
          <h3 class="stat-number">0</h3>
          <p class="stat-label">Concluidas</p>
        </div>
        <div class="stat-card out-stock">
          <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Pendentes</p>
        </div>
      </div>

      <!-- Formulário fixo para nova tarefa -->
      <div class="task-form-container">
        <div class="form-header">
          <h3 class="form-title">Adicionar Nova Tarefa</h3>
        </div>
        <form id="task-form">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label">Nome da Tarefa</label>
              <input type="text" class="form-input" required>
            </div>

            <div class="form-group">
              <label class="form-label">Descrição</label>
              <input type="text" class="form-input" required>
            </div>
          </div>
          <div class="form-actions">
            <button type="button" class="btn-cancel">Limpar</button>
            <button type="submit" class="btn-save">Salvar</button>
          </div>
        </form>
      </div>

      <div class="search-filter">
        <input type="text" class="search-input" placeholder="Buscar task...">
        <button class="search-btn">
          <i class="fas fa-search"></i>
        </button>
      </div>

      <table class="tasks-table">
        <thead>
          <tr>
            <th>Tarefa</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="task-info">
                <div>Ligar a geladeira</div>
              </div>
            </td>
            <td><span class="stock-status status-low">Pendente</span></td>
            <td class="actions-cell">
              <div class="action-icon view-icon" title="Visualizar"><i class="fas fa-eye"></i></div>
              <div class="action-icon edit-icon" title="Editar"><i class="fas fa-edit"></i></div>
              <div class="action-icon delete-icon" title="Excluir"><i class="fas fa-trash"></i></div>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/add-tasks.css"); ?>">
<?php $this->end(); ?>

<?php  $this->start("specific-script"); ?>
<script type="module" src="<?= url('assets/js/app/dono/tasks.js') ?>"></script>
<?php $this->end(); ?>
