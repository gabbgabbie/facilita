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
                        <i class="fas fa-key"></i> Senha Atual
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="oldPassword" class="form-input" id="oldPassword" required>
                        <button type="button" class="toggle-password" data-target="oldPassword">
                            
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Nova Senha
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="newPassword" class="form-input" id="newPassword" required>
                        <button type="button" class="toggle-password" data-target="newPassword">
                            
                        </button>
                    </div>
                        <p><a href="">Esqueci minha senha</a></p>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-cancel" onclick="window.history.back()">
                        <i class="fas fa-times"></i>
                        Voltar
                    </button>
                    <button type="submit" class="btn btn-save" id="submitBtn">
                        <i class="fas fa-save"></i>
                        Alterar Senha
                    </button>
                </div>
            </form>
        </div>
    </div>
 <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/password.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/app/dono/changepassword.js') ?>"></script>