<?php
// Iniciar la sesión
session_start();

// Variables para mensajes de error
$error_message = '';

// Si el formulario se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener usuario y contraseña
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar usuario y contraseña (esto es solo un ejemplo, usa base de datos en producción)
    if ($username == "usuario" && $password == "contraseña") {
        // Establecer variables de sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirigir al usuario a la página de inicio
        header("location: inicio.php");
        exit;
    } else {
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }
}
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DTDESK</title>
    <style>
       
        
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* Bordes redondeados */
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #1a1a1a; /* Fondo oscuro para el botón */
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s; /* Transición para el hover */
        }
        .login-container input[type="submit"]:hover {
            background-color: #333; /* Color más claro en hover */
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>

    <main>
        <div class="login-container">
            <h2>Iniciar Sesión</h2>
            <?php
            if (!empty($error_message)) {
                echo '<p class="error-message">' . $error_message . '</p>';
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" name="username" placeholder="Nombre de usuario" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 DTDESK. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
