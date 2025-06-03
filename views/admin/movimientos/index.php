<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Movimientos - InventoryPro</title>
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
                <li class="nav-item">
                    <a href="../categorias/index.php" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span>Categorías</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">
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
                    <li class="breadcrumb-item active" aria-current="page">Control de Movimientos</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="page-header mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1 class="page-title">
                            <i class="fas fa-exchange-alt me-3"></i>Control de Movimientos
                        </h1>
                        <p class="page-subtitle">Registra y monitorea todas las entradas y salidas de inventario</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="btn-group me-2">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entradaModal">
                                <i class="fas fa-arrow-down me-2"></i>Entrada
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#salidaModal">
                                <i class="fas fa-arrow-up me-2"></i>Salida
                            </button>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ajusteModal">
                                <i class="fas fa-cog me-2"></i>Ajuste
                            </button>
                        </div>
                        <button class="btn btn-outline-secondary" id="refreshMovements">
                            <i class="fas fa-sync-alt me-2"></i>Actualizar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-success">
                        <div class="stats-icon">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="145">0</h3>
                            <p class="stats-label">Entradas Hoy</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+15% vs ayer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-danger">
                        <div class="stats-icon">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="89">0</h3>
                            <p class="stats-label">Salidas Hoy</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-down"></i>
                                <span>-8% vs ayer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-warning">
                        <div class="stats-icon">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="12">0</h3>
                            <p class="stats-label">Ajustes Hoy</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+3% vs ayer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-md-6">
                    <div class="stats-card stats-info">
                        <div class="stats-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stats-content">
                            <h3 class="stats-number" data-target="15420">0</h3>
                            <p class="stats-label">Valor Movido ($)</p>
                            <div class="stats-trend">
                                <i class="fas fa-arrow-up"></i>
                                <span>+22% vs ayer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Movements List -->
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
                                                <input type="text" class="form-control" id="searchMovements" placeholder="Buscar movimientos...">
                                            </div>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Tipo:</label>
                                            <select class="form-select" id="typeFilter">
                                                <option value="">Todos</option>
                                                <option value="entrada">Entrada</option>
                                                <option value="salida">Salida</option>
                                                <option value="ajuste">Ajuste</option>
                                            </select>
                                        </div>
                                        <div class="filter-group">
                                            <label class="filter-label">Fecha:</label>
                                            <select class="form-select" id="dateFilter">
                                                <option value="">Todas</option>
                                                <option value="today">Hoy</option>
                                                <option value="week">Esta semana</option>
                                                <option value="month">Este mes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <button class="btn btn-outline-primary" id="exportMovements">
                                        <i class="fas fa-download me-2"></i>Exportar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Movements Table -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-list me-2"></i>Historial de Movimientos
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="movementsTable">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="sortable" data-sort="id"># <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="tipo">Tipo <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="producto">Producto <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="cantidad">Cantidad <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="usuario">Usuario <i class="fas fa-sort ms-1"></i></th>
                                            <th class="sortable" data-sort="fecha">Fecha <i class="fas fa-sort ms-1"></i></th>
                                            <th>Motivo</th>
                                            <th width="100">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="movement-row" data-type="entrada" data-date="2025-06-03">
                                            <td>1</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    <i class="fas fa-arrow-down me-1"></i>Entrada
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="/placeholder.svg?height=30&width=30" alt="Producto" class="rounded me-2" style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>Laptop HP Pavilion 15</strong>
                                                        <small class="text-muted d-block">SKU: LAP-HP-001</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success">+50</span></td>
                                            <td>Admin Usuario</td>
                                            <td>03/06/2025 10:30</td>
                                            <td>Compra a proveedor</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary view-movement" data-id="1" title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <tr class="movement-row" data-type="salida" data-date="2025-06-03">
                                            <td>2</td>
                                            <td>
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-arrow-up me-1"></i>Salida
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="/placeholder.svg?height=30&width=30" alt="Producto" class="rounded me-2" style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>Monitor Samsung 24"</strong>
                                                        <small class="text-muted d-block">SKU: MON-SAM-004</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-danger">-5</span></td>
                                            <td>Juan Pérez</td>
                                            <td>03/06/2025 09:15</td>
                                            <td>Venta a cliente</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary view-movement" data-id="2" title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <tr class="movement-row" data-type="ajuste" data-date="2025-06-02">
                                            <td>3</td>
                                            <td>
                                                <span class="badge bg-warning text-dark">
                                                    <i class="fas fa-cog me-1"></i>Ajuste
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="/placeholder.svg?height=30&width=30" alt="Producto" class="rounded me-2" style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>Cafetera Automática</strong>
                                                        <small class="text-muted d-block">SKU: CAF-DEL-002</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-warning text-dark">-2</span></td>
                                            <td>Admin Usuario</td>
                                            <td>02/06/2025 16:45</td>
                                            <td>Producto dañado</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary view-movement" data-id="3" title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <tr class="movement-row" data-type="entrada" data-date="2025-06-02">
                                            <td>4</td>
                                            <td>
                                                <span class="badge bg-success">
                                                    <i class="fas fa-arrow-down me-1"></i>Entrada
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="/placeholder.svg?height=30&width=30" alt="Producto" class="rounded me-2" style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>Teclado Mecánico RGB</strong>
                                                        <small class="text-muted d-block">SKU: TEC-RGB-005</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-success">+30</span></td>
                                            <td>María García</td>
                                            <td>02/06/2025 14:20</td>
                                            <td>Reposición de stock</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary view-movement" data-id="4" title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                        <tr class="movement-row" data-type="salida" data-date="2025-06-01">
                                            <td>5</td>
                                            <td>
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-arrow-up me-1"></i>Salida
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="/placeholder.svg?height=30&width=30" alt="Producto" class="rounded me-2" style="width: 30px; height: 30px;">
                                                    <div>
                                                        <strong>Silla Ergonómica</strong>
                                                        <small class="text-muted d-block">SKU: SIL-ERG-003</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-danger">-8</span></td>
                                            <td>Carlos López</td>
                                            <td>01/06/2025 11:30</td>
                                            <td>Pedido corporativo</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary view-movement" data-id="5" title="Ver detalles">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="pagination-info">
                                Mostrando <span id="shownMovements">5</span> de <span id="totalMovements">246</span> movimientos
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
                </div>

                <!-- Recent Activity -->
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-clock me-2"></i>Actividad Reciente
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="activity-timeline">
                                <div class="activity-item">
                                    <div class="activity-icon bg-success">
                                        <i class="fas fa-arrow-down"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Entrada de Stock</div>
                                        <div class="activity-details">50 unidades de Laptop HP Pavilion 15</div>
                                        <div class="activity-time">Hace 2 minutos</div>
                                    </div>
                                </div>
                                
                                <div class="activity-item">
                                    <div class="activity-icon bg-danger">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Salida de Stock</div>
                                        <div class="activity-details">5 unidades de Monitor Samsung 24"</div>
                                        <div class="activity-time">Hace 15 minutos</div>
                                    </div>
                                </div>
                                
                                <div class="activity-item">
                                    <div class="activity-icon bg-warning">
                                        <i class="fas fa-cog"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Ajuste de Inventario</div>
                                        <div class="activity-details">-2 unidades de Cafetera Automática</div>
                                        <div class="activity-time">Hace 1 hora</div>
                                    </div>
                                </div>
                                
                                <div class="activity-item">
                                    <div class="activity-icon bg-info">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">Nuevo Producto</div>
                                        <div class="activity-details">Teclado Mecánico RGB agregado</div>
                                        <div class="activity-time">Hace 2 horas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">
                                <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#entradaModal">
                                    <i class="fas fa-arrow-down me-2"></i>Registrar Entrada
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#salidaModal">
                                    <i class="fas fa-arrow-up me-2"></i>Registrar Salida
                                </button>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ajusteModal">
                                    <i class="fas fa-cog me-2"></i>Ajuste de Inventario
                                </button>
                                <button class="btn btn-outline-primary" id="generateReport">
                                    <i class="fas fa-file-alt me-2"></i>Generar Reporte
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Entrada Modal -->
    <div class="modal fade" id="entradaModal" tabindex="-1" aria-labelledby="entradaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="entradaModalLabel">
                        <i class="fas fa-arrow-down me-2"></i>Registrar Entrada de Stock
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="entradaForm">
                        <div class="mb-3">
                            <label for="entradaProducto" class="form-label">Producto *</label>
                            <select class="form-select" id="entradaProducto" required>
                                <option value="">Seleccionar producto</option>
                                <option value="1">Laptop HP Pavilion 15</option>
                                <option value="2">Monitor Samsung 24"</option>
                                <option value="3">Cafetera Automática</option>
                                <option value="4">Teclado Mecánico RGB</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="entradaCantidad" class="form-label">Cantidad *</label>
                            <input type="number" class="form-control" id="entradaCantidad" min="1" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="entradaMotivo" class="form-label">Motivo *</label>
                            <select class="form-select" id="entradaMotivo" required>
                                <option value="">Seleccionar motivo</option>
                                <option value="compra">Compra a proveedor</option>
                                <option value="devolucion">Devolución de cliente</option>
                                <option value="reposicion">Reposición de stock</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="entradaObservaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="entradaObservaciones" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="saveEntrada">
                        <i class="fas fa-save me-2"></i>Registrar Entrada
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Salida Modal -->
    <div class="modal fade" id="salidaModal" tabindex="-1" aria-labelledby="salidaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="salidaModalLabel">
                        <i class="fas fa-arrow-up me-2"></i>Registrar Salida de Stock
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="salidaForm">
                        <div class="mb-3">
                            <label for="salidaProducto" class="form-label">Producto *</label>
                            <select class="form-select" id="salidaProducto" required>
                                <option value="">Seleccionar producto</option>
                                <option value="1">Laptop HP Pavilion 15 (Stock: 25)</option>
                                <option value="2">Monitor Samsung 24" (Stock: 15)</option>
                                <option value="3">Cafetera Automática (Stock: 5)</option>
                                <option value="4">Teclado Mecánico RGB (Stock: 30)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="salidaCantidad" class="form-label">Cantidad *</label>
                            <input type="number" class="form-control" id="salidaCantidad" min="1" required>
                            <div class="form-text">Stock disponible: <span id="stockDisponible">0</span></div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="salidaMotivo" class="form-label">Motivo *</label>
                            <select class="form-select" id="salidaMotivo" required>
                                <option value="">Seleccionar motivo</option>
                                <option value="venta">Venta a cliente</option>
                                <option value="transferencia">Transferencia</option>
                                <option value="uso_interno">Uso interno</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="salidaObservaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" id="salidaObservaciones" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="saveSalida">
                        <i class="fas fa-save me-2"></i>Registrar Salida
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ajuste Modal -->
    <div class="modal fade" id="ajusteModal" tabindex="-1" aria-labelledby="ajusteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="ajusteModalLabel">
                        <i class="fas fa-cog me-2"></i>Ajuste de Inventario
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="ajusteForm">
                        <div class="mb-3">
                            <label for="ajusteProducto" class="form-label">Producto *</label>
                            <select class="form-select" id="ajusteProducto" required>
                                <option value="">Seleccionar producto</option>
                                <option value="1">Laptop HP Pavilion 15 (Stock: 25)</option>
                                <option value="2">Monitor Samsung 24" (Stock: 15)</option>
                                <option value="3">Cafetera Automática (Stock: 5)</option>
                                <option value="4">Teclado Mecánico RGB (Stock: 30)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ajusteTipo" class="form-label">Tipo de Ajuste *</label>
                            <select class="form-select" id="ajusteTipo" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="positivo">Ajuste Positivo (+)</option>
                                <option value="negativo">Ajuste Negativo (-)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ajusteCantidad" class="form-label">Cantidad *</label>
                            <input type="number" class="form-control" id="ajusteCantidad" min="1" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ajusteMotivo" class="form-label">Motivo *</label>
                            <select class="form-select" id="ajusteMotivo" required>
                                <option value="">Seleccionar motivo</option>
                                <option value="inventario">Conteo de inventario</option>
                                <option value="dañado">Producto dañado</option>
                                <option value="perdido">Producto perdido</option>
                                <option value="error">Corrección de error</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="ajusteObservaciones" class="form-label">Observaciones *</label>
                            <textarea class="form-control" id="ajusteObservaciones" rows="3" required placeholder="Describe el motivo del ajuste..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-warning" id="saveAjuste">
                        <i class="fas fa-save me-2"></i>Registrar Ajuste
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Movement Modal -->
    <div class="modal fade" id="viewMovementModal" tabindex="-1" aria-labelledby="viewMovementModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewMovementModalLabel">
                        <i class="fas fa-eye me-2"></i>Detalles del Movimiento
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="detail-label">ID Movimiento:</span>
                                <span id="viewMovementId" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Tipo:</span>
                                <span id="viewMovementType" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Producto:</span>
                                <span id="viewMovementProduct" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Cantidad:</span>
                                <span id="viewMovementQuantity" class="detail-value"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="detail-label">Usuario:</span>
                                <span id="viewMovementUser" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Fecha:</span>
                                <span id="viewMovementDate" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Motivo:</span>
                                <span id="viewMovementReason" class="detail-value"></span>
                            </div>
                            
                            <div class="detail-item">
                                <span class="detail-label">Stock Anterior:</span>
                                <span id="viewMovementPrevStock" class="detail-value"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="detail-item">
                                <span class="detail-label">Observaciones:</span>
                                <p id="viewMovementObservations" class="detail-value"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/js/dashboard.js"></script>
    <script src="../../../assets/js/admin-movimientos.js"></script>
</body>
</html>
