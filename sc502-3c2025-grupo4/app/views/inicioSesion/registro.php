<body>
  <div class="registro-container">
    <h2>¡Crea tu cuenta!</h2>
    <p>Complete los siguientes campos</p>
    <form action="../controllers/auth.php" method="POST">
      <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required />
      </div>
      <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required />
      </div>
      <input type="hidden" name="action" value="register">
      <button type="submit">Registrarse</button>
    </form>
    <a href="Es_inicioSe.php">Volver al inicio Sesión</a>
  </div>
</body>