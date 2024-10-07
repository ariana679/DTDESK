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
        // Obtener el carrito del localStorage
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        
        // Filtrar el producto que se quiere eliminar
        carrito = carrito.filter(producto => producto.id !== productId);
        
        // Guardar el carrito actualizado en localStorage
        localStorage.setItem('carrito', JSON.stringify(carrito));

        // Cargar de nuevo el carrito para actualizar la vista
        loadCart();
    }

    loadCart(); // Llama a esta función para cargar el carrito al cargar la página
  </script>
</body>
</html>
