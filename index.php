<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DTDESK REMODELACIONES</title>
  <link rel="stylesheet" href="css/styles.css"> <!-- Aquí se carga el CSS externo -->
  <script src="js/scripts.js"></script>
</head>
<body>

<br>

<!-- Slider Section -->
<div class="slider-container">
    <div class="slider">
        <div class="slide fade">
            <img src="img/slider3.jpg" alt="Remodelaciones modernas">
            <div class="slide-text">Transforma tu espacio con estilo</div>
        </div>
        <div class="slide">
            <img src="img/d.png" alt="Diseño innovador">
            <div class="slide-text">Calidad y elegancia en cada detalle</div>
        </div>
        <div class="slide">
            <img src="img/slider1.jpg" alt="Estilo único">
            <div class="slide-text">Renueva tu hogar hoy mismo</div>
        </div>
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</div>

<script>
  // Script de control para el slider
  let currentSlide = 0;

  function moveSlide(step) {
    const slides = document.querySelectorAll('.slide');
    currentSlide = (currentSlide + step + slides.length) % slides.length;
    const slider = document.querySelector('.slider');
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
  }

  // Función para hacer que las imágenes se desvanecen
  function startSlideShow() {
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    setInterval(() => {
      slides[currentIndex].classList.remove('fade');
      currentIndex = (currentIndex + 1) % slides.length;
      slides[currentIndex].classList.add('fade');
    }, 3000); // Cambia cada 3 segundos
  }

  startSlideShow();
</script>

</body>
</html>
