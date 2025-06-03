<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - InventoryPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/dashboard-styles.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-container">
                <i class="fas fa-boxes logo-icon"></i>
                <span class="logo-text">InventoryPro</span>
            </div>
            <button class="sidebar-toggle" id="sidebarToggle">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos/index.php" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Productos</span>
                        <span class="badge">24</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categorias/index.php" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="movimientos/index.php" class="nav-link">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Movimientos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="usuarios/index.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="roles/index.php" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="reportes/index.php" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reportes</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!--contenido principañ -->
    <div class="main-content">
        <!-- navegacion superior -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link sidebar-toggle-btn" id="sidebarToggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="navbar-nav ms-auto">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="user-avatar me-2">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <span>Administrador</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="../../config/cerrarSesion.php">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- contenido del dashboard -->
        <div class="container-fluid p-4">
            <!-- seccion bievenida -->
            <div class="welcome-section mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="welcome-title">¡Bienvenido de vuelta, Administrador!</h1>
                        <p class="welcome-subtitle">Aquí tienes un resumen de tu sistema de inventario</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="date-time">
                            <div class="current-date" id="currentDate"></div>
                            <div class="current-time" id="currentTime"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tarjetas estadp -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-primary">
                        <div class="stats-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="156">0</h3>
                            <p class="stats-label">Total Productos</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12% este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-success">
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="42">0</h3>
                            <p class="stats-label">Usuarios Activos</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+8% este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-warning">
                        <div class="stats-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="8">0</h3>
                            <p class="stats-label">Stock Bajo</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-down"></i>
                                <span>-3% este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-info">
                        <div class="stats-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="234">0</h3>
                            <p class="stats-label">Movimientos Hoy</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+15% hoy</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- acciones rapids-->
            <div class="row g-4 mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="productos/crear.php" class="quick-action-btn">
                                        <i class="fas fa-plus"></i>
                                        <span>Nuevo Producto</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="usuarios/crear.php" class="quick-action-btn">
                                        <i class="fas fa-user-plus"></i>
                                        <span>Nuevo Usuario</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="movimientos/entrada.php" class="quick-action-btn">
                                        <i class="fas fa-arrow-down"></i>
                                        <span>Entrada Stock</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="movimientos/salida.php" class="quick-action-btn">
                                        <i class="fas fa-arrow-up"></i>
                                        <span>Salida Stock</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="reportes/generar.php" class="quick-action-btn">
                                        <i class="fas fa-file-alt"></i>
                                        <span>Generar Reporte</span>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6">
                                    <a href="configuracion/index.php" class="quick-action-btn">
                                        <i class="fas fa-cog"></i>
                                        <span>Configuración</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cards de gestion-->
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-primary">
                        <div class="card-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-content">
                            <h5>Gestión de Productos</h5>
                            <p>Administra tu inventario completo. Añade, edita o elimina productos del sistema.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Control de stock en tiempo real</li>
                                <li><i class="fas fa-check"></i> Gestión de imágenes</li>
                                <li><i class="fas fa-check"></i> Categorización avanzada</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="productos/index.php" class="btn btn-primary">
                                Gestionar Productos
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-success">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-content">
                            <h5>Gestión de Usuarios</h5>
                            <p>Controla el acceso al sistema. Crea, edita y gestiona permisos de usuarios.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Control de roles y permisos</li>
                                <li><i class="fas fa-check"></i> Historial de actividad</li>
                                <li><i class="fas fa-check"></i> Gestión de sesiones</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="usuarios/index.php" class="btn btn-success">
                                Gestionar Usuarios
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-warning">
                        <div class="card-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="card-content">
                            <h5>Control de Movimientos</h5>
                            <p>Registra y monitorea todas las entradas y salidas de productos del inventario.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Registro automático</li>
                                <li><i class="fas fa-check"></i> Trazabilidad completa</li>
                                <li><i class="fas fa-check"></i> Alertas de stock</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="movimientos/index.php" class="btn btn-warning">
                                Ver Movimientos
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-info">
                        <div class="card-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="card-content">
                            <h5>Gestión de Categorías</h5>
                            <p>Organiza tus productos de manera eficiente con un sistema de categorías flexible.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Categorías jerárquicas</li>
                                <li><i class="fas fa-check"></i> Filtrado avanzado</li>
                                <li><i class="fas fa-check"></i> Estadísticas por categoría</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="categorias/index.php" class="btn btn-info">
                                Gestionar Categorías
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-secondary">
                        <div class="card-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="card-content">
                            <h5>Control de Roles</h5>
                            <p>Define y gestiona los niveles de acceso para diferentes tipos de usuarios.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Permisos granulares</li>
                                <li><i class="fas fa-check"></i> Roles personalizables</li>
                                <li><i class="fas fa-check"></i> Auditoría de accesos</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="roles/index.php" class="btn btn-secondary">
                                Gestionar Roles
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="management-card card-dark">
                        <div class="card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="card-content">
                            <h5>Reportes y Análisis</h5>
                            <p>Genera reportes detallados y obtén insights valiosos sobre tu inventario.</p>
                            <ul class="feature-list">
                                <li><i class="fas fa-check"></i> Reportes personalizables</li>
                                <li><i class="fas fa-check"></i> Gráficos interactivos</li>
                                <li><i class="fas fa-check"></i> Exportación múltiple</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="reportes/index.php" class="btn btn-dark">
                                Ver Reportes
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>
