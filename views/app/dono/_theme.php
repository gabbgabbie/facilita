<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard do Dono</title>
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Raleway&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="<?= url("assets/_shared/css/toast.css") ?>">

</head>
<body>
  <header>
    <h1 class="logo-texto">Facilita</h1>
    <nav>
      <span>Bem-vindo, <span id="user-name"></span></span>
      <span id="logout-btn">     Sair</span>
    </nav>
  </header>
 <main>
      <?= $this->section("content") ?>
</main>
</body>
</html>
<script type="module" src="<?= url('assets/js/app/dono/_theme.js') ?>"></script>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/_theme.css") ?>">
    <?php if ($this->section("specific-css")): ?>
        <?= $this->section("specific-css"); ?>
    <?php endif; ?>
<?php if ($this->section("specific-script")): ?>
        <?= $this->section("specific-script"); ?>
    <?php endif; ?>