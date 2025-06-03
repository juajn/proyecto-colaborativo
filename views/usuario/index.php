<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario - InventoryPro</title>
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
                <li class="nav-item active">
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

    <!-- contenido principal -->
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-link sidebar-toggle-btn" id="sidebarToggleBtn">
                    <i class="fas fa-bars"></i>
                </button>
                
                <div class="search-container">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control border-0 bg-light" placeholder="Buscar productos...">
                    </div>
                </div>
                
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

        <!-- Contenido dashboard -->
        <div class="container-fluid p-4">
            <!-- Welcome Section -->
            <div class="welcome-section mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="welcome-title">¡Bienvenido, <?= htmlspecialchars($usuario['nombre'] ?? 'Usuario') ?>!</h1>
                        <p class="welcome-subtitle">Explora nuestro inventario de productos</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="date-time">
                            <div class="current-date" id="currentDate"></div>
                            <div class="current-time" id="currentTime"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- filtros y acciones -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="filters-container">
                                <div class="filter-group">
                                    <label class="filter-label">Categoría:</label>
                                    <select class="form-select filter-select" id="categoryFilter">
                                        <option value="">Todas</option>
                                        <option value="Electrónica">Electrónica</option>
                                        <option value="Hogar">Hogar</option>
                                        <option value="Oficina">Oficina</option>
                                        <option value="Ropa">Ropa</option>
                                    </select>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">Estado:</label>
                                    <select class="form-select filter-select" id="statusFilter">
                                        <option value="">Todos</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="filter-group">
                                    <label class="filter-label">Stock:</label>
                                    <select class="form-select filter-select" id="stockFilter">
                                        <option value="">Todos</option>
                                        <option value="available">Disponible</option>
                                        <option value="low">Stock Bajo</option>
                                        <option value="out">Agotado</option>
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
                                    <i class="fas fa-sync-alt"></i> Actualizar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- productos vista tabla -->
            <div class="card mb-4" id="tableView">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0"><i class="fas fa-boxes me-2"></i>Inventario de Productos</h5>
                    <div class="card-actions">
                        <button class="btn btn-sm btn-outline-primary" id="exportBtn">
                            <i class="fas fa-file-export me-1"></i> Exportar
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="productsTable">
                            <thead class="table-dark">
                                <tr>
                                    <th class="sortable" data-sort="id"># <i class="fas fa-sort ms-1"></i></th>
                                    <th>Imagen</th>
                                    <th class="sortable" data-sort="nombre">Nombre <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="categoria">Categoría <i class="fas fa-sort ms-1"></i></th>
                                    <th>Descripción</th>
                                    <th class="sortable" data-sort="stock">Stock <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="precio">Precio <i class="fas fa-sort ms-1"></i></th>
                                    <th class="sortable" data-sort="estado">Estado <i class="fas fa-sort ms-1"></i></th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($productos) && is_array($productos)): ?>
                                    <?php foreach ($productos as $index => $producto): ?>
                                        <tr class="product-row" 
                                            data-category="<?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?>"
                                            data-status="<?= $producto['activo'] ?>"
                                            data-stock-status="<?= $producto['stock'] > 10 ? 'available' : ($producto['stock'] > 0 ? 'low' : 'out') ?>">
                                            <td><?= $index + 1 ?></td>
                                            <td>
                                                <?php if (!empty($producto['imagen'])): ?>
                                                    <img src="uploads/<?= htmlspecialchars($producto['imagen']) ?>" 
                                                         alt="<?= htmlspecialchars($producto['nombre']) ?>" 
                                                         class="product-img rounded">
                                                <?php else: ?>
                                                    <div class="product-img bg-light d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-box-open text-muted"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= htmlspecialchars($producto['nombre']) ?></td>
                                            <td>
                                                <span class="badge bg-info">
                                                    <?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?>
                                                </span>
                                            </td>
                                            <td class="text-truncate description-cell" 
                                                data-bs-toggle="tooltip" 
                                                title="<?= htmlspecialchars($producto['descripcion']) ?>">
                                                <?= htmlspecialchars($producto['descripcion']) ?>
                                            </td>
                                            <td>
                                                <?php if ($producto['stock'] > 10): ?>
                                                    <span class="badge bg-success"><?= $producto['stock'] ?></span>
                                                <?php elseif ($producto['stock'] > 0): ?>
                                                    <span class="badge bg-warning text-dark"><?= $producto['stock'] ?></span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Agotado</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <strong>$<?= number_format($producto['precio'], 2) ?></strong>
                                            </td>
                                            <td>
                                                <?php if ($producto['activo'] == 1): ?>
                                                    <span class="badge bg-success">Activo</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary">Inactivo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary view-details-btn" 
                                                            data-bs-toggle="modal" data-bs-target="#productDetailsModal"
                                                            data-product-id="<?= $producto['id'] ?? $index ?>">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary add-to-favorites"
                                                            data-product-id="<?= $producto['id'] ?? $index ?>">
                                                        <i class="far fa-star"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr id="noProductsRow">
                                        <td colspan="9" class="text-center py-4">
                                            <div class="alert alert-warning">
                                                <i class="fas fa-exclamation-circle me-2"></i>
                                                No se encontraron productos registrados.
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class="pagination-info">
                        Mostrando <span id="shownProducts">0</span> de <span id="totalProducts">0</span> productos
                    </div>
                    <nav aria-label="Navegación de páginas">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
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

            <!-- Productos-->
            <div class="card mb-4" id="gridView" style="display: none;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0"><i class="fas fa-th-large me-2"></i>Catálogo de Productos</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4" id="productsGrid">
                        <?php if (!empty($productos) && is_array($productos)): ?>
                            <?php foreach ($productos as $index => $producto): ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 product-card-wrapper"
                                     data-category="<?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?>"
                                     data-status="<?= $producto['activo'] ?>"
                                     data-stock-status="<?= $producto['stock'] > 10 ? 'available' : ($producto['stock'] > 0 ? 'low' : 'out') ?>">
                                    <div class="product-card">
                                        <div class="product-badge">
                                            <?php if ($producto['stock'] <= 0): ?>
                                                <span class="badge bg-danger">Agotado</span>
                                            <?php elseif ($producto['stock'] <= 10): ?>
                                                <span class="badge bg-warning text-dark">Stock Bajo</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-favorite">
                                            <button class="btn btn-sm btn-light rounded-circle add-to-favorites"
                                                    data-product-id="<?= $producto['id'] ?? $index ?>">
                                                <i class="far fa-star"></i>
                                            </button>
                                        </div>
                                        <div class="product-image">
                                            <?php if (!empty($producto['imagen'])): ?>
                                                <img src="uploads/<?= htmlspecialchars($producto['imagen']) ?>" 
                                                     alt="<?= htmlspecialchars($producto['nombre']) ?>">
                                            <?php else: ?>
                                                <div class="no-image">
                                                    <i class="fas fa-box-open"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name"><?= htmlspecialchars($producto['nombre']) ?></h5>
                                            <div class="product-category">
                                                <span class="badge bg-info">
                                                    <?= htmlspecialchars($producto['categoria_nombre'] ?? 'Sin categoría') ?>
                                                </span>
                                            </div>
                                            <p class="product-description" data-bs-toggle="tooltip" 
                                               title="<?= htmlspecialchars($producto['descripcion']) ?>">
                                                <?= htmlspecialchars(substr($producto['descripcion'], 0, 60)) ?>
                                                <?= strlen($producto['descripcion']) > 60 ? '...' : '' ?>
                                            </p>
                                            <div class="product-details">
                                                <div class="product-price">
                                                    <strong>$<?= number_format($producto['precio'], 2) ?></strong>
                                                </div>
                                                <div class="product-stock">
                                                    <span class="stock-label">Stock:</span>
                                                    <span class="stock-value"><?= $producto['stock'] ?></span>
                                                </div>
                                            </div>
                                            <div class="product-actions">
                                                <button type="button" class="btn btn-primary view-details-btn"
                                                        data-bs-toggle="modal" data-bs-target="#productDetailsModal"
                                                        data-product-id="<?= $producto['id'] ?? $index ?>">
                                                    <i class="fas fa-eye me-1"></i> Ver Detalles
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12" id="noProductsGrid">
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    No se encontraron productos registrados.
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div class="pagination-info">
                        Mostrando <span id="shownProductsGrid">0</span> de <span id="totalProductsGrid">0</span> productos
                    </div>
                    <nav aria-label="Navegación de páginas">
                        <ul class="pagination mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
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
    </div>

    <!-- modal detalles productos -->
    <div class="modal fade" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productDetailsModalLabel">Detalles del Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-detail-image">
                                <img src="/placeholder.svg" alt="Producto" id="modalProductImage" class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h4 id="modalProductName" class="mb-3"></h4>
                            
                            <div class="product-detail-info">
                                <div class="detail-item">
                                    <span class="detail-label">Categoría:</span>
                                    <span id="modalProductCategory" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Precio:</span>
                                    <span id="modalProductPrice" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Stock:</span>
                                    <span id="modalProductStock" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Estado:</span>
                                    <span id="modalProductStatus" class="detail-value"></span>
                                </div>
                                
                                <div class="detail-item">
                                    <span class="detail-label">Código:</span>
                                    <span id="modalProductCode" class="detail-value"></span>
                                </div>
                            </div>
                            
                            <div class="product-description mt-4">
                                <h6>Descripción:</h6>
                                <p id="modalProductDescription"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="modalAddToFavorites">
                        <i class="far fa-star me-1"></i> Añadir a Favoritos
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/usuario.js"></script>
</body>
</html>
