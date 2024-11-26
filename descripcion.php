<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTS - REMODELACIONES</title>
    <link rel="stylesheet" href="css/des.css">
    <?php
    include 'nav.php';

    // Cargar datos de productos desde el archivo JSON
    $jsonData = file_get_contents('produ.json');
    if ($jsonData === false) {
        die("Error al leer el archivo JSON.");
    }
    $productos = json_decode($jsonData, true); // true para convertir a array asociativo

    if ($productos === null) {
        die("Error al decodificar el archivo JSON.");
    }

    // Obtener el id del producto desde la URL
    $idProducto = isset($_GET['id']) ? (int)$_GET['id'] : 1;

    // Buscar el producto por su ID
    $producto = null;
    foreach ($productos as $item) {
        if ($item['id'] === $idProducto) {
            $producto = $item;
            break;
        }
    }

    // Fallback si no se encuentra el producto
    if (!$producto) {
        $producto = $productos[0]; // Primer producto como predeterminado
    }
    ?>
</head>

<body>

    <main>
        <section class="product-description">
            <div class="image-container">
                <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </div>
            <div class="details-container">
                <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                <p class="price">$<?php echo number_format($producto['precio'], 2); ?></p>
                <p class="description">
                    <?php echo htmlspecialchars($producto['descripcion']); ?>
                </p>
               
                <button onclick="addToCart(<?php echo $producto['id']; ?>)">Añadir al Carrito</button>
            </div>
        </section>
    </main>

    <script>
        function addToCart(productId) {
            // Datos dinámicos del producto (inicializados desde PHP)
            const product = {
                id: <?php echo $producto['id']; ?>,
                nombre: "<?php echo addslashes($producto['nombre']); ?>",
                precio: <?php echo $producto['precio']; ?>,
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
            alert('Producto ' + product.nombre + ' añadido al carrito.');
        }
    </script>

</body>
</html>
