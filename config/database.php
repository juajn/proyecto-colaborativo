<?php
class ConexionBD {
    private $host = '127.0.0.1';
    private $usuario = 'root';
    private $contrasena = '';
    private $baseDatos = 'proyecto';

    public   function conectar() {
        // Agregamos ruta del socket para macOS con XAMPP
        $socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
        $conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->baseDatos, 3306, $socket);
        
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
