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
        <h2 class="titulo-secao">Gerenciamento de Produtos</h2>
      </div>

      <!-- Cards de Estatísticas -->
      <div class="stats-grid">
        <div class="stat-card total">
          <div class="stat-icon"><i class="fas fa-boxes"></i></div>
          <h3 class="stat-number">2</h3>
          <p class="stat-label">Total de Produtos</p>
        </div>
        <div class="stat-card low-stock">
          <div class="stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
          <h3 class="stat-number">1</h3>
          <p class="stat-label">Estoque Baixo</p>
        </div>
        <div class="stat-card out-stock">
          <div class="stat-icon"><i class="fas fa-times-circle"></i></div>
          <h3 class="stat-number">0</h3>
          <p class="stat-label">Sem Estoque</p>
        </div>
      </div>

      <!-- Formulário Fixo -->
      <div class="fixed-form">
        <h3 class="form-title">Adicionar Novo Produto</h3>
        <form id="insumo-form">
          <div class="form-grid">
            <div class="form-group">
              <label class="form-label">Nome do Produto</label>
              <input type="text" class="form-input" required>
            </div>

            <div class="form-group">
              <label class="form-label">Categoria</label>
              <select class="form-select" required>
                <option value="">Selecione...</option>
                <option value="bebidas">Bebida</option>
                <option value="salgado">Salgado</option>
                <option value="doce">Doce</option>
              </select>
            </div>

            <div class="form-group">
              <label class="form-label">Quantidade</label>
              <input type="number" class="form-input" min="0" step="0.01" required>
            </div>

            <div class="form-group">
              <label class="form-label">Estoque Mínimo</label>
              <input type="number" class="form-input" min="0" step="0.01" required>
            </div>
          </div>
          <div class="form-actions">
            <button type="button" class="btn-cancel" id="cancel-btn">Limpar</button>
            <button type="submit" class="btn-save">Salvar</button>
          </div>
        </form>
      </div>

      <div class="search-filter">
        <input type="text" class="search-input" placeholder="Buscar produto...">
        <button class="search-btn">
          <i class="fas fa-search"></i>
        </button>
        <select class="filter-select">
          <option value="all">Todas as categorias</option>
          <option value="doces">Doce</option>
          <option value="salgados">Salgado</option>
          <option value="bebida">Bebida</option>
        </select>
        <select class="filter-select">
          <option value="all">Todos os status</option>
          <option value="high">Estoque Alto</option>
          <option value="low">Estoque Baixo</option>
          <option value="out">Sem Estoque</option>
        </select>
      </div>

      <table class="insumos-table">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="insumo-info">
                <div>Capuccino</div>
              </div>
            </td>
            <td>Bebida</td>
            <td>5</td>
            <td><span class="stock-status status-low">Estoque Baixo</span></td>
            <td class="actions-cell">
              <div class="action-icon edit-icon"><i class="fas fa-edit"></i></div>
              <div class="action-icon delete-icon"><i class="fas fa-trash"></i></div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="insumo-info">
                <div>Brownie</div>
              </div>
            </td>
            <td>Doce</td>
            <td>2</td>
            <td><span class="stock-status status-high">Estoque Alto</span></td>
            <td class="actions-cell">
              <div class="action-icon edit-icon"><i class="fas fa-edit"></i></div>
              <div class="action-icon delete-icon"><i class="fas fa-trash"></i></div>
            </td>
          </tr>
        </tbody>
      </table>
    </main>
  </div>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/add-products.css"); ?>">
<?php $this->end(); ?>

<?php  $this->start("specific-script"); ?>
<script type="module" src="<?= url('assets/js/app/dono/products.js') ?>"></script>
<?php $this->end(); ?>
