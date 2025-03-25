document.addEventListener("DOMContentLoaded", () => {
  const emailInput = document.getElementById("email"); // Cambiado a emailInput
  const passwordInput = document.getElementById("password");
  const loginBtn = document.getElementById("login");
  const redirectRegisterBtn = document.getElementById("redirectRegister");

  function validarInput() {
    if (emailInput.value.trim() === "" || passwordInput.value.trim() === "") {
      alert("Los campos no pueden estar vacíos.");
      return false;
    }
    return true;
  }

  loginBtn.addEventListener("click", (event) => {
    if (!validarInput()) {
      event.preventDefault(); // Detener el envío si algún campo está vacío
    }
  });

  redirectRegisterBtn.addEventListener("click", function () {
    window.location.href = "Registro.php"; // Redirigir al registro
  });
});
