<?php

 $this->layout("_theme",[]);

?>
<section id="planos" class="planos">
  <h2>Escolha um ponto de partida</h2>
  <p class="subtitulo">Conheça as assinaturas e pacotes</p>

  <div class="cards">
    <article class="card">
      <h3>Plano Mensal</h3>
      <h4>R$19,90</h4>
      <p>Ideal para quem quer testar ou está iniciando sua cafeteria.</p>
      <button>Selecionar</button>
    </article>

    <article class="card">
      <h3>Plano Anual</h3>
      <h4>R$199,90</h4>
      <p>Assine por 12 meses e economize no total. Perfeito para cafeterias consolidadas 
        que buscam uma solução completa e com melhor custo-benefício.</p>
      <button>Selecionar</button>
    </article>
  </div>
</section>

    <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/plans.css"); ?>">
<?php $this->end(); ?>