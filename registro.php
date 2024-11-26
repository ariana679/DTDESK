<?php
// Incluir las clases necesarias de PHPMailer
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$error_message = $success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];  // El correo electrónico del usuario
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las contraseñas coinciden
    if ($password != $confirm_password) {
        $error_message = "Las contraseñas no coinciden.";
    } else {
        // Crear una nueva instancia de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'tu-correo@gmail.com'; // Tu dirección de correo Gmail
            $mail->Password = 'tu-contraseña-de-gmail'; // Tu contraseña de Gmail o contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Puerto para TLS

            // Configuración del correo
            $mail->setFrom('no-reply@dtdesk.com', 'DTDESK');
            $mail->addAddress($username);  // Enviar al correo ingresado por el usuario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Registro exitoso en DTDESK';
            $mail->Body    = "Hola $username,<br><br>Gracias por registrarte en DTDESK. Tu registro se ha completado con éxito.";

            // Enviar correo
            $mail->send();
            $success_message = "Te has registrado con éxito. Revisa tu correo electrónico para la confirmación.";
        } catch (Exception $e) {
            $error_message = "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - DTDESK</title>
    <style>
        /* Aquí iría el estilo CSS que ya tienes */
    </style>
</head>
<body>

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
            <input type="text" name="username" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="confirm_password" placeholder="Confirmar contraseña" required>
            <input type="submit" value="Registrarse">
        </form>
    </div>
</main>

</body>
</html>

