import { Toast } from "/facilita/assets/_shared/js/Toast.js";

const toast = new Toast();
const token = localStorage.getItem("token");
let usuario = JSON.parse(localStorage.getItem("user-logado"));

console.log(usuario);

//carrega os dados da cafeteria
async function loadCafe() {
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
      toast.error(data.message || "Erro ao carregar dados da cafeteria.");
      return;
    }

    document.querySelector("#inputName").value = data.data.name;
    document.querySelector("#inputCnpj").value = data.data.cnpj;
    document.querySelector("#inputAddress").value = data.data.address;

  } catch (err) {
    console.error("Erro ao carregar cafeteria:", err);
    toast.error("Erro inesperado ao carregar cafeteria.");
  }
}

loadCafe();

const form = document.querySelector("#cafeteriaForm");

// input hidden com id da cafeteria
const inputID = document.createElement("input");
inputID.type = "hidden";
inputID.name = "id";
inputID.value = usuario.cafe_id;
form.appendChild(inputID);

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  const formData = new FormData(form);

  try {
    const response = await fetch("http://localhost/facilita/api/cafes/update", {
      method: "POST",
      headers: {
        "token": token
      },
      body: formData
    });

    const data = await response.json();
    if (!response.ok) {
      toast.error(data.message);
      return;
    }

    toast.show(data.message, data.type);
    setTimeout(() => location.reload(), 3000);

  } catch (err) {
    console.error("Erro ao atualizar cafeteria:", err);
  }
});
