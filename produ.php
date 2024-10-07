<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos - DTDESK</title>
  <link rel="stylesheet" href="css/productos.css">
  <style>
    /* Estilo de productos y tarjetas */
    .product-list {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-around;
    }
    .product-card {
      border: 1px solid #ddd;
      padding: 15px;
      width: 250px;
      text-align: center;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .product-card img {
      max-width: 100%;
      height: auto;
    }
    .product-card h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }
    .product-card p {
      margin-bottom: 10px;
    }
    .product-card button {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
    .product-card button:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <?php
  include 'nav.php' 
 ?>
  <main>
    <section class="featured-products">
      <h2>Productos Destacados</h2>
      <div class="product-list">
          <div class="product-card">
              <a href="descripcion.php">
              <img src="img/escritorio1.jpg" alt="Escritorio Moderno">
              <h3>Escritorio Moderno</h3>
              <p>$100.000</p>
          </a>
          </div>
          <div class="product-card">
              <img src="ruta/a/imagen2.jpg" alt="Producto 2">
              <h3>Producto 2</h3>
              <p>$200</p>
              <button onclick="addToCart(2)">Añadir al Carrito</button>
          </div>
          <div class="product-card">
              <img src="ruta/a/imagen3.jpg" alt="Producto 3">
              <h3>Producto 3</h3>
              <p>$300</p>
              <button onclick="addToCart(3)">Añadir al Carrito</button>
          </div>
          <div class="product-card">
              <img src="ruta/a/imagen4.jpg" alt="Producto 4">
              <h3>Producto 4</h3>
              <p>$400</p>
              <button onclick="addToCart(4)">Añadir al Carrito</button>
          </div>
      </div>
  </section>

  </main>

  <script>
    // Función para agregar producto al carrito
    function addToCart(producto) {
      let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

      // Verificar si el producto ya está en el carrito
      const productoExistente = carrito.find(item => item.id === producto.id);

      if (productoExistente) {
        // Si ya está, incrementar la cantidad
        productoExistente.cantidad += 1;
      } else {
        // Si no está, agregarlo con cantidad 1
        carrito.push({ ...producto, cantidad: 1 });
      }

      // Guardar el carrito actualizado en localStorage
      localStorage.setItem('carrito', JSON.stringify(carrito));
      alert('Producto añadido al carrito.');
    }

    // Función para abrir la página de descripción
    function openDescriptionPage(productId) {
      window.location.href = `descripcion.php?id=${productId}`;
    }

    // Cargar productos desde el archivo JSON
    fetch('productos.json')
      .then(response => response.json())
      .then(data => {
        const productList = document.getElementById('product-list');
        data.productos.forEach(producto => {
          const productCard = document.createElement('div');
          productCard.classList.add('product-card');

          productCard.innerHTML = `
            <a href="javascript:void(0)" onclick="openDescriptionPage(${producto.id})">
              <img src="${producto.imagen}" alt="${producto.nombre}">
              <h3>${producto.nombre}</h3>
            </a>
            <p>${producto.descripcion}</p>
            <p><strong>$${producto.precio}</strong></p>
            <button onclick="addToCart(${JSON.stringify(producto)})">Añadir al Carrito</button>
          `;

          productList.appendChild(productCard);
        });
      })
      .catch(error => console.error('Error al cargar los productos:', error));
  </script>
</body>
</html>
