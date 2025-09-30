<?php

 $this->layout("_theme",[]);

?>
<section id="sobre" class="otimizacao">
  <h2>Estamos aqui para otimizar seus pedidos</h2>
  <p>A gente sabe como o dia a dia numa cafeteria pode ser corrido. Por isso criamos a Facilita, 
    para ajudar você a organizar os pedidos e deixar o atendimento mais rápido, sem complicação.</p>
  <p id="abt">Com nossa plataforma, sua cafeteria ganha agilidade, organização e praticidade no atendimento diário.</p>
</section>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/about.css"); ?>">
<?php $this->end(); ?>
