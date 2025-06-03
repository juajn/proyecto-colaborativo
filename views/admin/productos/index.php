<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - InventoryPro</title>
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
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">
                        <i class="fas fa-box"></i>
                        <span>Productos</span>
                        <span class="badge">156</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../categorias/index.php" class="nav-link">
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
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Productos</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="page-title">
                            <i class="fas fa-box me-3"></i>Gestión de Productos
                        </h1>
                        <p class="page-subtitle">Administra tu inventario completo de productos</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addProductModal">
                            <i class="fas fa-plus me-2"></i>Nuevo Producto
                        </button>
                        <div class="btn-group">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                <i class="fas fa-download me-2"></i>Exportar
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" id="exportExcel"><i class="fas fa-file-excel me-2"></i>Excel</a></li>
                                <li><a class="dropdown-item" href="#" id="exportPDF"><i class="fas fa-file-pdf me-2"></i>PDF</a></li>
                                <li><a class="dropdown-item" href="#" id="exportCSV"><i class="fas fa-file-csv me-2"></i>CSV</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
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
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="142">0</h3>
                            <p class="stats-label">Productos Activos</p>
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
                    <div class="stats-card stats-danger">
                        <div class="stats-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="14">0</h3>
                            <p class="stats-label">Sin Stock</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+2% este mes</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
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
                                        <input type="text" class="form-control" id="searchInput" placeholder="Buscar productos...">
                                    </div>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">Categoría:</label>
                                    <select class="form-select" id="categoryFilter">
                                        <option value="">Todas las categorías</option>
                                        <option value="Electrónica">Electrónica</option>
                                        <option value="Hogar">Hogar</option>
                                        <option value="Oficina">Oficina</option>
                                        <option value="Ropa">Ropa</option>
                                        <option value="Deportes">Deportes</option>
                                    </select>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">Estado:</label>
                                    <select class="form-select" id="statusFilter">
                                        <option value="">Todos</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">Stock:</label>
                                    <select class="form-select" id="stockFilter">
                                        <option value="">Todos</option>
                                        <option value="available">Disponible (>10)</option>
                                        <option value="low">Stock Bajo (1-10)</option>
                                        <option value="out">Sin Stock (0)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-end">
                            <div class="view-options">
                                <button class="btn btn-outline-secondary view-btn active" data-view="table">
                                    <i class="fas fa-list"></i>
                                </button>
                                <button class="btn btn-outline-secondary view-btn" data-view="grid">
                                    <i class="fas fa-th-large"></i>
                                </button>
                                <button class="btn btn-primary ms-2" id="refreshBtn">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="card" id="tableView">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">
                        <i class="fas fa-table me-2"></i>Lista de Productos
                    </h5>
                    <div class="card-actions">
                        <button class="btn btn-sm btn-outline-danger" id="bulkDeleteBtn" style="display: none;">
                            <i class="fas fa-trash me-1"></i>Eliminar Seleccionados
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="productsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th width="50">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th class="sortable" data-sort="id"># <i class="fas fa-sort ms-1"></i></th>
                                    <th width="80">Imagen</th>
                                    <th class="sortable" data-sort="nombre">Nombre <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="categoria">Categoría <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="precio">Precio <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="stock">Stock <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="estado">Estado <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="fecha">Fecha Creación <i class="fas fa-sort ms-1"></i></th>
                                    <th width="150">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Productos de ejemplo -->
                                <tr class="product-row" data-category="Electrónica" data-status="1" data-stock-status="available">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Laptop HP" class="product-img rounded">
                                    </td>
                                    <td>
                                        <div class="product-name-cell">
                                            <strong>Laptop HP Pavilion 15</strong>
                                            <small class="text-muted d-block">SKU: LAP-HP-001</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">Electrónica</span></td>
                                    <td><strong>$1,299.99</strong></td>
                                    <td><span class="badge bg-success">25</span></td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>15/05/2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary view-product" data-id="1" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning edit-product" data-id="1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger delete-product" data-id="1" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr class="product-row" data-category="Hogar" data-status="1" data-stock-status="low">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox" value="2">
                                        </div>
                                    </td>
                                    <td>2</td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Cafetera" class="product-img rounded">
                                    </td>
                                    <td>
                                        <div class="product-name-cell">
                                            <strong>Cafetera Automática Deluxe</strong>
                                            <small class="text-muted d-block">SKU: CAF-DEL-002</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-success">Hogar</span></td>
                                    <td><strong>$299.99</strong></td>
                                    <td><span class="badge bg-warning text-dark">5</span></td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>12/05/2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary view-product" data-id="2" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning edit-product" data-id="2" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger delete-product" data-id="2" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr class="product-row" data-category="Oficina" data-status="0" data-stock-status="out">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox" value="3">
                                        </div>
                                    </td>
                                    <td>3</td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Silla" class="product-img rounded">
                                    </td>
                                    <td>
                                        <div class="product-name-cell">
                                            <strong>Silla Ergonómica Ejecutiva</strong>
                                            <small class="text-muted d-block">SKU: SIL-ERG-003</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-warning">Oficina</span></td>
                                    <td><strong>$199.99</strong></td>
                                    <td><span class="badge bg-danger">0</span></td>
                                    <td><span class="badge bg-secondary">Inactivo</span></td>
                                    <td>10/05/2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary view-product" data-id="3" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning edit-product" data-id="3" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger delete-product" data-id="3" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr class="product-row" data-category="Electrónica" data-status="1" data-stock-status="available">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox" value="4">
                                        </div>
                                    </td>
                                    <td>4</td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Monitor" class="product-img rounded">
                                    </td>
                                    <td>
                                        <div class="product-name-cell">
                                            <strong>Monitor Samsung 24" 4K</strong>
                                            <small class="text-muted d-block">SKU: MON-SAM-004</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-info">Electrónica</span></td>
                                    <td><strong>$349.99</strong></td>
                                    <td><span class="badge bg-success">15</span></td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>08/05/2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary view-product" data-id="4" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning edit-product" data-id="4" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger delete-product" data-id="4" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr class="product-row" data-category="Ropa" data-status="1" data-stock-status="available">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input row-checkbox" type="checkbox" value="5">
                                        </div>
                                    </td>
                                    <td>5</td>
                                    <td>
                                        <img src="/placeholder.svg?height=50&width=50" alt="Camisa" class="product-img rounded">
                                    </td>
                                    <td>
                                        <div class="product-name-cell">
                                            <strong>Camisa Formal Azul</strong>
                                            <small class="text-muted d-block">SKU: CAM-FOR-005</small>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-primary">Ropa</span></td>
                                    <td><strong>$49.99</strong></td>
                                    <td><span class="badge bg-success">30</span></td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>05/05/2025</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary view-product" data-id="5" title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-warning edit-product" data-id="5" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger delete-product" data-id="5" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class="pagination-info">
                        Mostrando <span id="shownProducts">5</span> de <span id="totalProducts">156</span> productos
                    </div>
                    <nav aria-label="Navegación de páginas">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Anterior</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Products Grid View (Hidden by default) -->
            <div class="card" id="gridView" style="display: none;">
                <div class="card-header">
                    <h5 class="m-0">
                        <i class="fas fa-th-large me-2"></i>Vista de Cuadrícula
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4" id="productsGrid">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-card">
                                <div class="product-badge">
                                    <span class="badge bg-success">Activo</span>
                                </div>
                                <div class="product-actions-overlay">
                                    <button class="btn btn-sm btn-light rounded-circle view-product" data-id="1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light rounded-circle edit-product" data-id="1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light rounded-circle delete-product" data-id="1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=200&width=200" alt="Laptop HP">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">Laptop HP Pavilion 15</h5>
                                    <div class="product-category">
                                        <span class="badge bg-info">Electrónica</span>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-price">
                                            <strong>$1,299.99</strong>
                                        </div>
                                        <div class="product-stock">
                                            <span class="badge bg-success">Stock: 25</span>
                                        </div>
                                    </div>
                                    <div class="product-meta">
                                        <small class="text-muted">SKU: LAP-HP-001</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-card">
                                <div class="product-badge">
                                    <span class="badge bg-warning text-dark">Stock Bajo</span>
                                </div>
                                <div class="product-actions-overlay">
                                    <button class="btn btn-sm btn-light rounded-circle view-product" data-id="2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light rounded-circle edit-product" data-id="2">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-light rounded-circle delete-product" data-id="2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=200&width=200" alt="Cafetera">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-name">Cafetera Automática Deluxe</h5>
                                    <div class="product-category">
                                        <span class="badge bg-success">Hogar</span>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-price">
                                            <strong>$299.99</strong>
                                        </div>
                                        <div class="product-stock">
                                            <span class="badge bg-warning text-dark">Stock: 5</span>
                                        </div>
                                    </div>
                                    <div class="product-meta">
                                        <small class="text-muted">SKU: CAF-DEL-002</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Más productos... -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">
                        <i class="fas fa-plus me-2"></i>Nuevo Producto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Nombre del Producto *</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productSKU" class="form-label">SKU *</label>
                                    <input type="text" class="form-control" id="productSKU" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productCategory" class="form-label">Categoría *</label>
                                    <select class="form-select" id="productCategory" required>
                                        <option value="">Seleccionar categoría</option>
                                        <option value="Electrónica">Electrónica</option>
                                        <option value="Hogar">Hogar</option>
                                        <option value="Oficina">Oficina</option>
                                        <option value="Ropa">Ropa</option>
                                        <option value="Deportes">Deportes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Precio *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="productPrice" step="0.01" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productStock" class="form-label">Stock Inicial *</label>
                                    <input type="number" class="form-control" id="productStock" min="0" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productMinStock" class="form-label">Stock Mínimo</label>
                                    <input type="number" class="form-control" id="productMinStock" min="0" value="5">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Descripción</label>
                            <textarea class="form-control" id="productDescription" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Imagen del Producto</label>
                            <input type="file" class="form-control" id="productImage" accept="image/*">
                            <div class="form-text">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="productActive" checked>
                                    <label class="form-check-label" for="productActive">
                                        Producto Activo
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="productFeatured">
                                    <label class="form-check-label" for="productFeatured">
                                        Producto Destacado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="saveProductBtn">
                        <i class="fas fa-save me-2"></i>Guardar Producto
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProductModalLabel">
                        <i class="fas fa-eye me-2"></i>Detalles del Producto
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-detail-image">
                                <img src="/placeholder.svg?height=300&width=300" alt="Producto" id="viewProductImage" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 id="viewProductName" class="mb-3"></h4>
                            
                            <div class="product-detail-info">
                                <div class="detail-item">
                                    <span class="detail-label">SKU:</span>
                                    <span id="viewProductSKU" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Categoría:</span>
                                    <span id="viewProductCategory" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Precio:</span>
                                    <span id="viewProductPrice" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Stock Actual:</span>
                                    <span id="viewProductStock" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Stock Mínimo:</span>
                                    <span id="viewProductMinStock" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Estado:</span>
                                    <span id="viewProductStatus" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Fecha de Creación:</span>
                                    <span id="viewProductDate" class="detail-value"></span>
                                </div>
                            </div>
                            
                            <div class="product-description mt-4">
                                <h6>Descripción:</h6>
                                <p id="viewProductDescription"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="editFromViewBtn">
                        <i class="fas fa-edit me-2"></i>Editar Producto
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/dashboard.js"></script>
    <script src="../../../assets/js/admin-productos.js"></script>
</body>
</html>
