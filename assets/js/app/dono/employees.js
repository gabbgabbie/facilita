import {
    HttpUser
} from "../../../_shared/HttpUser.js";
const api = new HttpUser();
const token = localStorage.getItem("token");
const usuario = JSON.parse(localStorage.getItem("user-logado"));

console.log(usuario);

const profileInfo = document.querySelector("#profile-name");
profileInfo.innerHTML = `        ${usuario.name}

        `;


const formRegister = document.querySelector("#employee-form");

console.log("API inicializada", api);
formRegister.addEventListener("submit", async (event) => {
    event.preventDefault();
        api.setAuthToken(token);
    fetch("http://localhost/facilita/api/users/add",
        {
            method: "POST",
            body: new FormData(formRegister)
        }
    ).then((respose) => {
        console.log(respose);
    respose.json().then((user) => {
            console.log(user);
        });

        
    });


});