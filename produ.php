<?php
// Obtener la categoría seleccionada desde la URL, si existe
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';

// Leer datos de productos desde el archivo JSON
$jsonData = file_get_contents('productos.json');
$productos = json_decode($jsonData, true); // Convertir el JSON a un array asociativo

// Filtrar productos según la categoría
if ($categoria !== 'todos') {
    $productos = array_filter($productos, function($producto) use ($categoria) {
        return $producto['categoria'] === $categoria;
    });
}

// Filtrar productos por rango de precio
$precioMin = isset($_GET['precioMin']) ? (float)$_GET['precioMin'] : 0;
$precioMax = isset($_GET['precioMax']) ? (float)$_GET['precioMax'] : INF;
$productosFiltrados = array_filter($productos, function($producto) use ($precioMin, $precioMax) {
    return $producto['precio'] >= $precioMin && $producto['precio'] <= $precioMax;
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos - DTDESK</title>
  <link rel="stylesheet" href="css/productos.css">
  <link rel="stylesheet" href="css/filtro.css">
</head>
<body>
  <?php include 'nav.php'; ?>

  <main>
    <section class="featured-products">
      <h2>Productos Disponibles</h2>

      <!-- Campo de búsqueda -->
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar productos..." onkeyup="searchProducts()">
      </div>

      <!-- Formulario de filtrado -->
      <div class="filtros">
        <h2>Filtrar por:</h2>
        <form method="GET" action="">
          <label for="precioMin">Precio mínimo:</label>
          <input type="number" id="precioMin" name="precioMin" placeholder="0" min="0" value="<?php echo isset($_GET['precioMin']) ? $_GET['precioMin'] : ''; ?>">
          
          <label for="precioMax">Precio máximo:</label>
          <input type="number" id="precioMax" name="precioMax" placeholder="100000" min="0" value="<?php echo isset($_GET['precioMax']) ? $_GET['precioMax'] : ''; ?>">
          
          <button type="submit">Filtrar</button>
        </form>
      </div>

      <!-- Grid de productos con búsqueda y filtro -->
      <div class="product-list produ-grid" id="productList">
        <?php
        // Mostrar productos filtrados
        if (count($productosFiltrados) > 0) {
          foreach ($productosFiltrados as $producto) {
            echo '<div class="product-card">';
            echo '<a href="javascript:void(0)" onclick="openDescriptionPage(' . $producto['id'] . ')">';
            echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">';
            echo '<h3>' . $producto['nombre'] . '</h3>';
            echo '</a>';
            echo '<p>' . $producto['descripcion'] . '</p>';
            echo '<p><strong>$' . number_format($producto['precio'], 2) . '</strong></p>';
            echo '</div>';
          }
        } else {
          echo '<p>No se encontraron productos en el rango de precios seleccionado o en esta categoría.</p>';
        }
        ?>
      </div>
    </section>
  </main>

  <script>
    function addToCart(productoId) {
      let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
      const productoExistente = carrito.find(item => item.id === productoId);

      if (productoExistente) {
        productoExistente.cantidad += 1;
      } else {
        carrito.push({ id: productoId, cantidad: 1 });
      }

      localStorage.setItem('carrito', JSON.stringify(carrito));
      alert('Producto añadido al carrito.');
    }

    function searchProducts() {
      const input = document.getElementById('searchInput').value.toLowerCase();
      const productCards = document.getElementsByClassName('product-card');

      Array.from(productCards).forEach(card => {
        const productName = card.querySelector('h3').textContent.toLowerCase();
        if (productName.includes(input)) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    }

    function openDescriptionPage(productId) {
      window.location.href = `descripcion.php?id=${productId}`;
    }
  </script>
</body>
</html>
