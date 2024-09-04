// script.js

let slideIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
const delay = 2000; // 3 seconds

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.style.display = i === index ? 'block' : 'none';
    });
}

function nextSlide() {
    slideIndex = (slideIndex + 1) % totalSlides;
    showSlide(slideIndex);
}

function prevSlide() {
    slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
    showSlide(slideIndex);
}

document.querySelector('.next').addEventListener('click', nextSlide);
document.querySelector('.prev').addEventListener('click', prevSlide);

// Initialize the slider
showSlide(slideIndex);

// Automatic slide change every 3 seconds
setInterval(nextSlide, delay);
