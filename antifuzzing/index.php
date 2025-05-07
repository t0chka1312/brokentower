<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Broken Tower</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header>
    <h1>Broken Tower</h1>
    <nav>
        <a href="../index.php">Inicio</a>
        <a href="../servicios.php">Servicios</a>
        <a href="../contacto.php">Contacto</a>
        <a href="../login.php">Login</a>
    </nav>
</header>
<div class="container">
    <h2>Panel de Administración</h2>
    <p>Desde este panel puedes subir informes, scripts, configuraciones y archivos internos que serán tratados con alta confidencialidad por el equipo técnico.</p>
    <a href="upload.php"><button>Subir un archivo</button></a>
</div>
<footer>
    <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
</footer>
</body>
</html>
