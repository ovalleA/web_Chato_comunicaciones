<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}

$result = $conn->query("SELECT * FROM articulos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard - Chato</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f4f6f9;
}

.sidebar {
    height: 100vh;
    background: #1f2937;
    color: white;
    padding: 20px;
}

.sidebar a {
    display: block;
    color: #cbd5e1;
    padding: 10px;
    text-decoration: none;
    border-radius: 8px;
}

.sidebar a:hover {
    background: #374151;
    color: white;
}

.card-custom {
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.stat {
    font-size: 24px;
    font-weight: bold;
}

</style>
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 sidebar">
        <h4>Chato</h4>
        <a href="#">Dashboard</a>
        <a href="#">Artículos</a>
        <a href="#">Ventas</a>
        <a href="#">Usuarios</a>
        <a href="logout.php" class="text-danger mt-3">Cerrar sesión</a>
    </div>

    <!-- MAIN -->
    <div class="col-md-10 p-4">

        <!-- HEADER -->
        <div class="d-flex justify-content-between mb-4">
            <h3>Panel de Administración</h3>
            <a href="crear.php" class="btn btn-primary">+ Nuevo artículo</a>
        </div>

        <!-- STATS -->
        <div class="row mb-4">

            <div class="col-md-3">
                <div class="card card-custom p-3">
                    <p>Total artículos</p>
                    <div class="stat">
                        <?php echo $result->num_rows; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-custom p-3">
                    <p>Ventas hoy</p>
                    <div class="stat text-success">$1,250</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-custom p-3">
                    <p>Clientes</p>
                    <div class="stat text-primary">320</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-custom p-3">
                    <p>Reparaciones</p>
                    <div class="stat text-warning">18</div>
                </div>
            </div>

        </div>

        <!-- GRAFICAS SIMULADAS -->
        <div class="row mb-4">

            <div class="col-md-6">
                <div class="card card-custom p-4">
                    <h5>Ingresos</h5>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-primary" style="width: 70%"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-custom p-4">
                    <h5>Actividad</h5>
                    <div class="progress mt-3">
                        <div class="progress-bar bg-success" style="width: 50%"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- TABLA ARTICULOS -->
        <div class="card card-custom p-3">
            <h5 class="mb-3">Artículos</h5>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td>$<?= $row['precio'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

    </div>
  </div>
</div>

</body>
</html>