<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard do Administrador</title>
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Raleway&display=swap" rel="stylesheet" />
</head>
<body>
  <header>
    <h1 class="logo-texto">Facilita</h1>
    <nav>
      <span>Bem-vindo, Admin!</span>
    </nav>
  </header>
  <main>
      <?= $this->section("content") ?>
  </main>
</body>
</html>
<link rel="stylesheet" href="<?= url("assets/css/admin/_theme.css") ?>">
    <?php if ($this->section("specific-css")): ?>
        <?= $this->section("specific-css"); ?>
    <?php endif; ?>