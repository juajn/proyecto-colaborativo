<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $bd = new ConexionBD();
        $this->conexion = $bd->conectar();
    }

    public function obtenerPorEmail($email) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function registrar($nombre, $email, $password, $id_rol) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, email, password, id_rol) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $nombre, $email, $hash, $id_rol);
        return $stmt->execute();
    }
}
