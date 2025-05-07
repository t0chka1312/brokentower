<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Broken Tower</title>
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
    <h2>Contacto</h2>
    <p>Si tienes alguna duda sobre nuestra empresa, no dudes en contactarnos.</p>
    <form>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="6" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</div>
<footer>
    <p>&copy; 2025 Broken Tower. Todos los derechos reservados.</p>
</footer>
</body>
</html>
