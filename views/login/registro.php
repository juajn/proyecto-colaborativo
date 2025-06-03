<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Inventario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/auth-styles.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-background">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
            </div>
        </div>
        
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="auth-card">
                        <div class="auth-header">
                            <div class="logo-container">
                                <div class="logo-icon">
                                    <i class="fas fa-boxes"></i>
                                </div>
                                <h2 class="logo-text">InventoryPro</h2>
                            </div>
                            <h3 class="auth-title">Crear Nueva Cuenta</h3>
                            <p class="auth-subtitle">Únete a nuestro sistema de gestión</p>
                        </div>

                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger alert-custom">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                <?= htmlspecialchars($_GET['error']) ?>
                            </div>
                        <?php endif; ?>

                        <form action="../../controllers/registroController.php" method="POST" class="auth-form" id="registerForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nombre" class="form-label">
                                            <i class="fas fa-user me-2"></i>Nombre Completo
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-id-card"></i>
                                            </span>
                                            <input type="text" 
                                                   id="nombre" 
                                                   name="nombre" 
                                                   class="form-control" 
                                                   placeholder="Tu nombre completo"
                                                   required>
                                        </div>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-label">
                                            <i class="fas fa-envelope me-2"></i>Correo Electrónico
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input type="email" 
                                                   id="email" 
                                                   name="email" 
                                                   class="form-control" 
                                                   placeholder="tu@email.com"
                                                   required>
                                        </div>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Contraseña
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <input type="password" 
                                           id="password" 
                                           name="password" 
                                           class="form-control" 
                                           placeholder="Mínimo 8 caracteres"
                                           required>
                                    <button type="button" class="btn btn-outline-secondary toggle-password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-strength">
                                    <div class="strength-bar">
                                        <div class="strength-fill"></div>
                                    </div>
                                    <small class="strength-text">Fortaleza de la contraseña</small>
                                </div>
                                <div class="form-feedback"></div>
                            </div>

                            <div class="form-group">
                                <label for="confirm-password" class="form-label">
                                    <i class="fas fa-lock me-2"></i>Confirmar Contraseña
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <input type="password" 
                                           id="confirm-password" 
                                           name="confirm-password" 
                                           class="form-control" 
                                           placeholder="Repite tu contraseña"
                                           required>
                                </div>
                                <div class="form-feedback"></div>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    Acepto los <a href="#" class="text-primary">términos y condiciones</a> 
                                    y la <a href="#" class="text-primary">política de privacidad</a>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success btn-auth">
                                <span class="btn-text">Crear Cuenta</span>
                                <span class="btn-loader">
                                    <i class="fas fa-spinner fa-spin"></i>
                                </span>
                            </button>
                        </form>

                        <div class="auth-footer">
                            <p>¿Ya tienes una cuenta? 
                                <a href="index.php" class="login-link">Inicia sesión aquí</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/auth.js"></script>
    <script src="../../assets/js/register-validation.js"></script>
</body>
</html>
