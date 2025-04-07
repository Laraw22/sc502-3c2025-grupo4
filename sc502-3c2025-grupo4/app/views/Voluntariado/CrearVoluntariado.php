<?php
require_once "../controllers/VoluntariadoController.php";
?>
<h1>Crear Voluntariado</h1>
<form class="row g-3" method="POST" action="../controllers/VoluntariadoController.php" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputTitulo" class="form-label">Título</label>
    <input type="text" class="form-control" id="inputTitulo" name="titulo" placeholder="Ejemplo: Ayuda Comunitaria">
  </div>
  <div class="col-md-6">
    <label for="inputDescripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="inputDescripcion" name="descripcion" rows="3" placeholder="Breve descripción del voluntariado"></textarea>
  </div>
  <div class="col-12">
    <label for="inputUbicacion" class="form-label">Ubicación</label>
    <input type="text" class="form-control" id="inputUbicacion" name="ubicacion" placeholder="Ejemplo: Calle 123, Ciudad">
  </div>
  <div class="col-md-6">
    <label for="inputFechaInicio" class="form-label">Fecha de Inicio</label>
    <input type="date" class="form-control" id="inputFechaInicio" name="fecha_inicio">
  </div>
  <div class="col-md-6">
    <label for="inputFechaFin" class="form-label">Fecha de Fin</label>
    <input type="date" class="form-control" id="inputFechaFin" name="fecha_fin">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Imagen</label>
    <input class="form-control" type="text" id="formFile" name="imagen">
  </div>
  <div class="col-md-6">
    <label for="inputusuario" class="form-label">ID usuario</label>
    <input type="text" class="form-control" id="inputusuario" name="id_usuario" placeholder="Ejemplo: 123">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Agregar Voluntariado</button>
  </div>
</form>
</div>
</div>