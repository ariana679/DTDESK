
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritorio Moderno - DTDESK</title>
    <link rel="stylesheet" href="css/des.css">
</head>

<body>
<?php
include 'nav.php';
?>
    <main>
        <section class="product-description">
            <div class="image-container">
                <img src="img/escritorio1.jpg" alt="Escritorio Moderno">
            </div>
            <div class="details-container">
                <h2>Escritorio Moderno</h2>
                <p class="price">$100.000</p>
                <p class="description">
                    El <strong>escritorio moderno</strong> está diseñado para optimizar tu espacio de trabajo. 
                    Fabricado con madera de alta calidad, este escritorio combina elegancia y funcionalidad.
                    Su diseño minimalista se adapta perfectamente a oficinas, estudios o habitaciones.
                </p>
                <ul>
                    <li><strong>Material:</strong> Madera maciza con acabado de barniz mate.</li>
                    <li><strong>Dimensiones:</strong> 120 cm x 60 cm x 75 cm.</li>
                    <li><strong>Color:</strong> Madera clara natural.</li>
                    <li><strong>Funcionalidad:</strong> Bandeja deslizante para teclado y espacio de almacenamiento inferior.</li>
                </ul>
                <button onclick="addToCart(1)">Añadir al Carrito</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 DTDESK. Todos los derechos reservados.</p>
    </footer>

    <script>
    
        function addToCart(productId) {
            const product = {
                id: productId,
                nombre: 'Escritorio Moderno',
                precio: 100000,
                cantidad: 1
            };

            // Obtener el carrito del localStorage
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            console.log('Carrito obtenido:', carrito);

            if (!Array.isArray(carrito)) {
    carrito = []; // Inicializa como un array vacío si no es válido
}

            // Verificar si el producto ya está en el carrito
            const existingProductIndex = carrito.findIndex(item => item.id === productId);

            if (existingProductIndex > -1) {
                // Si el producto ya existe, incrementar la cantidad
                carrito[existingProductIndex].cantidad += 1;
            } else {
                // Si el producto no existe, añadirlo al carrito
                carrito.push(product);
            }

            // Guardar el carrito actualizado en localStorage
            localStorage.setItem('carrito', JSON.stringify(carrito));

            // Mensaje de confirmación
            alert('Producto ' + productId + ' añadido al carrito.');
        }

        </script>
  
    </body>
</html>
