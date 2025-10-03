const usuario = JSON.parse(localStorage.getItem("user-logado"));
const token = localStorage.getItem("token");

if (!token) {
        console.log("vc nao esta logado");   
        window.location.href = "/facilita/login"
}

//info da header
const username = document.querySelector("#user-name");
username.innerHTML = `${usuario.name}!`;

//logout
const sair = document.querySelector("#logout-btn");
sair.addEventListener('click', async (e) => {
    e.preventDefault();
    localStorage.removeItem("user-logado");
    localStorage.removeItem("token");
    window.location.href = "/facilita/"
});

// menu
const menu = document.querySelector(".logo-texto");
menu.addEventListener('click', async (e) => {
    e.preventDefault();
    window.location.href = "/facilita/app/dono"
})

//voltar
const back = document.querySelector('#back-btn')
back.addEventListener('click', () => {
      if (document.referrer && !document.referrer.includes('/login')) {
        window.history.back();
      } else {
        window.location.href = '/facilita/app/dono';
      }
    });