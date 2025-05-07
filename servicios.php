<?php
include('srcbrokentower/db_connect.php');

$description = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Recupera descripcion PERO NO LA MUESTRA
    $query = "SELECT description FROM services WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $description = 'Servicio encontrado.';  // No mostramos lo real
    } else {
        $description = 'Servicio no disponible.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servicios - Broken Tower</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<header>
    <h1>Broken Tower</h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="servicios.php">Servicios</a>
        <a href="contacto.php">Contacto</a>
        <a href="login.php">Login</a>
    </nav>
</header>
<body>
    <h2>Nuestros Servicios de Ciberseguridad</h2>
    
    <ul class="container">
        <li><a href="servicios.php?id=1">Pentesting</a></li>
        <li><a href="servicios.php?id=2">Auditoría Web</a></li>
        <li><a href="servicios.php?id=3">Forensic Analysis</a></li>
        <li><a href="servicios.php?id=4">Red Team</a></li>
    </ul>
    
    <div class="service-description">
        <h2>Descripción del Servicio</h2>
        <p><?php echo htmlspecialchars($description); ?></p>
    </div>

    <footer>
        <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
