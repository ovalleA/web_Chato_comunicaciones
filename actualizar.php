<?php
include("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];

$sql = "UPDATE articulos SET nombre=?, descripcion=?, precio=?, imagen=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $imagen, $id);

$stmt->execute();

header("Location: dashboard.php");
?>