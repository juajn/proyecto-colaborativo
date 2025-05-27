<?php
require_once '../models/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $id_rol = 2; // rol 'usuario' por defecto

    $usuarioModel = new Usuario();
    $existe = $usuarioModel->obtenerPorEmail($email);

    if ($existe) {
        header("Location: ../views/login/registro.php?error=Correo ya registrado");
    } else {
        $registrado = $usuarioModel->registrar($nombre, $email, $password, $id_rol);
        if ($registrado) {
            header("Location: ../views/login/index.php?success=Registro exitoso, inicia sesión");
        } else {
            header("Location: ../views/login/registro.php?error=Error al registrar");
        }
    }
    exit;
}
