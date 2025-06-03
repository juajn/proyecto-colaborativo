<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil - InventoryPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/usuario-styles.css">
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
        
        <div class="user-profile-mini">
            <div class="user-avatar">
                <i class="fas fa-user-circle"></i>
            </div>
            <div class="user-info">
                <h6 class="user-name"><?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?></h6>
                <span class="user-role">Usuario Estándar</span>
            </div>
        </div>
        
        <nav class="sidebar-nav">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="productos.php" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Productos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="categorias.php" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="historial.php" class="nav-link">
                        <i class="fas fa-history"></i>
                        <span>Historial</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="usuario-perfil.php" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>Mi Perfil</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../config/cerrarSesion.php" class="nav-link text-danger">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- contenido principal-->
    <div class="main-content">
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
                            <span><?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="usuario-perfil.php"><i class="fas fa-user me-2"></i>Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="configuracion.php"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="../../config/cerrarSesion.php">
                                <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- perfil contenido -->
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mi Perfil</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-4 mb-4">
                    <div class="card profile-sidebar">
                        <div class="card-body text-center">
                            <div class="profile-avatar-container">
                                <div class="profile-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <button class="btn btn-sm btn-light rounded-circle avatar-edit-btn" title="Cambiar foto">
                                    <i class="fas fa-camera"></i>
                                </button>
                            </div>
                            
                            <h4 class="profile-name mt-3"><?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?></h4>
                            <p class="profile-role">Usuario Estándar</p>
                            
                            <div class="profile-stats">
                                <div class="stat-item">
                                    <div class="stat-value">12</div>
                                    <div class="stat-label">Favoritos</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">45</div>
                                    <div class="stat-label">Vistas</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">3</div>
                                    <div class="stat-label">Meses</div>
                                </div>
                            </div>
                            
                            <div class="profile-contact mt-3">
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span><?= htmlspecialchars($usuario['email'] ?? 'usuario@ejemplo.com') ?></span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span><?= htmlspecialchars($usuario['telefono'] ?? 'No especificado') ?></span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span><?= htmlspecialchars($usuario['ubicacion'] ?? 'No especificada') ?></span>
                                </div>
                            </div>
                            
                            <div class="profile-actions mt-4">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                    <i class="fas fa-edit me-2"></i>Editar Perfil
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-star me-2"></i>Productos Favoritos</h5>
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="favorite-product-img me-3">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Producto 1">
                                    </div>
                                    <div class="favorite-product-info">
                                        <h6 class="mb-0">Laptop HP Pavilion</h6>
                                        <small class="text-muted">$1,299.99</small>
                                    </div>
                                    <button class="btn btn-sm btn-link text-danger ms-auto">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="favorite-product-img me-3">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Producto 2">
                                    </div>
                                    <div class="favorite-product-info">
                                        <h6 class="mb-0">Monitor Samsung 24"</h6>
                                        <small class="text-muted">$249.99</small>
                                    </div>
                                    <button class="btn btn-sm btn-link text-danger ms-auto">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </li>
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="favorite-product-img me-3">
                                        <img src="/placeholder.svg?height=40&width=40" alt="Producto 3">
                                    </div>
                                    <div class="favorite-product-info">
                                        <h6 class="mb-0">Teclado Mecánico RGB</h6>
                                        <small class="text-muted">$89.99</small>
                                    </div>
                                    <button class="btn btn-sm btn-link text-danger ms-auto">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="#" class="btn btn-sm btn-link">Ver todos los favoritos</a>
                        </div>
                    </div>
                </div>
                
                <!-- perfil contnido -->
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">
                                        <i class="fas fa-info-circle me-2"></i>Información
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">
                                        <i class="fas fa-shield-alt me-2"></i>Seguridad
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">
                                        <i class="fas fa-history me-2"></i>Actividad
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="preferences-tab" data-bs-toggle="tab" data-bs-target="#preferences" type="button" role="tab" aria-controls="preferences" aria-selected="false">
                                        <i class="fas fa-cog me-2"></i>Preferencias
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="profileTabsContent">
                                <!-- Info  -->
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <h5 class="card-title">Información Personal</h5>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Nombre Completo</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Correo Electrónico</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['email'] ?? 'usuario@ejemplo.com') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Teléfono</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['telefono'] ?? 'No especificado') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Ubicación</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['ubicacion'] ?? 'No especificada') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Fecha de Registro</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['fecha_registro'] ?? date('d/m/Y')) ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Último Acceso</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['ultimo_acceso'] ?? date('d/m/Y H:i:s')) ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <h5 class="card-title mt-5">Información Adicional</h5>
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Departamento</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['departamento'] ?? 'No especificado') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-info-item">
                                                <div class="info-label">Cargo</div>
                                                <div class="info-value"><?= htmlspecialchars($usuario['cargo'] ?? 'No especificado') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <div class="profile-info-item">
                                                <div class="info-label">Biografía</div>
                                                <div class="info-value">
                                                    <?= htmlspecialchars($usuario['biografia'] ?? 'No hay información biográfica disponible.') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Seguridad -->
                                <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                                    <h5 class="card-title">Seguridad de la Cuenta</h5>
                                    
                                    <div class="security-section mt-4">
                                        <h6 class="security-title">Cambiar Contraseña</h6>
                                        <form id="passwordChangeForm">
                                            <div class="mb-3">
                                                <label for="currentPassword" class="form-label">Contraseña Actual</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="currentPassword" required>
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="newPassword" class="form-label">Nueva Contraseña</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="newPassword" required>
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="password-strength mt-2">
                                                    <div class="strength-bar">
                                                        <div class="strength-fill"></div>
                                                    </div>
                                                    <small class="strength-text">Fortaleza de la contraseña</small>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="confirmPassword" required>
                                                    <button class="btn btn-outline-secondary toggle-password" type="button">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-key me-2"></i>Cambiar Contraseña
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <div class="security-section mt-5">
                                        <h6 class="security-title">Sesiones Activas</h6>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Dispositivo</th>
                                                        <th>Ubicación</th>
                                                        <th>Última Actividad</th>
                                                        <th>Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <i class="fas fa-laptop me-2"></i>
                                                                <div>
                                                                    <div>Windows 10 - Chrome</div>
                                                                    <small class="text-success">Sesión Actual</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Santiago, Chile</td>
                                                        <td>Ahora</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <i class="fas fa-mobile-alt me-2"></i>
                                                                <div>
                                                                    <div>iPhone - Safari</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Santiago, Chile</td>
                                                        <td>Hace 2 días</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-outline-danger">
                                                                <i class="fas fa-sign-out-alt me-1"></i>Cerrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Actividad Tab -->
                                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                                    <h5 class="card-title">Historial de Actividad</h5>
                                    
                                    <div class="activity-filters d-flex align-items-center mb-4 mt-3">
                                        <div class="me-3">
                                            <select class="form-select form-select-sm">
                                                <option value="all">Todas las actividades</option>
                                                <option value="login">Inicios de sesión</option>
                                                <option value="view">Vistas de productos</option>
                                                <option value="favorite">Favoritos</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-filter me-1"></i>Filtrar
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="activity-timeline">
                                        <div class="activity-item">
                                            <div class="activity-icon bg-primary">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </div>
                                            <div class="activity-content">
                                                <div class="activity-title">Inicio de Sesión</div>
                                                <div class="activity-details">Has iniciado sesión desde Chrome en Windows</div>
                                                <div class="activity-time">Hoy, 10:15 AM</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item">
                                            <div class="activity-icon bg-info">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                            <div class="activity-content">
                                                <div class="activity-title">Producto Visto</div>
                                                <div class="activity-details">Has visto el producto "Laptop HP Pavilion"</div>
                                                <div class="activity-time">Hoy, 09:45 AM</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item">
                                            <div class="activity-icon bg-warning">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="activity-content">
                                                <div class="activity-title">Producto Añadido a Favoritos</div>
                                                <div class="activity-details">Has añadido "Monitor Samsung 24"" a tus favoritos</div>
                                                <div class="activity-time">Ayer, 15:30 PM</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item">
                                            <div class="activity-icon bg-primary">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </div>
                                            <div class="activity-content">
                                                <div class="activity-title">Inicio de Sesión</div>
                                                <div class="activity-details">Has iniciado sesión desde Safari en iPhone</div>
                                                <div class="activity-time">Ayer, 09:10 AM</div>
                                            </div>
                                        </div>
                                        
                                        <div class="activity-item">
                                            <div class="activity-icon bg-info">
                                                <i class="fas fa-eye"></i>
                                            </div>
                                            <div class="activity-content">
                                                <div class="activity-title">Producto Visto</div>
                                                <div class="activity-details">Has visto el producto "Teclado Mecánico RGB"</div>
                                                <div class="activity-time">15/05/2025, 14:20 PM</div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center mt-4">
                                        <button class="btn btn-outline-primary">
                                            <i class="fas fa-sync-alt me-2"></i>Cargar Más
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- preferencias  -->
                                <div class="tab-pane fade" id="preferences" role="tabpanel" aria-labelledby="preferences-tab">
                                    <h5 class="card-title">Preferencias de Usuario</h5>
                                    
                                    <div class="preferences-section mt-4">
                                        <h6 class="preferences-title">Notificaciones</h6>
                                        
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                            <label class="form-check-label" for="emailNotifications">
                                                Recibir notificaciones por correo electrónico
                                            </label>
                                            <div class="form-text">Te enviaremos correos sobre actualizaciones importantes del sistema.</div>
                                        </div>
                                        
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="productUpdates" checked>
                                            <label class="form-check-label" for="productUpdates">
                                                Actualizaciones de productos
                                            </label>
                                            <div class="form-text">Recibe notificaciones cuando se actualicen productos que has visto.</div>
                                        </div>
                                        
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="securityAlerts" checked>
                                            <label class="form-check-label" for="securityAlerts">
                                                Alertas de seguridad
                                            </label>
                                            <div class="form-text">Recibe alertas sobre actividades sospechosas en tu cuenta.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="preferences-section mt-5">
                                        <h6 class="preferences-title">Visualización</h6>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Vista predeterminada de productos</label>
                                            <div class="btn-group" role="group">
                                                <input type="radio" class="btn-check" name="viewType" id="tableView" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary" for="tableView">
                                                    <i class="fas fa-list me-1"></i>Tabla
                                                </label>
                                                
                                                <input type="radio" class="btn-check" name="viewType" id="gridView" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="gridView">
                                                    <i class="fas fa-th-large me-1"></i>Cuadrícula
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="itemsPerPage" class="form-label">Elementos por página</label>
                                            <select class="form-select" id="itemsPerPage">
                                                <option value="10">10</option>
                                                <option value="25" selected>25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="preferences-section mt-5">
                                        <h6 class="preferences-title">Idioma y Región</h6>
                                        
                                        <div class="mb-3">
                                            <label for="language" class="form-label">Idioma</label>
                                            <select class="form-select" id="language">
                                                <option value="es" selected>Español</option>
                                                <option value="en">English</option>
                                                <option value="pt">Português</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="dateFormat" class="form-label">Formato de fecha</label>
                                            <select class="form-select" id="dateFormat">
                                                <option value="dd/mm/yyyy" selected>DD/MM/AAAA</option>
                                                <option value="mm/dd/yyyy">MM/DD/AAAA</option>
                                                <option value="yyyy-mm-dd">AAAA-MM-DD</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="text-end mt-4">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-save me-2"></i>Guardar Preferencias
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Perfil -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editName" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="editName" value="<?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="editEmail" class="form-label">Correo Electrónico</label>
                                <input type="email" class="form-control" id="editEmail" value="<?= htmlspecialchars($usuario['email'] ?? 'usuario@ejemplo.com') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editPhone" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="editPhone" value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="editLocation" class="form-label">Ubicación</label>
                                <input type="text" class="form-control" id="editLocation" value="<?= htmlspecialchars($usuario['ubicacion'] ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="editDepartment" class="form-label">Departamento</label>
                                <input type="text" class="form-control" id="editDepartment" value="<?= htmlspecialchars($usuario['departamento'] ?? '') ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="editPosition" class="form-label">Cargo</label>
                                <input type="text" class="form-control" id="editPosition" value="<?= htmlspecialchars($usuario['cargo'] ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="editBio" class="form-label">Biografía</label>
                            <textarea class="form-control" id="editBio" rows="4"><?= htmlspecialchars($usuario['biografia'] ?? '') ?></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveProfileBtn">
                        <i class="fas fa-save me-2"></i>Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/usuario.js"></script>
    <script src="../../assets/js/perfil.js"></script>
</body>
</html>
