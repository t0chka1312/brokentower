<?php
session_start();
include('srcbrokentower/db_connect.php');

$error = '';

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // USO DE SENTENCIAS PREPARADAS PARA EVITAR INYECCIÓN SQL
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['username'] = $user;
        $_SESSION['upload_id'] = substr(md5(rand()), 0, 8);
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Login incorrecto.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Broken Tower</title>
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
    <h2>Acceso de Empleados</h2>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit" name="submit">Entrar</button>
    </form>
</div>
<footer>
    <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
</footer>
</body>
</html>
