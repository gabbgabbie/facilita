const token = localStorage.getItem("token");
let usuario = JSON.parse(localStorage.getItem("user-logado"));

console.log( token);
console.log( usuario);


const info = document.querySelector("#user-info");
const nome = document.querySelector("#username")
nome.innerHTML = `${usuario.name}`

    info.innerHTML = `
           <div class="info-item">
          <span class="info-label">Email: </span>
          <span class="info-value" id="user-email">${usuario.email}</span>
        </div>
        <div class="info-item">
          <span class="info-label">Telefone:</span>
          <span class="info-value">${usuario.phone}</span>
        </div>
    `;

    console.log(usuario.photo);
    
  const fotoPerfil = document.querySelector(".foto-perfil");
  fotoPerfil.src = "http://localhost/facilita/storage/images/" + usuario.photo;
    

