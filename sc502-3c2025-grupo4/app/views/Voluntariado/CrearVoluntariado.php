<h1>Crear Voluntariado</h1>
<form class="row g-3">
  <div class="col-md-6">
    <label for="inputNombre" class="form-label">Nombre del Voluntariado</label>
    <input type="text" class="form-control" id="inputNombre" placeholder="Ejemplo: Ayuda Comunitaria">
  </div>
  <div class="col-md-6">
    <label for="inputDescripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="inputDescripcion" rows="3" placeholder="Breve descripción del voluntariado"></textarea>
  </div>
  <div class="col-12">
    <label for="inputDireccion" class="form-label">Dirección</label>
    <input type="text" class="form-control" id="inputDireccion" placeholder="Ejemplo: Calle 123, Ciudad">
  </div>
  <div class="col-md-6">
    <label for="inputCiudad" class="form-label">Ciudad</label>
    <input type="text" class="form-control" id="inputCiudad" placeholder="Ejemplo: Tibas">
  </div>
  <div class="col-md-4">
    <label for="inputEstado" class="form-label">Estado/Provincia</label>
    <select id="inputEstado" class="form-select">
      <option selected>Seleccione...</option>
      <option>San jose</option>
      <option>Limon</option>
      <option>Puntarenas</option>
      <option>Cartago</option>
      <option>Heredia</option>
      <option>Guanacaste</option>
      <option>Alajuela</option> 
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputCodigoPostal" class="form-label">Código Postal</label>
    <input type="text" class="form-control" id="inputCodigoPostal" placeholder="Ejemplo: 70101">
  </div><div class="mb-3">
  <label for="formFile" class="form-label">Agregar imagen</label>
  <input class="form-control" type="file" id="formFile">
</div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Acepto los términos y condiciones
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Agregar Voluntariado</button>
  </div>
</form>