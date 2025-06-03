<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Historial - InventoryPro</title>
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
                <h6 class="user-name">Usuario</h6>
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
                <li class="nav-item active">
                    <a href="historial.php" class="nav-link">
                        <i class="fas fa-history"></i>
                        <span>Historial</span>
                    </a>
                </li>
                <li class="nav-item">
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
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
                            <span>Usuario</span>
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

        <!-- Page Content -->
        <div class="container-fluid p-4">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mi Historial</li>
                </ol>
            </nav>

            <!-- Welcome Section -->
            <div class="welcome-section mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="welcome-title">
                            <i class="fas fa-history me-3"></i>Mi Historial de Actividades
                        </h1>
                        <p class="welcome-subtitle">Revisa todas tus actividades y transacciones recientes</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="date-time">
                            <div class="current-date" id="currentDate"></div>
                            <div class="current-time" id="currentTime"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Summary -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="activity-summary-card bg-primary">
                        <div class="activity-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-number" data-target="156">0</h3>
                            <p class="activity-label">Productos Vistos</p>
                            <div class="activity-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12% esta semana</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="activity-summary-card bg-success">
                        <div class="activity-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-number" data-target="89">0</h3>
                            <p class="activity-label">Búsquedas Realizadas</p>
                            <div class="activity-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+8% esta semana</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="activity-summary-card bg-warning">
                        <div class="activity-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-number" data-target="23">0</h3>
                            <p class="activity-label">Categorías Exploradas</p>
                            <div class="activity-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+5% esta semana</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="activity-summary-card bg-info">
                        <div class="activity-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="activity-content">
                            <h3 class="activity-number" data-target="45">0</h3>
                            <p class="activity-label">Horas de Actividad</p>
                            <div class="activity-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+15% esta semana</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Activity Timeline -->
                <div class="col-lg-8">
                    <!-- Filters -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="filters-container">
                                        <div class="filter-group">
                                            <label class="filter-label">Buscar:</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                                <input type="text" class="form-control" id="searchHistory" placeholder="Buscar en historial...">
                                            </div>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Tipo:</label>
                                            <select class="form-select" id="activityTypeFilter">
                                                <option value="">Todas</option>
                                                <option value="view">Visualización</option>
                                                <option value="search">Búsqueda</option>
                                                <option value="category">Categoría</option>
                                                <option value="login">Inicio de Sesión</option>
                                            </select>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Período:</label>
                                            <select class="form-select" id="periodFilter">
                                                <option value="">Todo</option>
                                                <option value="today">Hoy</option>
                                                <option value="week">Esta semana</option>
                                                <option value="month">Este mes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <button class="btn btn-outline-primary" id="exportHistory">
                                        <i class="fas fa-download me-2"></i>Exportar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-timeline me-2"></i>Línea de Tiempo de Actividades
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-timeline" id="activityTimeline">
                                <div class="timeline-item" data-type="view" data-date="2025-06-03">
                                    <div class="timeline-icon bg-primary">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Producto Visualizado</h6>
                                            <span class="timeline-time">Hace 5 minutos</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Has visto el producto <strong>Laptop HP Pavilion 15</strong></p>
                                            <div class="timeline-meta">
                                                <span class="badge bg-light text-dark">Electrónica</span>
                                                <span class="text-muted">• Duración: 2 min 30 seg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item" data-type="search" data-date="2025-06-03">
                                    <div class="timeline-icon bg-success">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Búsqueda Realizada</h6>
                                            <span class="timeline-time">Hace 15 minutos</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Búsqueda: <strong>"laptop gaming"</strong></p>
                                            <div class="timeline-meta">
                                                <span class="text-muted">• 12 resultados encontrados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item" data-type="category" data-date="2025-06-03">
                                    <div class="timeline-icon bg-warning">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Categoría Explorada</h6>
                                            <span class="timeline-time">Hace 30 minutos</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Has explorado la categoría <strong>Electrónica</strong></p>
                                            <div class="timeline-meta">
                                                <span class="badge bg-info">45 productos</span>
                                                <span class="text-muted">• Tiempo en categoría: 5 min</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item" data-type="view" data-date="2025-06-03">
                                    <div class="timeline-icon bg-primary">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Producto Visualizado</h6>
                                            <span class="timeline-time">Hace 1 hora</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Has visto el producto <strong>Monitor Samsung 24" 4K</strong></p>
                                            <div class="timeline-meta">
                                                <span class="badge bg-light text-dark">Electrónica</span>
                                                <span class="text-muted">• Duración: 1 min 45 seg</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item" data-type="login" data-date="2025-06-03">
                                    <div class="timeline-icon bg-info">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Inicio de Sesión</h6>
                                            <span class="timeline-time">Hace 2 horas</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Has iniciado sesión en el sistema</p>
                                            <div class="timeline-meta">
                                                <span class="text-muted">• IP: 192.168.1.100</span>
                                                <span class="text-muted">• Navegador: Chrome</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="timeline-item" data-type="search" data-date="2025-06-02">
                                    <div class="timeline-icon bg-success">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-header">
                                            <h6 class="timeline-title">Búsqueda Realizada</h6>
                                            <span class="timeline-time">Ayer, 16:30</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>Búsqueda: <strong>"silla oficina"</strong></p>
                                            <div class="timeline-meta">
                                                <span class="text-muted">• 8 resultados encontrados</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Load More Button -->
                            <div class="text-center mt-4">
                                <button class="btn btn-outline-primary" id="loadMoreHistory">
                                    <i class="fas fa-plus me-2"></i>Cargar Más Actividades
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Activity Stats -->
                <div class="col-lg-4">
                    <!-- Most Viewed Categories -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-chart-pie me-2"></i>Categorías Más Vistas
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="category-stat-item">
                                <div class="category-stat-info">
                                    <div class="category-stat-icon bg-info">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <div class="category-stat-details">
                                        <h6>Electrónica</h6>
                                        <small class="text-muted">45 visualizaciones</small>
                                    </div>
                                </div>
                                <div class="category-stat-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 85%"></div>
                                    </div>
                                    <span class="progress-text">85%</span>
                                </div>
                            </div>

                            <div class="category-stat-item">
                                <div class="category-stat-info">
                                    <div class="category-stat-icon bg-success">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="category-stat-details">
                                        <h6>Hogar</h6>
                                        <small class="text-muted">32 visualizaciones</small>
                                    </div>
                                </div>
                                <div class="category-stat-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                    <span class="progress-text">60%</span>
                                </div>
                            </div>

                            <div class="category-stat-item">
                                <div class="category-stat-info">
                                    <div class="category-stat-icon bg-warning">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="category-stat-details">
                                        <h6>Oficina</h6>
                                        <small class="text-muted">28 visualizaciones</small>
                                    </div>
                                </div>
                                <div class="category-stat-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-text">50%</span>
                                </div>
                            </div>

                            <div class="category-stat-item">
                                <div class="category-stat-info">
                                    <div class="category-stat-icon bg-danger">
                                        <i class="fas fa-dumbbell"></i>
                                    </div>
                                    <div class="category-stat-details">
                                        <h6>Deportes</h6>
                                        <small class="text-muted">18 visualizaciones</small>
                                    </div>
                                </div>
                                <div class="category-stat-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" style="width: 35%"></div>
                                    </div>
                                    <span class="progress-text">35%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Searches -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-search me-2"></i>Búsquedas Recientes
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="recent-search-list">
                                <div class="recent-search-item">
                                    <div class="search-term">
                                        <i class="fas fa-search text-muted me-2"></i>
                                        <span>laptop gaming</span>
                                    </div>
                                    <div class="search-meta">
                                        <small class="text-muted">12 resultados • Hace 15 min</small>
                                    </div>
                                </div>

                                <div class="recent-search-item">
                                    <div class="search-term">
                                        <i class="fas fa-search text-muted me-2"></i>
                                        <span>silla oficina</span>
                                    </div>
                                    <div class="search-meta">
                                        <small class="text-muted">8 resultados • Ayer</small>
                                    </div>
                                </div>

                                <div class="recent-search-item">
                                    <div class="search-term">
                                        <i class="fas fa-search text-muted me-2"></i>
                                        <span>monitor 4k</span>
                                    </div>
                                    <div class="search-meta">
                                        <small class="text-muted">15 resultados • Hace 2 días</small>
                                    </div>
                                </div>

                                <div class="recent-search-item">
                                    <div class="search-term">
                                        <i class="fas fa-search text-muted me-2"></i>
                                        <span>cafetera automática</span>
                                    </div>
                                    <div class="search-meta">
                                        <small class="text-muted">5 resultados • Hace 3 días</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Chart -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-chart-line me-2"></i>Actividad Semanal
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-chart">
                                <canvas id="activityChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../../assets/js/usuario.js"></script>
    <script src="../../assets/js/usuario-historial.js"></script>
</body>
</html>
