<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? "Facilita" ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&family=Raleway&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= url("assets/_shared/css/toast.css") ?>">
<script src="<?= url("assets/_shared/js/toast.js") ?>" ></script>

</head>
<body>
  <header>
    <div class="header-container">
      <h1 class="titulo">Facilita</h1>
      <nav class="nav-area">
        <div class="nav-links">
          <a href="<?=url("sobre")?>">Sobre</a>
          <a href="<?=url("planos")?>">Planos</a>
          <a href="<?=url("faqs")?>">FAQs</a>
          <a href="<?=url("contato")?>">Contato</a>
        </div>
        <a href="<?=url("cadastro")?>" class="botao-criar-conta">Criar Conta</a>
          <a href="<?=url("login")?>" class="botao-criar-conta">Entrar</a>
      </nav>
    </div>
  </header>
  <main>
  
  <?= $this->section("content") ?>
</main>
<section id="contato" class="contato">
  <h2>Fale conosco</h2>
  <p>+55 51 999483019   |   @facilitaseucafe</p>
</section>
</body>
</html>

<link rel="stylesheet" href="<?= url("assets/css/web/_theme.css") ?>">
    <?php if ($this->section("specific-css")): ?>
        <?= $this->section("specific-css"); ?>
    <?php endif; ?>
    <?php if ($this->section("specific-script")): ?>
        <?= $this->section("specific-script"); ?>
    <?php endif; ?>