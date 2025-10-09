import { Toast } from "/facilita/assets/_shared/js/Toast.js";

const toast = new Toast();
let usuario = JSON.parse(localStorage.getItem("user-logado"));
const token = localStorage.getItem("token");

const form = document.querySelector("#form-cadastro");

console.log(token);

form.addEventListener("submit", async (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  
  try {
    console.log('Iniciando criação da cafeteria...');
    const response = await fetch("http://localhost/facilita/api/cafes/add", {
      method: "POST",
      headers: { "token": token },
      body: formData
    });

    console.log('Response status:', response.status);
    const data = await response.json();
    console.log('Data recebida:', data);
    
    if (!response.ok) {
      console.log(data.message);
      alert(data.message || 'Erro ao criar cafeteria');
      return;
    }

    toast.show(data.message, data.type)
    // pega o id
    const cafeId = data.data.id;
    console.log('Cafe ID extraído:', cafeId);
    
    if (!cafeId) {
      console.error('ID da cafeteria não encontrado na resposta');
      alert('Cafeteria criada, mas não foi possível obter o ID');
      return;
    }
    
    const formCafeId = new FormData();
    formCafeId.append("id", cafeId);

    const updateResponse = await fetch("http://localhost/facilita/api/users/update/cafeid", {
      method: "POST", 
      headers: {
        "token": token
      },
      body: formCafeId
    });

    console.log('Update response status:', updateResponse.status);
    const updateData = await updateResponse.json();
    console.log('Update data:', updateData);
    
    if (!updateResponse.ok) {
      console.log('Cafeteria criada, mas erro ao atualizar usuário:', updateData.message);
      alert('Cafeteria criada com sucesso, mas houve um problema ao vincular ao seu usuário');
      return;
    }

    usuario.cafe_id = cafeId;
    localStorage.setItem("user-logado", JSON.stringify(usuario));
    
    alert('Cafeteria criada e vinculada com sucesso!');
    window.location.href = "/facilita/app/dono/";
    
  } catch (err) {
    console.error("erro:", err);
  }
});
