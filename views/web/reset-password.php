<?php $this->layout("_theme",[]);?>
 <div class="main-container">
        <div class="profile-card">
            <div class="profile-header">
               
                <h2 class="profile-title">Alterar Senha</h2>
                <p class="profile-subtitle">Atualize a senha do seu perfil Facilita</p>
            </div>

            <div id="alertContainer"></div>

            <form class="profile-form" id="passwordForm">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Digite sua nova senha
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="password" class="form-input" id="password" required>
                        <button type="button" class="toggle-password" data-target="oldPassword">
                            
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Confirme sua senha
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="confirm-password" class="form-input" id="confirm-password" required>
                        <button type="button" class="toggle-password" data-target="newPassword">
                            
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save" id="resetBtn">
                        <i class="fas fa-save"></i>
                        Salvar Senha
                    </button>
                </div>
            </form>
        </div>
    </div>
 <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/password.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/web/reset-password.js') ?>"></script>