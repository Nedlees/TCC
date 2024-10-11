document.addEventListener('DOMContentLoaded', () => {
    const carousels = document.querySelectorAll('.carousel');

    carousels.forEach((carousel) => {
        const container = carousel.querySelector('.carousel-container');
        const items = container.querySelectorAll('.carousel-item');
        const prevButton = carousel.querySelector('.prev');
        const nextButton = carousel.querySelector('.next');
        const status = document.querySelector(`#carouselStatus${carousel.id}`);

        let index = 0;
        let autoPlay;

        function updateCarousel() {
            container.style.transform = `translateX(${-index * 100}%)`;
            status.textContent = `Slide ${index + 1} de ${items.length}`;
            prevButton.disabled = items.length <= 1;
            nextButton.disabled = items.length <= 1;
        }

        function showSlide(newIndex) {
            index = (newIndex + items.length) % items.length; // Loop index
            updateCarousel();
        }

        prevButton.addEventListener('click', () => {
            showSlide(index - 1);
        });

        nextButton.addEventListener('click', () => {
            showSlide(index + 1);
        });

        // Função para o carrossel automático
        function startAutoPlay() {
            return setInterval(() => {
                showSlide(index + 1);
            }, 10000); // Mude o intervalo para ajustar a velocidade
        }

        autoPlay = startAutoPlay();

        // Pause o carrossel automático ao passar o mouse
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoPlay);
        });

        // Reinicie o carrossel automático ao sair do mouse
        carousel.addEventListener('mouseleave', () => {
            autoPlay = startAutoPlay();
        });

        updateCarousel();
    });
});
