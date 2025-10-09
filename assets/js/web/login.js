import { HttpUser } from "../../_shared/js/HttpUser.js";
import { Toast } from "../../_shared/js/Toast.js";

const api = new HttpUser();
const toast = new Toast();
console.log("API inicializada...", api);

const formLogin = document.querySelector("#formLogin");

formLogin.addEventListener("submit", async (event) => {
    event.preventDefault();

    const loginData = new FormData(formLogin);
    const formObj = {};

    loginData.forEach((value, key) => {
        formObj[key] = value;
    });

    try {
        const result = await api.loginUser(formObj);
        console.log(result);
        if (result.status === "success") {
            const {token, user} = result.data;

            localStorage.setItem("token", token);
            localStorage.setItem("user-logado", JSON.stringify(user));
            
            const response = await api.loginUser(formObj);
            console.log(response);
            
            if (user.role === "owner") {
                window.location.href = "/facilita/app/dono/";
                
                if (user.cafe_id === null) {
                    window.location.href = "/facilita/app/dono/cadastro";
                    } else {
                        window.location.href = "/facilita/app/dono/";
                    
                }
            } 
            if (user.role === "admin") {
                window.location.href = "/facilita/admin/";
            }
            if (user.role === "employee") {
                window.location.href = "/facilita/app/funcionario/";
            }
        } else {
            console.log(result);
            
            toast.show(result.message, result.type);
        }
    } catch (error) {
        console.error("erro ao fazer login", error);
    }
});

    const btnPassword = document.getElementById('btnPassword');
    const modalPassword = document.getElementById('modalPassword');
    const closeModal = document.getElementById('closeModal');
    const formRecoverPassword = document.getElementById('formRecoverPassword');
    const modalFormContainer = document.getElementById('modalFormContainer');
    
    btnPassword.addEventListener('click', () => {
        modalPassword.classList.add('active');
    });
    
    
    formRecoverPassword.addEventListener('submit', async (event) => {
        event.preventDefault();
        const email = document.querySelector('#recovery-email').value
        //console.log(email);
        const formData = new FormData(formRecoverPassword);
        formData.append('email', email)
        
        try {
            const response = await fetch("http://localhost/facilita/api/users/code/send", {
            method: "POST",
            body: formData
            });

            const data = await response.json();
            console.log(data);
            
            toast.show(data.message, data.type);

            if (data.type == "success") {
                localStorage.setItem("recoveryEmail", email);
                window.location.href = "/facilita/verificação";
            } else {
                console.log(data.message);
            }

        } catch (err) {
            console.error("erro ao enviar email", err);
        }
    })

    // fechar modal
    closeModal.addEventListener('click', () => {
      modalPassword.classList.remove('active');
      // reseta a modal
      setTimeout(() => {
        modalFormContainer.style.display = 'block';
        formRecoverPassword.reset();
      }, 300);
    });

    // fecha a modal qnd clicar fora dela
    modalPassword.addEventListener('click', (e) => {
      if (e.target === modalPassword) {
        closeModal.click();
      }
    });

