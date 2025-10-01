<?php $this->layout("_theme",[]);?>
<div class="main-container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-photo-container">
                    <div class="profile-photo-large" id="profilePhoto">
                        <input type="file" class="photo-input" id="photoInput" accept="image/*">
                        <div class="profile-photo-placeholder">
                                    <img class="foto-perfil" src="" alt="Foto de perfil">

                            
                        </div>
                        <div class="photo-upload-overlay">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
                <h2 class="profile-title">Editar Perfil</h2>
                <p class="profile-subtitle">Atualize suas informações pessoais</p>
            </div>

            <form class="profile-form">
                <!-- Dados Pessoais -->
                <div class="form-row">
                    <div class="form-group full-width">
                        <label class="form-label">
                            <i class="fas fa-user"></i> Nome
                        </label>
                        <input type="text" name="name" class="form-input" id="inputName" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope"></i> Email
                        </label>
                        <input type="email" name="email" class="form-input" id="inputEmail" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone"></i> Telefone
                        </label>
                        <input type="tel" name="phone" class="form-input" id="inputPhone" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">
                        <i class="fas fa-save"></i>
                        Salvar
                    </button>
                </div>
            </form>

            <!-- Dados da Empresa 
            <h2>Tal Cafeteria</h2>
            
            <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-store"></i> Nome da Empresa
                    </label>
                    <input type="text" class="form-input" value="Tal Cafeteria" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Email Empresarial
                    </label>
                    <input type="email" class="form-input" value="talcafeteria@facilita.com" required>
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-id-card"></i> CNPJ
                    </label>
                    <input type="text" class="form-input" value="12.345.678/0001-95" required>
                </div>
            </div>

            <div class="form-group full-width">
                <label class="form-label">
                    <i class="fas fa-map-marker-alt"></i> Endereço
                </label>
                <input type="text" class="form-input" value="Rua das Flores, 123 - Centro" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-save">
                    <i class="fas fa-save"></i>
                    Salvar
                </button>
            </div>-->

             
            <h2>Alteração de Senha</h2>
            
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-lock"></i> Senha Atual
                    </label>
                    <input type="password" name="oldPassword" class="form-input" placeholder="Digite sua senha atual" required>
                </div>
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Nova Senha
                    </label>
                    <input type="password" name="newPassword" class="form-input" placeholder="Digite a nova senha" required>
                </div>
            </div>

           <!-- <div class="form-row">
                <div class="form-group full-width">
                    <label class="form-label">
                        <i class="fas fa-check"></i> Confirmar Nova Senha
                    </label>
                    <input type="password" class="form-input" placeholder="Confirme a nova senha" required>
                </div>
            </div>-->

            <div class="account-info">
                <p><strong>Dica de segurança:</strong> Use uma senha com pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas, números e símbolos especiais.</p>
            </div>

            <div class="form-actions">
                <button type="submit" id="btnPassword" class="btn btn-save">
                    <i class="fas fa-shield-alt"></i>
                    Alterar Senha
                </button>
            </div>
        </div>
    </div>

 <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/cafe-editprofile.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/app/dono/profile.js') ?>"></script>