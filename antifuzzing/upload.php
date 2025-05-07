<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../login.php');
    exit();
}

$upload_id = $_SESSION['upload_id'];
$target_dir = "uploads/$upload_id/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

if(isset($_POST["submit"])) {
    $filename = basename($_FILES["fileToUpload"]["name"]);
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Ahora .phtml está permitida de forma normal junto a las extensiones de imagen
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'phtml'];

    if (in_array($extension, $allowed_extensions)) {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $filename);
        echo "<p style='color:lightgreen;'>Archivo subido correctamente.</p>";
    } else {
        echo "<p style='color:red;'>Tipo de archivo no permitido.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos - Broken Tower</title>
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
    <h2>Subida de Archivos Internos</h2>
    <p>Utiliza este formulario para enviar archivos de trabajo. Asegúrate de seguir el protocolo interno de seguridad al nombrarlos y clasificarlos.</p>

    <!-- Upload ID: <?php echo htmlspecialchars($upload_id); ?> -->

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Seleccionar archivo:</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit" name="submit">Subir Archivo</button>
    </form>
</div>
<footer>
    <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
</footer>
</body>
</html>
