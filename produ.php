<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filtrado de Productos</title>
  <link rel="stylesheet" href="css/filtro.css">
  </head>
<body>
  <!-- Incluir el nav.php -->
  <?php include 'nav.php'; ?>

  <div class="container">
    <h1>Productos Disponibles</h1>

    <!-- Formulario de filtrado -->
    <div class="filtros">
      <h2>Filtrar por:</h2>
      <form method="GET" action="produ.php">
        <label for="precioMin">Precio mínimo:</label>
        <input type="number" id="precioMin" name="precioMin" placeholder="0" min="0" value="<?php echo isset($_GET['precioMin']) ? $_GET['precioMin'] : ''; ?>">
        
        <label for="precioMax">Precio máximo:</label>
        <input type="number" id="precioMax" name="precioMax" placeholder="100000" min="0" value="<?php echo isset($_GET['precioMax']) ? $_GET['precioMax'] : ''; ?>">
        
        <button type="submit">Filtrar</button>
      </form>
    </div>

    <!-- Grid de productos -->
    <div class="produ-grid">
      <?php
      // Datos de los productos (esto usualmente vendría de una base de datos)
      $productos = [
        [
          "id" => 1,
          "nombre" => "Escritorio Moderno",
          "descripcion" => "Un escritorio moderno y elegante para tu oficina.",
          "precio" => 999999,
          "imagen" => "img/escritorio1.jpg"
        ],
        [
          "id" => 2,
          "nombre" => "Silla de Oficina",
          "descripcion" => "Una silla cómoda y ergonómica.",
          "precio" => 150000,
          "imagen" => "img/silla1.jpg"
        ],
        [
          "id" => 3,
          "nombre" => "Lámpara de Escritorio",
          "descripcion" => "Lámpara moderna con luz ajustable.",
          "precio" => 30000,
          "imagen" => "img/lampara1.jpg"
        ]
      ];

      // Obtener los filtros de precio mínimo y máximo
      $precioMin = isset($_GET['precioMin']) ? (float)$_GET['precioMin'] : 0;
      $precioMax = isset($_GET['precioMax']) ? (float)$_GET['precioMax'] : INF;

      // Filtrar productos por precio
      $productosFiltrados = array_filter($productos, function($producto) use ($precioMin, $precioMax) {
        return $producto['precio'] >= $precioMin && $producto['precio'] <= $precioMax;
      });

      // Mostrar productos filtrados
      if (count($productosFiltrados) > 0) {
        foreach ($productosFiltrados as $producto) {
          echo '<div class="producto">';
          echo '<a href="detalle.php?id=' . $producto['id'] . '">';
          echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">';
          echo '<h2>' . $producto['nombre'] . '</h2>';
          echo '</a>';
          echo '<p>' . $producto['descripcion'] . '</p>';
          echo '<p>Precio: $' . number_format($producto['precio'], 2) . '</p>';
          echo '</div>';
        }
      } else {
        echo '<p>No se encontraron productos en el rango de precios seleccionado.</p>';
      }
      ?>
    </div>
  </div>

</body>
</html>
