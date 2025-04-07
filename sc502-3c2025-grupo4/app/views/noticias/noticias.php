<main>
  <section class="container mt-4" style= "max-width: 98%;">
    <div class="d-flex justify-content-between align-items-center">
      <h1 class="mb-0">Últimas Noticias</h1>
      <?php if (isset($_SESSION['roles']) && (in_array('admin', $_SESSION['roles']) || in_array('fundacion', $_SESSION['roles']))): ?>      
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrear">
        Crear noticia
      </button>
      <?php endif; ?>
    </div>

    
    <div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="modalCrearLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="../../app/controllers/noticiaController.php" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="modalCrearLabel">Nueva Noticia</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="accion" value="crear">
              <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" required>
              </div>
              <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" name="contenido" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="imagenes" class="form-label">URL de Imagen</label>
                <input type="text" class="form-control" name="imagenes">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>


<?php if (!empty($noticias) && is_array($noticias)): ?>
  <?php foreach ($noticias as $n): ?>
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="<?= htmlspecialchars($n['imagenes']) ?>" class="img-fluid rounded-start h-100 w-100" alt="Imagen">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><b><?= htmlspecialchars($n['titulo']) ?></b></h5>
            <p class="card-text"><?= nl2br(htmlspecialchars($n['contenido'])) ?></p>
            <p class="card-text"><small class="text-muted">Publicado el: <?= date("d/m/Y", strtotime($n['fecha_publicacion']))?> por <?= htmlspecialchars($n['nombre_autor']) ?></small></p>

            </small></p>
            <?php if (isset($_SESSION['roles']) && is_array($_SESSION['roles']) && in_array('admin', $_SESSION['roles'])): ?>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar<?= $n['id_noticia'] ?>">
                Editar
              </button>
              <form method="POST" action="../../app/controllers/noticiaController.php">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id_noticia" value="<?= $n['id_noticia'] ?>">
                <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>
            </div>
            <?php endif; ?>

            <div class="modal fade" id="modalEditar<?= $n['id_noticia'] ?>" tabindex="-1" aria-labelledby="modalEditarLabel<?= $n['id_noticia'] ?>" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="../../app/controllers/noticiaController.php" method="POST">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalEditarLabel<?= $n['id_noticia'] ?>">Editar Noticia</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="accion" value="editar">
                      <input type="hidden" name="id_noticia" value="<?= $n['id_noticia'] ?>">
                      <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" class="form-control" name="titulo" value="<?= htmlspecialchars($n['titulo']) ?>">
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Contenido</label>
                        <textarea class="form-control" name="contenido" rows="3"><?= htmlspecialchars($n['contenido']) ?></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">URL Imagen</label>
                        <input type="text" class="form-control" name="imagenes" value="<?= htmlspecialchars($n['imagenes']) ?>">
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
    No hay noticias registradas aún.
  </div>
<?php endif; ?>
  </section>
</main>