
  <body>
    <div class="login-container">
      <h2>¡Le damos la bienvenida!</h2>
      <p>Inicie sesión en su cuenta</p>
      <form action="tu-accion-aqui" method="post">
        <div class="form-group">
          <label for="email">Correo electrónico:</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
          <a href="olvideContra.php" class="forgot-password"
            >¿Olvidó su contraseña?</a
          >
        </div>
        <button type="submit">Iniciar sesión</button>
        <hr />
        <h3>O <a href="Registro.php">Registrarse</a></h3>
        <a href="../../index.php">Volver al inicio</a> <a href="../../index.php">Volver al inicio</a>
      </form>
    </div>
  </body>
