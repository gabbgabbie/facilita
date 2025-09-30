<?php

 $this->layout("_theme",[]);

?>
<section id="faq" class="faq">
  <h2>Perguntas Frequentes</h2>
  <p class="subtitulo">Dúvidas comuns sobre gestão de cafeterias</p>
  
  <div class="faq-container">
    <div class="faq-item">
      <h3 class="faq-question">
        Como reduzir o tempo de espera dos clientes na minha cafeteria?
      </h3>
      <div class="faq-answer">
        <p>Organize seu cardápio por tempo de preparo, tenha ingredientes pré-preparados, otimize o fluxo da cozinha e considere um sistema de pedidos antecipados. A padronização dos processos também ajuda muito a acelerar o atendimento.</p>
      </div>
    </div>

    <div class="faq-item">
      <h3 class="faq-question">
        Qual o melhor horário para uma cafeteria funcionar?
      </h3>
      <div class="faq-answer">
        <p>A maioria das cafeterias tem picos pela manhã (7h-10h) e tarde (14h-17h). Considere seu público-alvo: escritórios pedem funcionamento desde cedo, universidades podem ter movimento até mais tarde. Analise seu bairro e teste diferentes horários.</p>
      </div>
    </div>

    <div class="faq-item">
      <h3 class="faq-question">
        Como controlar o estoque de ingredientes perecíveis?
      </h3>
      <div class="faq-answer">
        <p>Use o método PEPS (Primeiro que Entra, Primeiro que Sai), monitore datas de validade diariamente, faça pedidos baseados no histórico de vendas e mantenha relacionamento próximo com fornecedores para entregas mais frequentes em menores quantidades.</p>
      </div>
    </div>
  </div>
</section>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/faqs.css"); ?>">
<?php $this->end(); ?>
