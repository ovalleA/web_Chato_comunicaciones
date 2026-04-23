<?php
include("conexion.php");

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM articulos WHERE id=$id");
$data = $result->fetch_assoc();
?>

<form action="actualizar.php" method="POST" class="container mt-5">
  <input type="hidden" name="id" value="<?= $data['id'] ?>">

  <input type="text" name="nombre" value="<?= $data['nombre'] ?>" class="form-control mb-2">
  <textarea name="descripcion" class="form-control mb-2"><?= $data['descripcion'] ?></textarea>
  <input type="number" step="0.01" name="precio" value="<?= $data['precio'] ?>" class="form-control mb-2">
  <input type="text" name="imagen" value="<?= $data['imagen'] ?>" class="form-control mb-2">

  <button class="btn btn-primary">Actualizar</button>
</form>