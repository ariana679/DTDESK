<?php
// nav.php
?>

<header>
    <h1>DTDESK - Productos</h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="produ.php">Productos</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
            <li>
            <div class="carrito">
        <a href="carrito.php">
            <img src="img\carrito.png" alt="Carrito de compras">
            <span id="cart-count" class="badge">0</span>

        </a>
    </div>
            </li>
        </ul>
    </nav>
    
    <script>
        function updateCartCount() {
            let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            let totalProductos = carrito.reduce((acc, producto) => acc + producto.cantidad, 0);
            document.getElementById('cart-count').textContent = totalProductos;
        }

        // Actualizar el contador de productos en la barra de navegación al cargar la página
        document.addEventListener('DOMContentLoaded', updateCartCount);
    </script>
</header>

<style>
    /* Estilos generales del encabezado */
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Vista completa */
}
    header {
        background-color: #1a1a1a; 
        padding: 40px 0 5px; 
        text-align: center;
        box-shadow: 0 4px 2px rgba(0, 0, 0, 0.3); 
        position: relative;
    }

    /* Estilo del título */
    header h1 {
        font-family: 'Poppins', sans-serif;
        font-size: 32px;
        color: #FFFFFF; 
        margin: 0;
        letter-spacing: 4px; 
        text-transform: uppercase;
        font-weight: bold;
    }
    nav {
        background-color: #1a1a1a; /* Fondo oscuro para el nav */
        padding: 10px 0; /* Espacio ajustado en el nav */
    }
    /* Estilo del menú de navegación */
    header nav ul {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
    margin: 10px auto 0; /* Centra el menú */
    background-color: #000000;
    border-radius: 50px;
    padding: 16px 0px;
    max-width: fit-content;
}


    /* Estilo de los elementos de la lista */
    header nav ul li {
        margin: 0 10px;
    }

    /* Estilo de los enlaces */
    header nav ul li a {
        font-family: 'Poppins', sans-serif;
        text-decoration: none;
        color: #FFFFFF; /* Color de texto blanco */
        font-size: 18px;
        padding: 10px 20px;
        border-radius: 30px;
        transition: all 0.3s ease;
        position: relative;
        z-index: 1;
    }

    /* Efecto hover con estilo de fondo */
    header nav ul li a:hover {
        background-color: #333333; 
        color: #FFFFFF; 
        box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2); /* Sombra aún más angosta */
        transform: scale(1.05); 
    }

    /* Efecto para el enlace activo */
    header nav ul li a.active {
        background-color: #E5E5E5; 
        color: #000000; 
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }
    header nav ul li a:not(.carrito a):before {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: #FFFFFF; 
    bottom: -10px;
    left: 0;
    transform: scaleX(0);
    transition: transform 0.3s ease;
    z-index: -1;
}

header nav ul li a:not(.carrito a):hover:before {
    transform: scaleX(1);
}


 /* Estilos generales del carrito */
.carrito {
    position: fixed;
    top: 10px;
    right: 5px;
}

.carrito img {
    width: 50px;
    height: 50px;
    cursor: pointer;
    transition: all 0.3s ease; /* Transición suave */
}

.carrito:hover {
    border-radius: 50%; /* Bordes redondeados */
    padding: 10px;
}



/* Estilos del contador de productos en el carrito */
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
