let index = 0; // Índice inicial de la imagen mostrada

function moveSlide(direction) {
    const slides = document.querySelectorAll('.slide');
    index += direction;

    // Si el índice es mayor que el número de slides, se vuelve al principio
    if (index >= slides.length) {
        index = 0;
    }

    // Si el índice es menor que 0, se va al último slide
    if (index < 0) {
        index = slides.length - 1;
    }

    // Mueve el slider a la posición correspondiente
    const slider = document.querySelector('.slider');
    slider.style.transform = `translateX(-${index * 100}%)`;
}

// Agregar un intervalo para cambiar las imágenes automáticamente cada 3 segundos
setInterval(() => {
    moveSlide(1); // Mueve al siguiente slide
}, 3000);


    function addToCart(productId) {
      alert('Producto ' + productId + ' añadido al carrito');
    }