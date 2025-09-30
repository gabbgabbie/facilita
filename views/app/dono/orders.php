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
      <h2 class="titulo-secao">Gerenciamento de Pedidos</h2>

      <!-- Cards de Estatísticas -->
      <div class="stats-grid">
        <div class="stat-card total">
          <div class="stat-icon"><i class="fas fa-boxes"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Total de Pedidos</p>
        </div>
        <div class="stat-card low-stock">
          <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
          <h3 class="stat-number">0</h3>
          <p class="stat-label">Concluidos</p>
        </div>
        <div class="stat-card out-stock">
          <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Pendentes</p>
        </div>
      </div>

      <!-- Formulário Fixo -->
      <div class="form-container">
        <h3 class="form-title">Adicionar Novo Pedido</h3>
        <form id="order-form">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label">Nome</label>
              <input type="text" class="form-input" required>
            </div>

            <div class="form-group">
              <label class="form-label">Mesa</label>
              <input type="number" class="form-input" min="1" step="1" required>
            </div>
          </div>
          <div class="form-actions">
            <button type="button" class="btn-clear" id="clear-form">Limpar</button>
            <button type="submit" class="btn-save">Salvar</button>
          </div>
        </form>
      </div>

      <!-- Tabela de Pedidos -->
      <table class="tasks-table">
        <thead>
          <tr>
            <th>Prato</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="task-info">
                <div>Cappucino</div>
              </div>
            </td>
            <td>Kamily</td>
            <td><span class="stock-status status-low">Pendente</span></td>
            <td class="actions-cell">
              <div class="action-icon view-icon" title="Visualizar"><i class="fas fa-eye"></i></div>
              <div class="action-icon edit-icon" title="Editar"><i class="fas fa-edit"></i></div>
              <div class="action-icon delete-icon" title="Excluir"><i class="fas fa-trash"></i></div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="task-info">
                <div>Brownie</div>
              </div>
            </td>
            <td>Ana Luisa</td>
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
<link rel="stylesheet" href="<?= url("assets/css/app/dono/add-orders.css"); ?>">
<?php $this->end(); ?>

<?php  $this->start("specific-script"); ?>
<script type="module" src="<?= url('assets/js/app/dono/orders.js') ?>"></script>
<?php $this->end(); ?>
