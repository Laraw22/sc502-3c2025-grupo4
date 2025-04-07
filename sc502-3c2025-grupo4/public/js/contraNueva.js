document.addEventListener("DOMContentLoaded", () => {
  // Botón para confirmar credenciales
  const confirmarBtn = document.getElementById("ConfirmarCredenciales");

  // Validar campos antes de enviar credenciales
  function validarCredenciales() {
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");

    if (nameInput.value.trim() === "" || emailInput.value.trim() === "") {
      alert("Por favor, complete todos los campos.");
      return false;
    }
    return true;
  }

  // Manejar evento para confirmar credenciales
  confirmarBtn?.addEventListener("click", function (event) {
    if (!validarCredenciales()) {
      event.preventDefault(); // Detener envío si hay campos vacíos
    }
  });

  // Validar nueva contraseña antes de actualizar
  const newPasswordForm = document.getElementById("newPasswordForm");
  newPasswordForm?.addEventListener("submit", function (event) {
    const newPasswordInput = document.getElementById("new_password");

    if (newPasswordInput.value.trim() === "") {
      alert("Por favor, ingrese una nueva contraseña.");
      event.preventDefault(); // Detener envío si está vacío
    } else {
      alert("¡Contraseña actualizada con éxito!");
      window.location.href = "Es_inicioSe.php"; // Redirigir al inicio de sesión
    }
  });
});
