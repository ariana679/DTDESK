<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Empresa de Muebles</title>
    <link rel="stylesheet" href="css/contacto.css"> <!-- Asegúrate de crear un archivo CSS para estilos -->
</head>
<body>
    <?php include 'nav.php'; ?> <!-- Barra de navegación común -->

    <main>
        <section class="contacto">
            <div class="info-empresa">
                <h1>Contacto</h1>
                <p>¿Tienes preguntas o necesitas ayuda? ¡Estamos aquí para ti!</p>
                <p><strong>Dirección:</strong> Calle Principal 123, Ciudad Muebles, País</p>
                <p><strong>Teléfono:</strong> +1 555 555 555</p>
                <p><strong>Correo Electrónico:</strong> contacto@muebles.com</p>
                <p><strong>Horario de Atención:</strong> Lunes a Viernes, 9:00 AM - 6:00 PM</p>
            </div>

            <div class="formulario-contacto">
                <h2>Envíanos un mensaje</h2>
                <form action="procesar_contacto.php" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>

                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje aquí..." rows="5" required></textarea>

                    <button type="submit">Enviar Mensaje</button>
                </form>
            </div>

            <div class="mapa">
                <h2>Encuéntranos aquí</h2>
                <!-- Google Maps integrado -->
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.835434509689!2d-122.42124238468299!3d37.77492927975921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085809c5e14ed0b%3A0xe914560542fe27a5!2s123%20Main%20St%2C%20San%20Francisco%2C%20CA%2094130%2C%20EE.%20UU.!5e0!3m2!1ses!2ses!4v1696864014924!5m2!1ses!2ses" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2024 Empresa de Muebles. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
