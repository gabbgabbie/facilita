import {
    HttpUser
} from "../../../_shared/HttpUser.js";
const api = new HttpUser();
const token = localStorage.getItem("token");
const usuario = JSON.parse(localStorage.getItem("user-logado"));

const fotoPerfil = document.querySelector(".profile-photo");
fotoPerfil.src = "http://localhost/facilita/storage/images/" + usuario.photo;

const sair = document.querySelector("#logout-btn");
sair.addEventListener('click', async (e) => {
    e.preventDefault();
    localStorage.removeItem("user-logado");
    localStorage.removeItem("token");
    window.location.href = "/facilita/"
});

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