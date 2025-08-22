<?php include_once 'layout/header.php'; ?>

<section class="hero-section">
  <h1 class="hero-title">Sistema de Registro PHP</h1>
  <p class="hero-subtitle">Un proyecto académico moderno y minimalista para gestionar registros de personas.</p>
  <a href="#registro" class="hero-btn">Comenzar</a>
</section>

<section class="container my-5">
  <h2 class="section-title">¿Qué puedes hacer?</h2>
  <div class="row g-4 justify-content-center">
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <i class="bi bi-person-plus display-4 mb-3"></i>
        <h3 class="mb-2">Registrar Personas</h3>
        <p>Agrega nuevos usuarios de forma sencilla y rápida.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <i class="bi bi-table display-4 mb-3"></i>
        <h3 class="mb-2">Ver Registros</h3>
        <p>Consulta y administra los datos registrados en una tabla clara.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
          <i class="bi bi-easel display-4 mb-3"></i>
  <h3 class="mb-2">Visual y Minimalista</h3>
  <p>Diseño claro y atractivo para una experiencia de usuario agradable.</p>
      </div>
    </div>
  </div>
</section>

<section id="registro" class="container my-5 position-relative">
  <h2 class="section-title">Registro de Persona</h2>
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card p-4 register-card">
        <h3 class="mb-3 text-center fw-bold">Registrar</h3>
        <p class="mb-4 text-center" style="color:var(--mint-dark);">Completa el formulario para registrarte en el sistema.</p>
        <form action="Controller/Registro.php" method="POST">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Documento" name="id" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Correo" name="correo" required>
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Edad" name="edad" pattern="[0-9]{1,3}" maxlength="3" required>
            </div>
            <div class="mb-4">
              <input type="text" class="form-control" placeholder="Teléfono" name="tel" required>
            </div>
            <button class="btn btn-success w-100 fw-bold" type="submit">
              <i class="bi bi-person-check"></i> Registrarse
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- Botón para mostrar registros -->
    <div style="position: absolute; right: 15px; bottom: 15px; z-index: 10;">
      <button id="fabRegistros" type="button" class="btn btn-info fab-registros fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-table"></i> Mostrar registros
      </button>
    </div>
  </section>

  <!-- Modal para mostrar registros -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-table"></i> Lista de Personas Registradas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <table class="table table-custom align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Cargar conexión y obtener datos
              include_once "Controller/Conexion.php";
              $conexion = new Conexion();
              $conexion = $conexion->conectar();
              
              if ($conexion) {
                // Consulta para obtener registros (alias corrigen el uso de claves en PHP)
                $sql = "SELECT 
                          id AS Id, 
                          nombre AS Nombre, 
                          apellido AS Apellido, 
                          edad AS Edad, 
                          correo AS Correo, 
                          telefono AS Telefono
                        FROM registropersonas";
                $consulta = $conexion->prepare($sql);
                $consulta->execute();
                $i = 0;
                
                // Mostrar cada registro en la tabla
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                  $i += 1;
              ?>
              <tr>
                <td>
                  <?php echo $i; ?>
                </td>
                <td><?php echo htmlspecialchars($fila["Nombre"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Apellido"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Edad"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Correo"]); ?></td>
                <td><?php echo htmlspecialchars($fila["Telefono"]); ?></td>
                <td>
                  <a href="Update.php?id=<?php echo $fila['Id']; ?>" class="btn btn-success btn-sm" title="Editar">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                </td>
                <td>
                  <form action="Controller/DeleteController.php" method="POST" class="d-inline delete-form">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($fila['Id']); ?>">
                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
              <?php
                }
              } else {
                echo '<tr><td colspan="8" class="text-center text-danger">No existe la conexión</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button id="modalClose" type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
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

  <!-- Modal de confirmación de eliminación -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="confirmDeleteLabel"><i class="bi bi-trash"></i> Confirmar eliminación</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <p id="deleteModalText" class="mb-0">¿Eliminar el registro? Esta acción no se puede deshacer.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn"><i class="bi bi-trash"></i> Eliminar</button>
        </div>
      </div>
    </div>
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
    if (params.get('success') === '1') {
      const toast = new bootstrap.Toast(document.getElementById('registroToast'));
      document.querySelector('#registroToast .toast-body').innerHTML = 
        '<i class="bi bi-check-circle-fill"></i> Registro exitoso';
      toast.show();
    }
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

  <!-- Pie de página -->
<?php include_once 'layout/footer.php'; ?>