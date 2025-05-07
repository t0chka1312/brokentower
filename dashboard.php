<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Broken Tower</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1>Broken Tower</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="servicios.php">Servicios</a>
        <a href="contacto.php">Contacto</a>
        <a href="login.php">Login</a>
    </nav>
</header>
<div class="container">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p>Desde aquí puedes acceder al panel de administración y gestionar tus recursos internos.</p>
    <a href="antifuzzing/index.php"><button>Ir al Panel de Administración</button></a>
</div>
<footer>
    <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
</footer>
</body>
</html>
