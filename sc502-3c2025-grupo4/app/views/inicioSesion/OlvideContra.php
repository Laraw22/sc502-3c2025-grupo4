<div class="forgot-password-container">
    <h2>Recuperar Contraseña</h2>
    <p>Complete los siguientes campos para recuperar su contraseña</p>
    <form action="../controllers/procesar_recuperacion.php" method="post">
      <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <button type="submit" id="ConfirmarCredenciales">Confirmar</button>
    </form>
    <a href="Es_inicioSe.php">Volver al Inicio de Sesión</a>
  </div>
