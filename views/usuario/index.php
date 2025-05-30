<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .product-img {
            max-width: 60px;
            max-height: 60px;
            object-fit: cover;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            border-radius: 15px 15px 0 0 !important;
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="m-0"><i class="fas fa-boxes me-2"></i>Inventario de Productos</h3>
                        <div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Categoría</th>
                                        <th>Descripción</th>
                                        <th>Stock</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($productos) && is_array($productos)): ?>
                                        <?php foreach ($productos as $index => $producto): ?>
                                            <tr>
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
                                                <td class="text-truncate" style="max-width: 200px;" 
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
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center py-4">
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
                    <div class="card-footer">
                        <small class="text-muted">
                            Última actualización: <?= date('d/m/Y H:i:s') ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tooltips para las descripciones truncadas
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>
</html>