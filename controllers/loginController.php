<?php
session_start();
require_once '../models/usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->obtenerPorEmail($email);

    if ($usuario && password_verify($password, $usuario['password'])) {
        $_SESSION['usuario'] = [
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'id_rol' => $usuario['id_rol']
        ];

        if ($usuario['id_rol'] == 1) {
            
            header("Location: ../views/admin/dashboard.php");
        } else {
            header("Location: ../views/usuario/index.php");
        }
        exit;
    } else {
        header("Location: ../views/login/index.php?error=Credenciales incorrectas");
        exit;
    }
}
