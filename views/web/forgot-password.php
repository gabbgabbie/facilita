<?php
$this->layout("_theme",[]);
?>

    <div class="container">
        <div class="card">
            <h1 class="card-title">Por favor, digite o código que<br>enviamos agora para:</h1>
            
            <div class="email-display"></div>

            <form id="verificationForm">
                <div class="code-input-wrapper">
                    <div class="code-display" id="codeDisplay">
                        <div class="code-digit empty active">0</div>
                        <div class="code-digit empty">0</div>
                        <div class="code-digit empty">0</div>
                        <div class="code-digit empty">0</div>
                        <div class="code-digit empty">0</div>
                        <div class="code-digit empty">0</div>
                    </div>
                    <input 
                        type="text" 
                        id="hiddenInput" 
                        class="hidden-input" 
                        maxlength="6" 
                        inputmode="numeric"
                        autocomplete="off"
                        name="code"
                    >
                </div>

                <div class="resend-section">
                    <div class="resend-text">Não encontrou?</div>
                    <a href="#" class="resend-link" id="resendLink">Reenviar código</a>
                </div>

                <button type="submit" class="verify-btn" id="verifyBtn" disabled>Verificar</button>
            </form>
        </div>
    </div>
<?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/web/verification-code.css"); ?>">
<?php $this->end(); ?>

<script type="module" src="<?= url('assets/js/web/forgot-password.js') ?>"></script>


