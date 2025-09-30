import { HttpCafe } from "../../../_shared/HttpCafe.js";

const api = new HttpCafe();

const token = localStorage.getItem("token");
const usuario = JSON.parse(localStorage.getItem("user-logado"));

console.log(usuario);

const profileInfo = document.querySelector("#profile-name");
profileInfo.innerHTML = `        ${usuario.name}

        `;