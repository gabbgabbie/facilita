document.addEventListener("DOMContentLoaded", () => {
  const token = localStorage.getItem("token");
  const usuario = JSON.parse(localStorage.getItem("user-logado"));

  const btnPerfil = document.querySelector("#editperfil");
  if (btnPerfil) {
    btnPerfil.addEventListener("click", () => {
      window.location.href = "/facilita/app/funcionario/perfil";
    });
  }

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
      console.error(data.message);
      return;
    }

    const cafeName = document.querySelector('#cafeName')
   const cafeCNPJ = document.querySelector('#cafeCNPJ')
   const cafeAddress = document.querySelector('#cafeAddress')
   cafeAddress.textContent = data.data.address;
   cafeName.textContent = data.data.name;
   cafeCNPJ.textContent = data.data.cnpj;
    
    const container = document.querySelector('.dashboard-container');
    const titulo = document.createElement('h2');
    titulo.textContent = `Painel - ${data.data.name}`;
    titulo.className = 'titulo-secao'
    container.insertAdjacentElement("afterbegin", titulo)


  } catch (err) {
    console.error("Erro ao carregar cafeteria:", err);
  }
}

loadCafe();
});
