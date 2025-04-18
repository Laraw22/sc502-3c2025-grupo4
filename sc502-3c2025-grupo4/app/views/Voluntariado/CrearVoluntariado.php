<main>
  <section class="container mt-4" style="max-width: 98%;">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="mb-0"> voluntariados</h1>
      <?php if (isset($_SESSION['roles']) && (in_array('admin', $_SESSION['roles']) || in_array('fundacion', $_SESSION['roles']))): ?>      
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCrearVoluntariado">
          Crear Voluntariado
        </button>
      <?php endif; ?>
    </div>

    <!-- Modal Crear Voluntariado -->
    <div class="modal fade" id="modalCrearVoluntariado" tabindex="-1" aria-labelledby="modalCrearVoluntariadoLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="../controllers/VoluntariadoController.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCrearVoluntariadoLabel">Crear voluntariado</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="accion" value="crear">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Título</label>
                  <input type="text" class="form-control" name="titulo" placeholder="Ejemplo: Ayuda Comunitaria" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">ID Usuario</label>
                  <input type="text" class="form-control" name="id_usuario" placeholder="Ejemplo: 123" required>
                </div>
                <div class="col-md-12">
                  <label class="form-label">Descripción</label>
                  <textarea class="form-control" name="descripcion" rows="3" placeholder="Breve descripción del voluntariado" required></textarea>
                </div>
                <div class="col-md-12">
                  <label class="form-label">Ubicación</label>
                  <input type="text" class="form-control" name="ubicacion" placeholder="Ejemplo: Calle 123, Ciudad" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Fecha de Inicio</label>
                  <input type="date" class="form-control" name="fecha_inicio" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Fecha de Fin</label>
                  <input type="date" class="form-control" name="fecha_fin" required>
                </div>
                <div class="col-md-12">
                  <label class="form-label">URL de la Imagen</label>
                  <input type="url" class="form-control" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Lista de Voluntariados -->
    <?php if (!empty($voluntariados) && is_array($voluntariados)): ?>
      <?php foreach ($voluntariados as $v): ?>
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?= htmlspecialchars($v['imagen']) ?>" class="img-fluid rounded-start h-100 w-100" alt="Imagen del Voluntariado">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><b><?= htmlspecialchars($v['titulo']) ?></b></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($v['descripcion'])) ?></p>
                <p class="card-text"><small class="text-muted">
                  Ubicación: <?= htmlspecialchars($v['ubicacion']) ?><br>
                  Desde: <?= date("d/m/Y", strtotime($v['fecha_inicio'])) ?> | Hasta: <?= date("d/m/Y", strtotime($v['fecha_fin'])) ?>
                </small></p>

                <?php if (isset($_SESSION['roles']) && ( in_array('admin', $_SESSION['roles']) || (in_array('fundacion', $_SESSION['roles']) && $_SESSION['id_usuario'] === $v['id_usuario_creador']))): ?>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <!-- Botón editar -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $v['id_voluntariado'] ?>">
                      Editar
                    </button>

                    <!-- Formulario eliminar -->
                    <form method="POST" action="../controllers/VoluntariadoController.php">
                      <input type="hidden" name="accion" value="eliminar">
                      <input type="hidden" name="id_voluntariado" value="<?= $v['id_voluntariado'] ?>">
                      <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                  </div>
                <?php endif; ?>

                <!-- Modal Editar -->
                <div class="modal fade" id="modalEditar<?= $v['id_voluntariado'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel<?= $v['id_voluntariado'] ?>" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <form action="../controllers/VoluntariadoController.php" method="POST">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalEditarLabel<?= $v['id_voluntariado'] ?>">Editar Voluntariado</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" name="accion" value="editar">
                          <input type="hidden" name="id_voluntariado" value="<?= $v['id_voluntariado'] ?>">
                          <div class="row g-3">
                            <div class="col-md-6">
                              <label class="form-label">Título</label>
                              <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($v['titulo']) ?>" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">ID Usuario</label>
                              <input type="text" class="form-control" name="id_usuario" value="<?= htmlspecialchars($v['id_usuario']) ?>" required>
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">Descripción</label>
                              <textarea class="form-control" name="descripcion" rows="3"><?= htmlspecialchars($v['descripcion']) ?></textarea>
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">Ubicación</label>
                              <input type="text" class="form-control" name="ubicacion" value="<?= htmlspecialchars($v['ubicacion']) ?>" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">Fecha de Inicio</label>
                              <input type="date" class="form-control" name="fecha_inicio" value="<?= $v['fecha_inicio'] ?>" required>
                            </div>
                            <div class="col-md-6">
                              <label class="form-label">Fecha de Fin</label>
                              <input type="date" class="form-control" name="fecha_fin" value="<?= $v['fecha_fin'] ?>" required>
                            </div>
                            <div class="col-md-12">
                              <label class="form-label">URL Imagen</label>
                              <input type="url" class="form-control" name="imagen" value="<?= htmlspecialchars($v['imagen']) ?>">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-info mt-4">
        Resgistre un nuevo voluntariado.
      </div>
    <?php endif; ?>
  </section>
</main>

   <!-- esto es una prueba  -->