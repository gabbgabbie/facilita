const token = localStorage.getItem("token");

if (!token) {
        console.log("vc nao esta logado");
        
        window.location.href = "/facilita/login"
}

const usuario = JSON.parse(localStorage.getItem("user-logado"));

const username = document.querySelector("#user-name");
username.innerHTML = `${usuario.name}!`;

const sair = document.querySelector("#logout-btn");
sair.addEventListener('click', async (e) => {
    e.preventDefault();
    localStorage.removeItem("user-logado");
    localStorage.removeItem("token");
    window.location.href = "/facilita/"
});

const menu = document.querySelector(".logo-texto");
menu.addEventListener('click', async (e) => {
    e.preventDefault();
    window.location.href = "/facilita/app/dono"
})