<?php

 $this->layout("_theme",[]);

?>


<main class="main-content">
  <section id="inicio" class="introducao texto">
    <h2>Facilitando o dia a dia na sua <span>cafeteria</span></h2>
  </section>
  <section class="imagem">
    <img src="<?= url("assets/imgs/cafe.png") ?>" alt="Café em xícara" />
  </section>
</main>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/home.css"); ?>">
<?php $this->end(); ?>