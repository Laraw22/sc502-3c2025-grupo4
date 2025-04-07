<body>
  <div class="password-change-container">
    <h2>Cambiar Contraseña</h2>
    <p>Ingrese su nueva contraseña para actualizar su perfil</p>
    <form id="newPasswordForm" action="../controllers/procesar_recuperacion.php" method="post">
      <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_GET['id_usuario'] ?? ''); ?>" />
      <div class="form-group">
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" id="new_password" name="new_password" required />
      </div>
      <button type="submit" id="ActualizarContra">Actualizar Contraseña</button>
    </form>
    <a href="Es_inicioSe.php">Volver al Inicio de Sesión</a>
  </div>
</body>