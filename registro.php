<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - DTDESK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            background-color: #444;
            overflow: hidden;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            float: left;
        }
        nav ul li a {
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        nav ul li a:hover {
            background-color: #555;
        }
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .register-container input[type="text"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .register-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .register-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<header>
    <h1>DTDESK</h1>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="productos.html">Productos</a></li>
        <li><a href="https://www.instagram.com/duki/">Contacto</a></li>
        <li><a href="login.php">Iniciar Sesion</a></li>
      </ul>
    </nav>
</header>

<main>
    <div class="register-container">
        <h2>Registro</h2>

        <!-- Mostrar mensaje de error o éxito -->
        <?php
        if (!empty($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        if (!empty($success_message)) {
            echo '<p class="success-message">' . $success_message . '</p>';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
    </div>
</main>

<footer>
    <center><p>&copy; 2024 DTDESK. Todos los derechos reservados.</p></center>
</footer>
</body>
</html>
