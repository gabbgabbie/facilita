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
