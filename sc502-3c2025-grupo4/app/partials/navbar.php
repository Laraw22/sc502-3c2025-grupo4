<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header">
  <div class="espacio_titulo">
    <a href="" class="link log">Voluntariado</a>
  </div>
  <br />
  <ul class="menu">
    <li class="menu-item"><a href="" class="link menu-link">Nosotros</a></li>
    <li class="menu-item"><a href="/sc502-3c2025-grupo4/sc502-3c2025-grupo4/app/views/Noticias/noticias.php" class="link menu-link">Noticias</a></li>
    <li class="menu-item"><a href="Buscar/Buscar.html" class="link menu-link">Buscar</a></li>
    <li class="menu-item">
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
        <a href="/sc502-3c2025-grupo4/sc502-3c2025-grupo4/app/partials/Es_inicioSe.php" class="menu-icon">
          <i class="fa-solid fa-user"></i> Iniciar sesión
        </a>
      </li>
    <?php endif; ?>

    <?php if (isset($_SESSION['nombre'])): ?>
      <li class="menu-item usuario-nombre">
        <a href="#">👤 <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
      </li>
      <li class="menu-item">
        <a href="/sc502-3c2025-grupo4/sc502-3c2025-grupo4/app/controllers/cerrarSes.php" class="menu-link">Cerrar sesión</a>
      </li>
    <?php endif; ?>
  </ul>
</div>

<aside>
  <br />
</aside>





