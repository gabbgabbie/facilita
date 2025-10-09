import { Toast } from "../../_shared/js/Toast.js";
const toast = new Toast();

        const hiddenInput = document.getElementById('hiddenInput');
        const codeDisplay = document.getElementById('codeDisplay');
        const digits = codeDisplay.querySelectorAll('.code-digit');
        const verifyBtn = document.getElementById('verifyBtn');
        const form = document.getElementById('verificationForm');

        hiddenInput.focus();
        codeDisplay.addEventListener('click', () => {
            hiddenInput.focus();
        });

        // atualiza o display visual conforme digita
        hiddenInput.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, ''); // remover nao numeros
            e.target.value = value;

            // atualiza cada digito
            digits.forEach((digit, index) => {
                if (index < value.length) {
                    digit.textContent = value[index];
                    digit.classList.add('filled');
                    digit.classList.remove('empty', 'active');
                } else if (index === value.length) {
                    digit.textContent = '0';
                    digit.classList.remove('filled');
                    digit.classList.add('empty', 'active');
                } else {
                    digit.textContent = '0';
                    digit.classList.remove('filled', 'active');
                    digit.classList.add('empty');
                }
            });

            // habilita/desabilita button
            verifyBtn.disabled = value.length !== 6;
        });

        // mantem foco no input
        hiddenInput.addEventListener('blur', () => {
            setTimeout(() => hiddenInput.focus(), 0);
        });

const userEmail = localStorage.getItem("recoveryEmail");
const emailDisplay = document.querySelector('.email-display');
console.log('oi');

emailDisplay.innerHTML = `${userEmail}`

const verificationForm = document.querySelector("#verificationForm");

verificationForm.addEventListener('submit', async (e) => {
    e.preventDefault();
        const formData = new FormData(verificationForm);
        formData.append('email', userEmail);
        
        try {
            const response = await fetch("http://localhost/facilita/api/users/code/verify-password", {
            method: "POST",
            body: formData
            });

            const data = await response.json();
            //console.log(data.data.token);

            toast.show(data.message, data.type);
            
            if (data.type == "success") {
                localStorage.setItem("token", data.data.token);
                localStorage.setItem("user-logado", JSON.stringify(data.data.user));
                window.location.href = "/facilita/senha/reset"
            }

        } catch (err) {
            console.error("erro ao validar código: ", err);
        }

});