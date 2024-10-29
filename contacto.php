<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contáctanos en Muebles de Oficina Perfect. Preguntas, soporte, cotizaciones y más. Ubícanos en Madrid, España.">
    <title>Contacto - Muebles de Oficina Perfect</title>
    <link rel="stylesheet" href="contacto.css">
</head>

<body>
    <?php include 'nav.php'; ?>

    <main>
        <!-- Sección de Información de Contacto -->
        <section class="contact-info">
            <h2>Contáctanos</h2>
            <p>Nos encantaría saber de ti. Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.</p>
            <ul>
                <li><strong>Teléfono:</strong> <a href="tel:+34900123456">+34 900 123 456</a></li>
                <li><strong>Correo Electrónico:</strong> <a href="mailto:info@mueblesdeoficinaperfect.com">info@mueblesdeoficinaperfect.com</a></li>
                <li><strong>Dirección:</strong> Calle del Diseño, 123, 28001 Madrid, España</li>
                <li><strong>Horario de Atención:</strong> Lunes a Viernes: 9:00 AM - 6:00 PM <br>Sábados: 10:00 AM - 2:00 PM</li>
            </ul>
        </section>

        <!-- Sección del Formulario de Contacto -->
        <section class="contact-form">
            <h2>Formulario de Contacto</h2>
            <form action="#" method="POST" novalidate>
                <label for="name">Nombre Completo:</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required aria-required="true">

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" placeholder="nombre@ejemplo.com" required aria-required="true">

                <label for="phone">Teléfono:</label>
                <input type="tel" id="phone" name="phone" placeholder="+34 600 123 456" pattern="[+][0-9]{2} [0-9]{3} [0-9]{3} [0-9]{3}" required aria-required="true">

                <label for="subject">Asunto:</label>
                <select id="subject" name="subject" required aria-required="true">
                    <option value="general">Consulta General</option>
                    <option value="quotation">Solicitud de Cotización</option>
                    <option value="support">Soporte Técnico</option>
                    <option value="other">Otro</option>
                </select>

                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="5" placeholder="Escribe tu mensaje aquí..." required aria-required="true"></textarea>

                <button type="submit">Enviar</button>
            </form>
        </section>

        <!-- Sección de Redes Sociales -->
        <section class="social-media">
            <h2>Encuéntranos en Redes Sociales</h2>
            <ul>
                <li><a href="#" aria-label="Facebook de Muebles de Oficina Perfect" target="_blank" rel="noopener">Facebook</a></li>
                <li><a href="#" aria-label="Instagram de Muebles de Oficina Perfect" target="_blank" rel="noopener">Instagram</a></li>
                <li><a href="#" aria-label="LinkedIn de Muebles de Oficina Perfect" target="_blank" rel="noopener">LinkedIn</a></li>
            </ul>
        </section>

        <!-- Sección del Mapa -->
        <section class="map">
            <h2>Nuestra Ubicación</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3032.4265873435326!2d-3.691039085086909!3d40.41677517936313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228e9b56e4ff7%3A0x62b6d95a0a81dc6f!2sMadrid%2C%20España!5e0!3m2!1ses!2sus!4v1635442128746!5m2!1ses!2sus"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" aria-label="Ubicación de Muebles de Oficina Perfect en Google Maps"></iframe>
        </section>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Muebles de Oficina Perfect. Todos los derechos reservados.</p>
    </footer>

</body>

</html>
