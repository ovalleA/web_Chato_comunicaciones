<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

<h3>Nuevo artículo</h3>

<form action="guardar.php" method="POST">
  <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
  <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción"></textarea>
  <input type="number" step="0.01" name="precio" class="form-control mb-2" placeholder="Precio">
  <input type="text" name="imagen" class="form-control mb-2" placeholder="URL imagen">

  <button class="btn btn-success">Guardar</button>
</form>

</body>
</html>