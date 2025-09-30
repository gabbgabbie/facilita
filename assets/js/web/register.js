import {
    HttpUser
} from "../../_shared/js/HttpUser.js";

import {
    Toast
} from "../../_shared/js/Toast.js";
const formRegister = document.querySelector("#form-cadastro");

const api = new HttpUser();
const toast = new Toast();
console.log("API inicializada", api);
formRegister.addEventListener("submit", async (event) => {
    event.preventDefault();
    fetch("http://localhost/facilita/api/users/add",
        {
            method: "POST",
            body: new FormData(formRegister)
        }
    ).then((respose) => {
        console.log(respose);
    respose.json().then((user) => {
            console.log(user);
            if (user.type == "error") {
            
            toast.show(user.message)
        }
        });

        
      
        
    });


});