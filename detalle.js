// Datos de los productos
const productos = [
  {
    "id": 1,
    "nombre": "Escritorio Moderno",
    "descripcion": "Un escritorio moderno y elegante para tu oficina.",
    "precio": 666,
    "imagen": "img/escritorio1.jpg"
  },
  {
    "id": 2,
    "nombre": "Silla de Oficina",
    "descripcion": "Una silla cómoda y ergonómica.",
    "precio": 50666000,
    "imagen": "img/silla1.jpg"
  },
  {
    "id": 3,
    "nombre": "Lámpara de Escritorio",
    "descripcion": "Lámpara moderna con luz ajustable.",
    "precio": 20000,
    "imagen": "img/lampara1.jpg"
  }
];

// Función para obtener los parámetros de la URL
function obtenerProductoPorId(id) {
  return productos.find(producto => producto.id === parseInt(id));
}

// Obtener el parámetro 'id' de la URL
const params = new URLSearchParams(window.location.search);
const idProducto = params.get('id');

// Buscar el producto correspondiente
const producto = obtenerProductoPorId(idProducto);

// Mostrar el detalle del producto en la página
if (producto) {
  const detalleDiv = document.getElementById('detalleProducto');
  detalleDiv.innerHTML = `
    <h2>${producto.nombre}</h2>
    <img src="${producto.imagen}" alt="${producto.nombre}" width="300">
    <p>${producto.descripcion}</p>
    <p>Precio: $${producto.precio}</p>
  `;
} else {
  document.getElementById('detalleProducto').innerHTML = '<p>Producto no encontrado.</p>';
}
