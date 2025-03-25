<body>
  <div class="login-container">
    <h2>¡Le damos la bienvenida!</h2>
    <p>Inicie sesión en su cuenta</p>
    <form action="../controllers/auth.php" method="POST">
      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" placeholder="Correo electrónico" required />
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password" placeholder="Contraseña" required />
      <input type="hidden" name="action" value="login">

      <div class="form-group">
        <a href="olvideContra.php" class="forgot-password">¿Olvidó su contraseña?</a>
      </div>
      <button id="login" type="submit">Iniciar sesión</button>
      <hr />
      <button id="redirectRegister" type="button" class="btn btn-secondary">Registrarse</button>
      <a href="../../index.php">Volver al inicio</a>
    </form>
  </div>
</body>
