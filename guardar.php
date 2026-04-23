<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

$sql = "INSERT INTO articulos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen);

$stmt->execute();

header("Location: dashboard.php");
?>