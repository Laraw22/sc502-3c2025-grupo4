<h1>Registrar Inscripción</h1>
<form class="row g-3" method="POST" action="../controllers/InscripcionController.php">
  <div class="col-md-6">
    <label for="inputIdUsuario" class="form-label">ID Usuario</label>
    <input type="text" class="form-control" id="inputIdUsuario" name="id_usuario" placeholder="Ejemplo: 123">
  </div>
  <div class="col-md-6">
    <label for="inputIdVoluntariado" class="form-label">ID Voluntariado</label>
    <input type="text" class="form-control" id="inputIdVoluntariado" name="id_voluntariado" placeholder="Ejemplo: 456">
  </div>
  <div class="col-md-6">
    <label for="inputFechaInscripcion" class="form-label">Fecha de Inscripción</label>
    <input type="date" class="form-control" id="inputFechaInscripcion" name="fecha_inscripcion">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Registrar Inscripción</button>
  </div>
</form>