document.addEventListener("DOMContentLoaded", () => {
  const nombreInput = document.getElementById("nombre");
  const descripcionInput = document.getElementById("descripcion");
  const contactosInput = document.getElementById("contactos");
  const guardarBtn = document.getElementById("guardarBtn");

  // Función para verificar si todos los campos están llenos
  function validarCampos() {
    return (
      nombreInput.value.trim() !== "" &&
      descripcionInput.value.trim() !== "" &&
      contactosInput.value.trim() !== ""
    );
  }

  // Validar campos antes de enviar (guardar acción)
  guardarBtn.addEventListener("click", (event) => {
    if (!nombreInput.value.trim()) {
      alert("El nombre es obligatorio.");
      event.preventDefault(); // Detener el envío si el nombre está vacío
    }
  });
});
