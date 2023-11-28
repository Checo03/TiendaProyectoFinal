document.addEventListener('DOMContentLoaded', function () {
    var carruselItems = document.querySelectorAll('.Carrusel-Item');
    var currentIndex = 0;

    function mostrarSiguienteImagen() {
        carruselItems[currentIndex].style.display = 'none';
        currentIndex = (currentIndex + 1) % carruselItems.length;
        carruselItems[currentIndex].style.display = 'block';
    }

    setInterval(mostrarSiguienteImagen, 3000);
});

