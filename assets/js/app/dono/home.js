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

// dados da cafeteria
async function carregarCafe() {
  if (!usuario?.cafe_id) return;

  try {
    const response = await fetch(`http://localhost/facilita/api/cafes/id/${usuario.cafe_id}`, {
      method: "GET",
      headers: {
        "token": token
      }
    });

    const data = await response.json();
    if (!response.ok) {
      console.error(data.message);
      return;
    }

   const cafeName = document.querySelector('#cafeName')
   const cafeCNPJ = document.querySelector('#cafeCNPJ')
   const cafeAddress = document.querySelector('#cafeAddress')
   cafeAddress.textContent = data.data.address;
   cafeName.textContent = data.data.name;
   cafeCNPJ.textContent = data.data.cnpj;
    

  } catch (err) {
    console.error("Erro ao carregar cafeteria:", err);
  }
}

carregarCafe();



