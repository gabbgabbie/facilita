<?php $this->layout("_theme",[]);?>
<div class="container">
        <div class="card">
            <h1 class="card-title">Editar dados</h1>
            <p class="card-subtitle">Atualize as informações da sua cafeteria</p>

            <form id="cafeteriaForm">
                <div class="form-group">
                    <label class="form-label">
                        <svg class="icon" fill="#c67bb5" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                        </svg>
                        Nome da Cafeteria
                    </label>
                    <input name="name" type="text" id="inputName"  class="form-input" placeholder="Digite o nome da cafeteria">
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg class="icon" fill="#c67bb5" viewBox="0 0 24 24">
                            <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                        CNPJ
                    </label>
                    <input name="cnpj" type="text" id="inputCnpj" class="form-input" placeholder="00.000.000/0000-00">
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg class="icon" fill="#c67bb5" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                        Endereço
                    </label>
                    <input name="address" type="text" id="inputAddress" class="form-input" placeholder="Digite o endereço completo">
                </div>
                <button type="submit" class="save-btn">
                    <svg width="20" height="20" fill="white" viewBox="0 0 24 24">
                        <path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/>
                    </svg>
                    Salvar
                </button>
            </form>
        </div>
    </div>

 <?php  $this->start("specific-css"); ?>
<link rel="stylesheet" href="<?= url("assets/css/app/dono/cafe-profile.css"); ?>">
<?php $this->end(); ?>
<script type="module" src="<?= url('assets/js/app/dono/cafe-profile.js') ?>"></script>