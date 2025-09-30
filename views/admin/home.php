<?php $this->layout("_theme",[]);?>
 <div class="content-wrapper">
    <aside class="sidebar">
      <div class="profile-section">
        <div class="profile-photo">AD</div>
        <h2 class="profile-name">Admin Sistema</h2>
        <p class="profile-role">Administrador</p>
      </div>

      <div class="sidebar-section">
        <h3>Dados Pessoais</h3>
        <p><strong>Email:</strong> admin@facilita.com.br</p>
      </div>

      <div class="sidebar-section">
        <a href="<?=url("profile")?>" class="sidebar-btn">Editar perfil</a>
        <a href="<?=url("")?>" class="sidebar-btn">Sair</a>
      </div>
    </aside>

    <main class="dashboard-container">
      <h2 class="titulo-secao">Painel Administrativo - Sistema Facilita</h2>

      <!-- Estatísticas rápidas -->
      <div class="stats-grid">
        <div class="stat-card">
          <h3 class="stat-number">1</h3>
          <p class="stat-label">Cafeterias Ativas</p>
        </div>
        <div class="stat-card">
          <h3 class="stat-number">4</h3>
          <p class="stat-label">Usuários Totais</p>
        </div>
      </div>

      <!-- Menu de gerenciamento -->
      <div class="grid-cards">
        <a href="#" class="card">
          <h3>Gerenciar Cafeterias</h3>
          <p>Visualize cafeterias cadastradas.</p>
        </a>

        <a href="#" class="card">
          <h3>Usuários do Sistema</h3>
          <p>Gerencie contas de proprietários e funcionários.</p>
        </a>

        <a href="#" class="card">
          <h3>Assinaturas & Pagamentos</h3>
          <p>Controle planos, cobranças e status de pagamento.</p>
        </a>

      </div>
    </main>
  </div>
  <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/admin/home.css"); ?>">
<?php $this->end(); ?>