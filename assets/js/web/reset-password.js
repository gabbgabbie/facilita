import { Toast } from "../../_shared/js/Toast.js";

const toast = new Toast()
const token = localStorage.getItem("token");
const form = document.querySelector('#passwordForm');

form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const password = document.querySelector("#password").value
    const confirm_password = document.querySelector("#confirm-password").value
    const formData = new FormData();
    formData.append("password", password);
    formData.append("confirm-password", confirm_password)

  const response = await fetch("http://localhost/facilita/api/users/password/reset", {
    method: "POST",
    headers: {token: token},
    body: formData
  });

    const data = await response.json();
    console.log(data);
  
    toast.show(data.message, data.type);

  if (data.type == "success") {
    localStorage.removeItem("recoveryEmail");
    localStorage.removeItem("user-logado");
    localStorage.removeItem("token")
    setTimeout(() => {
        window.location.href = "/facilita/login";
    }, 3000); 
  } 
});
