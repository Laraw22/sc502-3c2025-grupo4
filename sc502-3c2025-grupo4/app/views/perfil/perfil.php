<?php
require_once '../models/User.php';

// Obtener información del usuario en sesión
$id_usuario = $_SESSION['id_usuario'] ?? null;
$usuario = null;

if ($id_usuario) {
    $usuario = User::getUserById($id_usuario); // Método que implementaremos
}
?>
<h2>Perfil Editable</h2>
<form action="../controllers/actualizar_perfil.php" method="POST" id="perfilForm">
  <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuario['id_usuario'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
  
  <label for="nombre">Nombre (requerido):</label>
  <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" required />

  <label for="descripcion">Descripción:</label>
  <textarea id="descripcion" name="descripcion" rows="4"><?php echo htmlspecialchars($usuario['descripcion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>

  <label for="contactos">Contactos:</label>
  <input type="text" id="contactos" name="contactos" value="<?php echo htmlspecialchars($usuario['contacto'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />

  <button type="submit" id="guardarBtn">Guardar</button>  
</form>

