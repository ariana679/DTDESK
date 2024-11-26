<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTDESK - REMODELACIONES</title>
    <style>
        /* Estilos generales del encabezado */
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #1a1a1a; 
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 2px rgba(0, 0, 0, 0.3); 
            position: relative;
        }
        
        /* Contenedor del logo, menú y carrito */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Espacio entre logo, menú y carrito */
            background-color: #1a1a1a;
            padding: 7px 20px;
        }
        
        /* Logo a la izquierda */
        .logo img {
            height: 60px;
            cursor: pointer;
        }
        
        /* Menú centrado */
        nav ul.menu {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: #000000;
            border-radius: 50px;
            padding: 16px;
        }

        /* Elementos del menú principal */
        nav ul.menu li {
            position: relative; /* Necesario para dropdown */
            margin: 0 10px;
        }

        nav ul.menu li a {
            text-decoration: none;
            color: #FFFFFF;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul.menu li a:hover {
            background-color: #333333;
            box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        /* Dropdown */
        nav ul.menu li.dropdown .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #1a1a1a;
            border-radius: 10px;
            list-style: none;
            padding: 10px 0;
            min-width: 200px;
            z-index: 10;
        }

        nav ul.menu li.dropdown .dropdown-menu li {
            padding: 5px 20px;
        }

        nav ul.menu li.dropdown .dropdown-menu li a {
            color: #FFFFFF;
            padding: 5px 10px;
            text-decoration: none;
            display: block;
        }

        nav ul.menu li.dropdown .dropdown-menu li a:hover {
            background-color: #333333;
            border-radius: 5px;
        }

        /* Mostrar el Dropdown */
        nav ul.menu li.dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Carrito a la derecha */
        .carrito {
            position: relative;
        }
        .carrito img {
            width: 50px;
            height: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .carrito:hover {
            border-radius: 50%;
            padding: 10px;
        }
        .carrito .badge {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 17px;
        }
    </style>
</head>
<body>
    <header>
        <h1>DTDESK - REMODELACIONES</h1>
        <nav>
            <!-- Logo a la izquierda -->
            <a href="index.php" class="logo">
                <img src="img/logo.png" alt="DTDESK Logo">
            </a>

            <!-- Menú centrado -->
            <ul class="menu">
                <li><a href="index.php">INICIO</a></li>
                <li> <a href="produ.php">PRODUCTOS</a></li>
                <li><a href="contacto.php">CONTACTO</a></li>
                <li><a href="registro.php">REGISTRO</a></li>
                <li><a href="login.php">INICIO SESION</a></li>

            </ul>

            <!-- Carrito a la derecha -->
            <div class="carrito">
                <a href="carrito.php">
                    <img src="img/carrito.png" alt="Carrito de compras">
                    <span id="cart-count" class="badge">0</span>
                </a>
            </div>
        </nav>
    </header>

    <script>
        function updateCartCount() {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
            document.getElementById('cart-count').textContent = totalProductos;
        }

        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
</body>
</html>
