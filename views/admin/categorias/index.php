<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Categorías - InventoryPro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/dashboard-styles.css">
    <link rel="stylesheet" href="../../../assets/css/admin-pages.css">
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
                <li class="nav-item">
                    <a href="../dashboard.php" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../productos/index.php" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Productos</span>
                        <span class="badge">156</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../movimientos/index.php" class="nav-link">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Movimientos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../usuarios/index.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../roles/index.php" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <span>Roles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../reportes/index.php" class="nav-link">
                        <i class="fas fa-chart-bar"></i>
                        <span>Reportes</span>
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
                            <span>Administrador</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="../../../config/cerrarSesion.php">
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
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Categorías</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="page-title">
                            <i class="fas fa-tags me-3"></i>Gestión de Categorías
                        </h1>
                        <p class="page-subtitle">Organiza y administra las categorías de productos</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            <i class="fas fa-plus me-2"></i>Nueva Categoría
                        </button>
                        <button class="btn btn-outline-secondary" id="refreshCategoriesBtn">
                            <i class="fas fa-sync-alt me-2"></i>Actualizar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-primary">
                        <div class="stats-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="12">0</h3>
                            <p class="stats-label">Total Categorías</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+2 este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-success">
                        <div class="stats-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="10">0</h3>
                            <p class="stats-label">Categorías Activas</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+1 este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-info">
                        <div class="stats-icon">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="156">0</h3>
                            <p class="stats-label">Productos Categorizados</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+12 este mes</span>
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
                            <h3 class="stats-number" data-target="2">0</h3>
                            <p class="stats-label">Categorías Inactivas</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-down"></i>
                                <span>-1 este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Categories List -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="m-0">
                                <i class="fas fa-list me-2"></i>Lista de Categorías
                            </h5>
                            <div class="search-container">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                    <input type="text" class="form-control" id="searchCategories" placeholder="Buscar categorías...">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="categoriesTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="sortable" data-sort="id"># <i class="fas fa-sort ms-1"></i></th>
                                            <th>Icono</th>
                                            <th class="sortable" data-sort="nombre">Nombre <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="productos">Productos <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="estado">Estado <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="fecha">Fecha Creación <i class="fas fa-sort ms-1"></i></th>
                                            <th width="120">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="category-row" data-status="1">
                                            <td>1</td>
                                            <td>
                                                <div class="category-icon bg-info">
                                                    <i class="fas fa-laptop"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Electrónica</strong>
                                                    <small class="text-muted d-block">Dispositivos y componentes electrónicos</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">45</span></td>
                                            <td><span class="badge bg-success">Activa</span></td>
                                            <td>01/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="1" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="1" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="category-row" data-status="1">
                                            <td>2</td>
                                            <td>
                                                <div class="category-icon bg-success">
                                                    <i class="fas fa-home"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Hogar</strong>
                                                    <small class="text-muted d-block">Artículos para el hogar y decoración</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">32</span></td>
                                            <td><span class="badge bg-success">Activa</span></td>
                                            <td>01/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="2" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="2" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="category-row" data-status="1">
                                            <td>3</td>
                                            <td>
                                                <div class="category-icon bg-warning">
                                                    <i class="fas fa-briefcase"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Oficina</strong>
                                                    <small class="text-muted d-block">Suministros y mobiliario de oficina</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">28</span></td>
                                            <td><span class="badge bg-success">Activa</span></td>
                                            <td>01/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="3" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="3" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="category-row" data-status="1">
                                            <td>4</td>
                                            <td>
                                                <div class="category-icon bg-primary">
                                                    <i class="fas fa-tshirt"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Ropa</strong>
                                                    <small class="text-muted d-block">Vestimenta y accesorios</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">25</span></td>
                                            <td><span class="badge bg-success">Activa</span></td>
                                            <td>01/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="4" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="4" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="category-row" data-status="1">
                                            <td>5</td>
                                            <td>
                                                <div class="category-icon bg-danger">
                                                    <i class="fas fa-dumbbell"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Deportes</strong>
                                                    <small class="text-muted d-block">Equipamiento deportivo y fitness</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">18</span></td>
                                            <td><span class="badge bg-success">Activa</span></td>
                                            <td>05/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="5" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="5" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr class="category-row" data-status="0">
                                            <td>6</td>
                                            <td>
                                                <div class="category-icon bg-secondary">
                                                    <i class="fas fa-book"></i>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="category-name-cell">
                                                    <strong>Libros</strong>
                                                    <small class="text-muted d-block">Literatura y material educativo</small>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-primary">8</span></td>
                                            <td><span class="badge bg-secondary">Inactiva</span></td>
                                            <td>10/01/2025</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-outline-warning edit-category" data-id="6" title="Editar">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger delete-category" data-id="6" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Statistics -->
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-chart-pie me-2"></i>Distribución por Categoría
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="category-stats">
                                <div class="stat-item">
                                    <div class="stat-info">
                                        <div class="stat-icon bg-info">
                                            <i class="fas fa-laptop"></i>
                                        </div>
                                        <div class="stat-details">
                                            <h6>Electrónica</h6>
                                            <small class="text-muted">45 productos</small>
                                        </div>
                                    </div>
                                    <div class="stat-percentage">28.8%</div>
                                </div>
                                
                                <div class="stat-item">
                                    <div class="stat-info">
                                        <div class="stat-icon bg-success">
                                            <i class="fas fa-home"></i>
                                        </div>
                                        <div class="stat-details">
                                            <h6>Hogar</h6>
                                            <small class="text-muted">32 productos</small>
                                        </div>
                                    </div>
                                    <div class="stat-percentage">20.5%</div>
                                </div>
                                
                                <div class="stat-item">
                                    <div class="stat-info">
                                        <div class="stat-icon bg-warning">
                                            <i class="fas fa-briefcase"></i>
                                        </div>
                                        <div class="stat-details">
                                            <h6>Oficina</h6>
                                            <small class="text-muted">28 productos</small>
                                        </div>
                                    </div>
                                    <div class="stat-percentage">17.9%</div>
                                </div>
                                
                                <div class="stat-
