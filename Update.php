<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php?mensaje=NoID");
    exit;
}
$id = $_GET['id'];
include_once "Controller/Conexion.php";
$conexion = (new Conexion())->conectar();
if (!$conexion) {
    header("Location: index.php?mensaje=SinConexion");
    exit;
}
$sql = "SELECT id AS Id, nombre AS Nombre, apellido AS Apellido, edad AS Edad, correo AS Correo, telefono AS Telefono FROM registropersonas WHERE id = :id";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(':id', $id);
$consulta->execute();
if ($consulta->rowCount() == 0) {
    header("Location: index.php?mensaje=NoExiste");
    exit;
}
$registro = $consulta->fetch(PDO::FETCH_ASSOC);
include_once 'layout/header.php'; ?>

<section class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card p-4 register-card">
        <h3 class="mb-3 text-center fw-bold">
          <i class="bi bi-pencil-square me-2"></i>Editar Registro
        </h3>
        <p class="mb-4 text-center" style="color:var(--mint-dark);">
          Modifica los datos del registro seleccionado.
        </p>
            <!-- Formulario de edición -->
            <form action="Controller/UpdateController.php" method="POST">
              <!-- Campo oculto para el ID -->
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($registro['Id']); ?>">
              
              <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" 
                       value="<?php echo htmlspecialchars($registro['Nombre']); ?>" required>
              </div>
              
              <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" 
                       value="<?php echo htmlspecialchars($registro['Apellido']); ?>" required>
              </div>
              
              <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" 
                       value="<?php echo htmlspecialchars($registro['Edad']); ?>" 
                       pattern="[0-9]{1,3}" maxlength="3" required>
              </div>
              
              <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" 
                       value="<?php echo htmlspecialchars($registro['Correo']); ?>" required>
              </div>
              
              <div class="mb-4">
                <label for="tel" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="tel" name="tel" 
                       value="<?php echo htmlspecialchars($registro['Telefono']); ?>" required>
              </div>
              
              <div class="d-flex gap-2">
                <button class="btn btn-success flex-grow-1 fw-bold" type="submit">
                  <i class="bi bi-save"></i> Guardar Cambios
                </button>
                <a href="index.php" class="btn btn-secondary fw-bold">
                  <i class="bi bi-x-circle"></i> Cancelar
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Toast de notificación de registro exitoso -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
    <div id="registroToast" class="toast align-items-center registro-toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          <i class="bi bi-check-circle-fill"></i> Registro exitoso
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
      </div>
    </div>
  </div>

  <script>
  window.addEventListener('DOMContentLoaded', function() {
    const params = new URLSearchParams(window.location.search);
    if (params.get('success') === '2') {
      const toast = new bootstrap.Toast(document.getElementById('registroToast'));
      document.querySelector('#registroToast .toast-body').innerHTML = 
        '<i class="bi bi-check-circle-fill"></i> Registro actualizado correctamente';
      toast.show();
    }
    if (params.get('success') === '3') {
      const toast = new bootstrap.Toast(document.getElementById('registroToast'));
      document.querySelector('#registroToast .toast-body').innerHTML = 
        '<i class="bi bi-check-circle-fill"></i> Registro eliminado correctamente';
      toast.show();
    }
    // Limpiar parámetros de URL
    if (params.has('success')) {
      params.delete('success');
      const newUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
      window.history.replaceState({}, '', newUrl);
    }
  });
  </script>

<?php include_once 'layout/footer.php'; ?>