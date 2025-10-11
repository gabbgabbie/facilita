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
                        <p> <a href="<?=url("app/funcionario/mudar-senha")?>">Alterar senha</a></p>
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



 <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/_shared/profile.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/_shared/profile.js') ?>"></script>