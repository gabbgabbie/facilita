import { Toast } from "/facilita/assets/_shared/js/Toast.js";

document.addEventListener("DOMContentLoaded", () => {
  const toast = new Toast();

  const token = localStorage.getItem("token");
  //let usuario = JSON.parse(localStorage.getItem("user-logado"));

  const form = document.querySelector(".profile-form");

  form.addEventListener("submit", async (event) => {
    event.preventDefault(); 

    const oldPassword = document.querySelector("#oldPassword").value;
    const newPassword = document.querySelector("#newPassword").value;

    try {
      const formData = new FormData();
      formData.append("oldPassword", oldPassword);
      formData.append("newPassword", newPassword);

      const response = await fetch(
        "http://localhost/facilita/api/users/update/password",
        {
          method: "POST",
          headers: { token: token },
          body: formData
        }
      );

      const data = await response.json();
      console.log("dados retornados: ", data);

      if (!response.ok) {
        console.log("Erro na atualização:", data.message);
        return;
      }

      toast.show(data.message, data.type);

      if (data.type == "success") {
        setTimeout(() => {
        window.location.href = "/facilita/app/dono/perfil";
        }, 3000); // 1000ms = 1 segundo
        }

    } catch (err) {
      console.error("Erro ao atualizar senha:", err);
    }
  });
});
