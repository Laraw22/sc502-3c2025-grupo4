<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header">
  <div class="espacio_titulo">
    <a href="index.php" class="link log">Voluntariado</a>
  </div>
  <br />
  <ul class="menu">
    <li class="menu-item"><a href="index.php" class="link menu-link">Nosotros</a></li>
    <li class="menu-item"><a href="app/partials/noticias.php" class="link menu-link">Noticias</a></li>
    <li class="menu-item"><a href="app/views/Buscar/Buscar.php" class="link menu-link">Buscar</a></li>
    <?php if (in_array('admin', $_SESSION['roles'] ?? [])): ?>      
      <li class="menu-item"><a href="app/partials/CrearVolutariado.php" class="link menu-link">Nuevo Voluntariado</a></li>
      <?php endif; ?>
    
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
        <a href="app/partials/Es_inicioSe.php" class="menu-icon">
          <i class="fa-solid fa-user"></i> Iniciar sesión
        </a>
      </li>
      
    <?php endif; ?>

    <?php if (isset($_SESSION['nombre'])): ?>
      <li class="menu-item usuario-nombre">
        <a href="app/partials/perfil.php">👤 <?php echo htmlspecialchars($_SESSION['nombre']); ?></a>
      </li>
          
      <?php if (in_array('admin', $_SESSION['roles'] ?? [])): ?>      
        <li>
          <a href="app/partials/administracion.php" class="menu-link">Usuarios</a>
        </li>
      <?php endif; ?>

      <li class="menu-item">
        <a href="app/controllers/cerrarSes.php" class="menu-link">Cerrar sesión</a>
      </li> 
    <?php endif; ?>
  </ul>
</div>

<aside>
  <br />
</aside>





