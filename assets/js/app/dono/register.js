

let usuario = JSON.parse(localStorage.getItem("user-logado"));


const token = localStorage.getItem("token");

const form = document.querySelector("#form-cadastro");
form.addEventListener("submit", async (event) => {
    event.preventDefault();
     const formData = new FormData(form);
    console.log('oi');
    
  try {
    const response = await fetch("http://localhost/facilita/api/cafes/add", {
      method: "POST",
      headers: { "token": token },
      body: formData
    });

    const data = await response.json();
    if (!response.ok) {
      console.log(data.message);
      return;
    }

    
   alert('Cafeteria criada com sucesso!')
   window.location.href = "/facilita/app/dono/"
    
    const result = await fetch("http://localhost/facilita/api/cafes/add", {
      method: "POST",
      body: formData
    });

   
  } catch (err) {
    console.error("Erro ao criar cafeteria:", err);
  }
})