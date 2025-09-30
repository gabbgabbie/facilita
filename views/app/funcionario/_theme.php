
  <!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Facilita - Funcionário</title>
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Raleway&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <header>
    <h1 class="logo-texto">Facilita</h1>
    <nav>
      <span>Bem-vindo, Funcionário!</span>
      <a href="<?=url("")?>" class="logout-btn">Sair</a>
    </nav>
  </header>
  <main>
      <?= $this->section("content") ?>
</main>
<link rel="stylesheet" href="<?= url("assets/css/app/funcionario/_theme.css") ?>">
    <?php if ($this->section("specific-css")): ?>
        <?= $this->section("specific-css"); ?>
    <?php endif; ?>