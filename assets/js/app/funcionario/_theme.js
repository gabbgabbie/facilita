document.addEventListener("DOMContentLoaded", () => {
  const token = localStorage.getItem("token");
  const usuario = JSON.parse(localStorage.getItem("user-logado"));

  if (!token || usuario.role != "employee") {
    window.location.href = "/facilita/login";
    return;
  }

  // infos
  const username = document.querySelector("#userName");
  const fotoPerfil = document.querySelector("#userPhoto");

  if (username) username.textContent = usuario.name;
  if (fotoPerfil && usuario.photo) {
    fotoPerfil.src = "http://localhost/facilita/storage/images/" + usuario.photo;
  }

  // logout
  const sair = document.querySelector("#logout-btn");
    sair.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.removeItem("user-logado");
      localStorage.removeItem("token");
      window.location.href = "/facilita/login";
    });

  const sideSair = document.querySelector("#sair");
  if (sideSair) {
    sideSair.addEventListener("click", (e) => {
      e.preventDefault();
      localStorage.removeItem("user-logado");
      localStorage.removeItem("token");
      window.location.href = "/facilita/login";
    });
  }

  // menu
  const menu = document.querySelector(".logo-texto");
    menu.addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = "/facilita/app/funcionario";
      
    });

  const hUsername = document.querySelector("#user-name");
  hUsername.textContent = usuario.name;

  //voltar
  const back = document.querySelector('#back-btn')
  back.addEventListener('click', () => {
        if (document.referrer && !document.referrer.includes('/login')) {
          window.history.back();
        } else {
          window.location.href = '/facilita/app/dono';
        }
      });
});
