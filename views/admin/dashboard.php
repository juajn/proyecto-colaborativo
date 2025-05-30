<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Administración - Inventario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2d2a2c4f2.js" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">🛠 Panel de Administración</span>
      <span class="text-white">Bienvenido Administrador</span>
      <a href="../../config/cerrarSesion.php" class="btn btn-danger">cerrar session</a>
    </div>
  </nav>

  <div class="container my-4">
    <div class="row g-4">
      <!-- Control de Productos -->
      <div class="col-md-4">
        <div class="card border-primary">
          <div class="card-body text-center">
            <i class="fas fa-box fa-3x text-primary mb-3"></i>
            <h5 class="card-title">Gestión de Productos</h5>
            <p class="card-text">Añade, edita o elimina productos del inventario.</p>
            <a href="productos/index.php" class="btn btn-primary">Ir a Productos</a>
          </div>
        </div>
      </div>

      <!-- Control de Categorías -->
      <div class="col-md-4">
        <div class="card border-success">
          <div class="card-body text-center">
            <i class="fas fa-tags fa-3x text-success mb-3"></i>
            <h5 class="card-title">Categorías</h5>
            <p class="card-text">Administra las categorías de los productos.</p>
            <a href="categorias/index.php" class="btn btn-success">Ir a Categorías</a>
          </div>
        </div>
      </div>

      <!-- Control de Movimientos -->
      <div class="col-md-4">
        <div class="card border-warning">
          <div class="card-body text-center">
            <i class="fas fa-exchange-alt fa-3x text-warning mb-3"></i>
            <h5 class="card-title">Movimientos</h5>
            <p class="card-text">Registra entradas y salidas de productos.</p>
            <a href="movimientos/index.php" class="btn btn-warning">Ver Movimientos</a>
          </div>
        </div>
      </div>

      <!-- Control de Usuarios -->
      <div class="col-md-6">
        <div class="card border-info">
          <div class="card-body text-center">
            <i class="fas fa-users fa-3x text-info mb-3"></i>
            <h5 class="card-title">Gestión de Usuarios</h5>
            <p class="card-text">Crea, edita y elimina usuarios del sistema.</p>
            <a href="usuarios/index.php" class="btn btn-info">Ir a Usuarios</a>
          </div>
        </div>
      </div>

      <!-- Control de Roles -->
      <div class="col-md-6">
        <div class="card border-secondary">
          <div class="card-body text-center">
            <i class="fas fa-user-shield fa-3x text-secondary mb-3"></i>
            <h5 class="card-title">Roles</h5>
            <p class="card-text">Gestiona los roles de acceso para cada usuario.</p>
            <a href="roles/index.php" class="btn btn-secondary">Ir a Roles</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center mt-5 mb-3 text-muted">
    &copy; 2025 Sistema de Inventario - Proyecto Final
  </footer>
</body>
</html>
