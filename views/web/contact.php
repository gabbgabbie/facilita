<?php

 $this->layout("_theme",[]);

?>
<section id="contato" class="contato">
  <h2>Fale com a gente</h2>
  <p class="subtitulo">Estamos sempre prontos para ajudar sua cafeteria</p>

  <div class="card-contato">
    <h3>Onde nos encontrar</h3>
    <p><strong>Endereço:</strong> Rua dos Baristas, 123 – São Paulo, SP</p>
    <p><strong>WhatsApp:</strong> (11) 91234-5678</p>
    <p><strong>Instagram:</strong> <a href="https://instagram.com/facilitacafes" target="_blank">@facilitacafes</a></p>
  </div>
</section>
    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/contact.css"); ?>">
<?php $this->end(); ?>