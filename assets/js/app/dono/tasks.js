
const token = localStorage.getItem("token");
const usuario = JSON.parse(localStorage.getItem("user-logado"));

const profileInfo = document.querySelector("#profile-name");
profileInfo.innerHTML = `${usuario.name}`;



