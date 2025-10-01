const token = localStorage.getItem("token");
let usuario = JSON.parse(localStorage.getItem("user-logado"));
console.log(usuario.photo);

console.log(usuario);


const form = document.querySelector(".profile-form");

document.querySelector('#inputName').value = usuario.name;
const email = document.querySelector('#inputEmail')
email.value = usuario.email
document.querySelector('#inputPhone').value = usuario.phone;

const fotoPerfil = document.querySelector(".foto-perfil");
  fotoPerfil.src = "http://localhost/facilita/storage/images/" + usuario.photo;

// input hidden com id do usuário
const inputID = document.createElement("input");
inputID.type = "hidden";
inputID.name = "id";
inputID.value = usuario.id;
form.appendChild(inputID);

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  const formData = new FormData(form);

  try {
    const response = await fetch("http://localhost/facilita/api/users/update", {
      method: "POST",
      headers: { "token": token },
      body: formData
    });

    const data = await response.json();
    if (!response.ok) {
      console.log(data.message);
      return;
    }


    alert("Perfil atualizado!");
    
    localStorage.setItem("user-logado", JSON.stringify(data.data));
    location.reload();

    if (data.trocouEmail){
      localStorage.removeItem("user-logado")
      window.location.href = "/facilita/login"
    }

  } catch (err) {
    console.error("Erro ao atualizar perfil:", err);
  }
});

// upload de foto
document.querySelector("#photoInput").addEventListener("change", async function () {
  console.log("evento");

  const file = this.files[0];
  if (!file) {
    console.log("Nenhum arquivo selecionado");
    return;
  }

  const formData = new FormData();
  formData.append("photo", file);

  try {
    const response = await fetch("http://localhost/facilita/api/users/photo", {
      method: "POST",
      headers: { 
        "token": token 
      },
      body: formData
    });

    const data = await response.json();

    if (!response.ok) {
      console.error("erro na resposta:", data);
      return;
    }

    // att imagem e localstorage
    fotoPerfil.src = data.data.photo;
    //console.log(fotoPerfil.src)
    alert("Foto atualizada com sucesso!");
    usuario.photo = data.data.photo;

    localStorage.setItem("user-logado", JSON.stringify(usuario));
    location.reload()

  } catch (error) {
    console.error("Erro na requisição:", error);
    alert("não foi possível atualizar a foto: " + error.message);
  }
});