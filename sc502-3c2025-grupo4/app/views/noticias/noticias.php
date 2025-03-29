<?php include '../../partials/head.php'; ?>
<?php include '../../partials/navbar.php'; ?>
<main>
    <section>
      <br />
      <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Últimas Noticias</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Crear noticia
        </button>
    </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Noticia</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="tituloNoticia" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="tituloNoticia">
              </div>
              <div class="mb-3">
                <label for="textoNoticia" class="form-label">Redacción</label>
                <textarea class="form-control" id="textoNoticia" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Añadir Imagen</label>
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3 w-100">
        <div class="row g-0">
          <div class="col-md-4">
            <img
              src="https://www.universia.net/content/dam/universia/imagenes/2021/10/beneficios%20del%20voluntariado.jpg"
              class="img-fluid rounded-start h-100 w-100" alt="..." />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><b>Interes en voluntariados</b></h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipiscing elit ad,
                tellus fermentum augue dignissim nulla placerat bibendum
                potenti morbi, sapien tempor torquent ligula malesuada
                interdum at. Phasellus ultrices facilisi magnis vulputate
                aptent vivamus at, nisl egestas fames quisque primis. Diam
                tortor duis laoreet facilisis sagittis hendrerit cursus
                feugiat fames, tempus sed lacus netus sociis penatibus platea
                commodo, bibendum ligula mollis justo senectus vestibulum
                inceptos vel. Augue mi mattis convallis viverra quam rutrum
                rhoncus integer libero vivamus tincidunt molestie lacinia
                vestibulum, ligula hendrerit montes fusce aliquet ornare nibh
                felis semper habitasse phasellus pretium.
              </p>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipiscing elit ad,
                tellus fermentum augue dignissim nulla placerat bibendum
                potenti morbi, sapien tempor torquent ligula malesuada
                interdum at. Phasellus ultrices facilisi magnis vulputate
                aptent vivamus at, nisl egestas fames quisque primis. Diam
                tortor duis laoreet facilisis sagittis hendrerit cursus
                feugiat fames, tempus sed lacus netus sociis penatibus platea
                commodo, bibendum ligula mollis justo senectus vestibulum
                inceptos vel. Augue mi mattis convallis viverra quam rutrum
                rhoncus integer libero vivamus tincidunt molestie lacinia
                vestibulum, ligula hendrerit montes fusce aliquet ornare nibh
                felis semper habitasse phasellus pretium.
              </p>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                  Editar
                </button>
                <button class="btn btn-danger" type="button">Eliminar</button>
              </div>

              <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Noticia</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="tituloNoticia" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="tituloNoticia" value="Interes en voluntariados">
                      </div>
                      <div class="mb-3">
                        <label for="textoNoticia" class="form-label">Redacción</label>
                        <textarea class="form-control" id="textoNoticia"
                          rows="3">Lorem ipsum dolor sit amet consectetur adipiscing elit ad, tellus fermentum augue dignissim nulla placerat bibendum potenti morbi, sapien tempor torquent ligula malesuada interdum at. Phasellus ultrices facilisi magnis vulputate aptent vivamus at, nisl egestas fames quisque primis.</textarea>
                      </div>
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Cambiar Imagen</label>
                        <input class="form-control" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />

      <div class="card mb-3 w-100">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://www.ucr.ac.cr/medios/fotos/2021/dsc_6126_web619ff2b49b764.jpg"
              class="img-fluid rounded-start h-100 w-100" alt="..." />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">
                <b>Crecimiento de los voluntariados</b>
              </h5>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipiscing elit ad,
                tellus fermentum augue dignissim nulla placerat bibendum
                potenti morbi, sapien tempor torquent ligula malesuada
                interdum at. Phasellus ultrices facilisi magnis vulputate
                aptent vivamus at, nisl egestas fames quisque primis. Diam
                tortor duis laoreet facilisis sagittis hendrerit cursus
                feugiat fames, tempus sed lacus netus sociis penatibus platea
                commodo, bibendum ligula mollis justo senectus vestibulum
                inceptos vel. Augue mi mattis convallis viverra quam rutrum
                rhoncus integer libero vivamus tincidunt molestie lacinia
                vestibulum, ligula hendrerit montes fusce aliquet ornare nibh
                felis semper habitasse phasellus pretium.
              </p>
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipiscing elit ad,
                tellus fermentum augue dignissim nulla placerat bibendum
                potenti morbi, sapien tempor torquent ligula malesuada
                interdum at. Phasellus ultrices facilisi magnis vulputate
                aptent vivamus at, nisl egestas fames quisque primis. Diam
                tortor duis laoreet facilisis sagittis hendrerit cursus
                feugiat fames, tempus sed lacus netus sociis penatibus platea
                commodo, bibendum ligula mollis justo senectus vestibulum
                inceptos vel. Augue mi mattis convallis viverra quam rutrum
                rhoncus integer libero vivamus tincidunt molestie lacinia
                vestibulum, ligula hendrerit montes fusce aliquet ornare nibh
                felis semper habitasse phasellus pretium.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include '../../partials/footer.php'; ?>