<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - InventoryPro</title>
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
                <li class="nav-item active">
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

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
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
                        <input type="text" id="searchInput" class="form-control border-0 bg-light" placeholder="Buscar categorías...">
                    </div>
                </div>
                
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
                    <li class="breadcrumb-item active" aria-current="page">Categorías</li>
                </ol>
            </nav>

            <!-- Welcome Section -->
            <div class="welcome-section mb-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h1 class="welcome-title">
                            <i class="fas fa-tags me-3"></i>Explorar Categorías
                        </h1>
                        <p class="welcome-subtitle">Descubre productos organizados por categorías</p>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="date-time">
                            <div class="current-date" id="currentDate"></div>
                            <div class="current-time" id="currentTime"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Categories Grid -->
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Electrónica">
                        <div class="category-header bg-info">
                            <div class="category-icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Electrónica">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Electrónica</h5>
                            <p class="category-description">Dispositivos y componentes electrónicos de última tecnología</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>45 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.8/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Laptops</span>
                                <span class="tag">Monitores</span>
                                <span class="tag">Accesorios</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Hogar">
                        <div class="category-header bg-success">
                            <div class="category-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Hogar">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Hogar</h5>
                            <p class="category-description">Artículos para el hogar y decoración que harán tu espacio único</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>32 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.6/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Cocina</span>
                                <span class="tag">Decoración</span>
                                <span class="tag">Limpieza</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Oficina">
                        <div class="category-header bg-warning">
                            <div class="category-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Oficina">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Oficina</h5>
                            <p class="category-description">Suministros y mobiliario para crear el espacio de trabajo perfecto</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>28 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.7/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Mobiliario</span>
                                <span class="tag">Papelería</span>
                                <span class="tag">Ergonomía</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Ropa">
                        <div class="category-header bg-primary">
                            <div class="category-icon">
                                <i class="fas fa-tshirt"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Ropa">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Ropa</h5>
                            <p class="category-description">Vestimenta y accesorios para todas las ocasiones y estilos</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>25 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.5/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Formal</span>
                                <span class="tag">Casual</span>
                                <span class="tag">Accesorios</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Deportes">
                        <div class="category-header bg-danger">
                            <div class="category-icon">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Deportes">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Deportes</h5>
                            <p class="category-description">Equipamiento deportivo y fitness para mantenerte en forma</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>18 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.9/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Fitness</span>
                                <span class="tag">Outdoor</span>
                                <span class="tag">Equipos</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="category-card" data-category="Libros">
                        <div class="category-header bg-secondary">
                            <div class="category-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="category-overlay">
                                <button class="btn btn-light btn-sm view-category" data-category="Libros">
                                    <i class="fas fa-eye me-1"></i>Ver Productos
                                </button>
                            </div>
                        </div>
                        <div class="category-body">
                            <h5 class="category-name">Libros</h5>
                            <p class="category-description">Literatura y material educativo para expandir tus conocimientos</p>
                            <div class="category-stats">
                                <div class="stat-item">
                                    <i class="fas fa-box text-primary"></i>
                                    <span>8 productos</span>
                                </div>
                                <div class="stat-item">
                                    <i class="fas fa-star text-warning"></i>
                                    <span>4.4/5</span>
                                </div>
                            </div>
                            <div class="category-tags">
                                <span class="tag">Ficción</span>
                                <span class="tag">Educativo</span>
                                <span class="tag">Técnico</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Products by Category -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="m-0">
                        <i class="fas fa-fire me-2"></i>Productos Populares por Categoría
                    </h5>
                    <div class="category-filter">
                        <select class="form-select form-select-sm" id="categoryFilterSelect">
                            <option value="">Todas las categorías</option>
                            <option value="Electrónica">Electrónica</option>
                            <option value="Hogar">Hogar</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Ropa">Ropa</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Libros">Libros</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3" id="popularProducts">
                        <!-- Productos populares se cargarán aquí dinámicamente -->
                        <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-category="Electrónica">
                            <div class="popular-product-card">
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Laptop HP">
                                    <div class="product-badge">
                                        <span class="badge bg-danger">Popular</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-name">Laptop HP Pavilion 15</h6>
                                    <div class="product-category">
                                        <span class="badge bg-info">Electrónica</span>
                                    </div>
                                    <div class="product-price">$1,299.99</div>
                                    <div class="product-rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="ms-1">(4.8)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-category="Hogar">
                            <div class="popular-product-card">
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Cafetera">
                                    <div class="product-badge">
                                        <span class="badge bg-success">Nuevo</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-name">Cafetera Automática Deluxe</h6>
                                    <div class="product-category">
                                        <span class="badge bg-success">Hogar</span>
                                    </div>
                                    <div class="product-price">$299.99</div>
                                    <div class="product-rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="far fa-star text-warning"></i>
                                        <span class="ms-1">(4.6)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-category="Oficina">
                            <div class="popular-product-card">
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Silla">
                                    <div class="product-badge">
                                        <span class="badge bg-warning text-dark">Oferta</span>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-name">Silla Ergonómica Ejecutiva</h6>
                                    <div class="product-category">
                                        <span class="badge bg-warning">Oficina</span>
                                    </div>
                                    <div class="product-price">$199.99</div>
                                    <div class="product-rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="ms-1">(4.7)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6 product-item" data-category="Electrónica">
                            <div class="popular-product-card">
                                <div class="product-image">
                                    <img src="/placeholder.svg?height=120&width=120" alt="Monitor">
                                </div>
                                <div class="product-info">
                                    <h6 class="product-name">Monitor Samsung 24" 4K</h6>
                                    <div class="product-category">
                                        <span class="badge bg-info">Electrónica</span>
                                    </div>
                                    <div class="product-price">$349.99</div>
                                    <div class="product-rating">
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <span class="ms-1">(4.9)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/usuario.js"></script>
    <script src="../../assets/js/usuario-categorias.js"></script>
</body>
</html>
