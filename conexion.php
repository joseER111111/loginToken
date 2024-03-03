<?php
$conexion = new mysqli('localhost', 'root', 'root', 'toke');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>