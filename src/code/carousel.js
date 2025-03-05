// carousel
const track = document.querySelector(".carousel-track");
const slides = Array.from(track.children);
let currentIndex = 0;

function moveToSlide(index) {
  const slideWidth = slides[0].getBoundingClientRect().width;
  track.style.transform = `translateX(-${index * slideWidth}px)`;
}

function autoSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  moveToSlide(currentIndex);
}

setInterval(autoSlide, 6000);