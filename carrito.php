<?php
include 'nav.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito - DTDESK</title>
  <link rel="stylesheet" href="css/carrito.css">
</head>
<body>
 
  <main>
    <h2>Productos en tu carrito</h2>
    <table id="cart-table">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Subtotal</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody id="cart-items"></tbody>
    </table>
    <div class="total" id="total"></div>

    <!-- Botón para ver el recibo -->
    <div class="recibo-container">
      <button onclick="verRecibo()">Ver Recibo de Compra</button>
    </div>
  </main>

  <script>
    function loadCart() {
        const cartItems = document.getElementById('cart-items');
        const totalElement = document.getElementById('total');
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

        cartItems.innerHTML = '';
        let total = 0;

        carrito.forEach(producto => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;

            cartItems.innerHTML += `
                <tr>
                    <td>${producto.nombre}</td>
                    <td>${producto.cantidad}</td>
                    <td>$${producto.precio}</td>
                    <td>$${subtotal.toFixed(2)}</td>
                    <td><button onclick="removeFromCart(${producto.id})">Eliminar</button></td>
                </tr>
            `;
        });

        totalElement.textContent = 'Total: $' + total.toFixed(2);
    }

    function removeFromCart(productId) {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito = carrito.filter(producto => producto.id !== productId);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        loadCart();
    }

  function verRecibo() {
      const carrito = localStorage.getItem('carrito');
      const url = `recibo.php?carrito=${encodeURIComponent(carrito)}`;
      window.open(url, '_blank');  // Abre en una nueva pestaña
  }



    loadCart();
  </script>
</body>
</html>
