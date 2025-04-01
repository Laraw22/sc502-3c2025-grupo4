<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
  <meta charset="UTF-8" />
  <title>Voluntariado</title>
  <link rel="stylesheet" href="../../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../public/css/estilos.css">
  <link rel="stylesheet" href="../../public/css/menu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <script src="../../public/js/menuDes.js"></script>
</head>
<body></body>
<header class="header">
  <div class="espacio_titulo">
    <a href="../../index.php" class="link log">Voluntariado</a>
  </div>
  <br />
  <ul class="menu">
    <li class="menu-item"><a href="../../index.php" class="link menu-link">Nosotros</a></li>
    <li class="menu-item"><a href="noticias.php" class="link menu-link">Noticias</a></li>
    <li class="menu-item"><a href="../views/Buscar/Buscar.php" class="link menu-link">Buscar</a></li>
    <li class="menu-item"><a href="CrearVolutariado.php" class="link menu-link">Nuevo Voluntariado</a></li>
      <a href="#" class="menu-icon" id="menuToggle" style = "color: white;">
        <i class="fa-solid fa-bars" ></i></a>
    </li>
  </ul>
  <br />
</header>

<div class="side-menu" id="sideMenu">
  <ul>
    <?php if (!isset($_SESSION['nombre'])): ?>
      <li class="menu-item">
        <a href="Es_inicioSe.php" class="menu-icon">
          <i class="fa-solid fa-user"></i> Iniciar sesión
        </a>
      </li>
    <?php endif; ?>

    <?php if (isset($_SESSION['nombre'])): ?>
      <li class="menu-item usuario-nombre">
        <a href="perfil.php">👤 <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
      </li>
      <li class="menu-item">
        <a href="../controllers/cerrarSes.php" class="menu-link">Cerrar sesión</a>
      </li>
    <?php endif; ?>
  </ul>
</div>

<aside>
  <br />
</aside>
