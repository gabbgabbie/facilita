import { Toast } from "/facilita/assets/_shared/js/Toast.js";

const toast = new Toast();
const token = localStorage.getItem("token");
const usuario = JSON.parse(localStorage.getItem("user-logado"));

const cafeID = usuario.cafe_id;

async function listEmployees() {
    try {
        const response = await fetch(`http://localhost/facilita/api/users/employees/${cafeID}`, {
            method: "GET",
            headers: { "token": token },
        });

        const data = await response.json();

        if (data.type == "error") {
            console.log(data.message);
            return;
        }

        const table = document.querySelector(".employees-table");

        data.data.forEach(employee => {
            console.log(employee);

            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td>
                    <div class="employee-info">
                        <div class="employee-photo">
                            <img src="http://localhost/facilita/storage/images/${employee.photo}" alt="Foto">
                        </div>
                        <div>${employee.name}</div>
                    </div>
                </td>
                <td>${employee.email}</td>
                <td>${employee.phone}</td>
                <td class="actions-cell">
                    <div class="action-icon edit-icon"><i class="fas fa-edit"></i></div>
                    <div class="action-icon delete-icon"><i class="fas fa-trash"></i></div>
                </td>
            `;
            table.appendChild(tr);
        });

    } catch (err) {
        console.error("Erro ao listar funcionários:", err);
    }
}


listEmployees();

//add funcionarios

const formRegister = document.querySelector("#employee-form");
formRegister.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(formRegister);
    formData.append("cafe_id", cafeID);
  try {
    const response = await fetch("http://localhost/facilita/api/users/addEmployee", {
      method: "POST",
      headers: { "token": token },
      body: formData
    });

    const data = await response.json();
    if (!response.ok) {
      console.log(data.message);
      return;
    }

    toast.show(data.message, data.type);
    setTimeout(() => { 
        location.reload(); 
    }, 3000);


  } catch (err) {
    console.error("Erro ao adicionar funcionario:", err);
  }
});
