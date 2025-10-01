<?php $this->layout("_theme",[]);?>
 <div class="main-container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="icon-container">
                    <i class="fas fa-lock"></i>
                </div>
                <h2 class="profile-title">Alterar Senha</h2>
                <p class="profile-subtitle">Atualize sua senha de acesso</p>
            </div>

            <div id="alertContainer"></div>

            <form class="profile-form" id="passwordForm">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Senha Atual
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="current_password" class="form-input" id="currentPassword" required>
                        <button type="button" class="toggle-password" data-target="currentPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Nova Senha
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="new_password" class="form-input" id="newPassword" required>
                        <button type="button" class="toggle-password" data-target="newPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-check-circle"></i> Confirmar Nova Senha
                    </label>
                    <div class="password-input-wrapper">
                        <input type="password" name="confirm_password" class="form-input" id="confirmPassword" required>
                        <button type="button" class="toggle-password" data-target="confirmPassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="password-requirements">
                    <h3>
                        <i class="fas fa-info-circle"></i>
                        Requisitos da Senha
                    </h3>
                    <ul class="requirement-list">
                        <li class="requirement-item" id="req-length">
                            <i class="fas fa-circle"></i>
                            Mínimo de 8 caracteres
                        </li>
                        <li class="requirement-item" id="req-uppercase">
                            <i class="fas fa-circle"></i>
                            Pelo menos uma letra maiúscula
                        </li>
                        <li class="requirement-item" id="req-lowercase">
                            <i class="fas fa-circle"></i>
                            Pelo menos uma letra minúscula
                        </li>
                        <li class="requirement-item" id="req-number">
                            <i class="fas fa-circle"></i>
                            Pelo menos um número
                        </li>
                        <li class="requirement-item" id="req-match">
                            <i class="fas fa-circle"></i>
                            As senhas devem coincidir
                        </li>
                    </ul>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn btn-cancel" onclick="window.history.back()">
                        <i class="fas fa-times"></i>
                        Cancelar
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