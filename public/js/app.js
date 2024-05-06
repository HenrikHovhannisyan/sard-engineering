// Start Banner
const progressCircle = document.querySelector(".autoplay-progress svg");
const progressContent = document.querySelector(".autoplay-progress span");
let swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    on: {
        autoplayTimeLeft(s, time, progress) {
            progressCircle.style.setProperty("--progress", 1 - progress);
            progressContent.textContent = `${Math.ceil(time / 1000)}s`;
        }
    }
});

// End Banner

// Start Our Works
let myModal = document.getElementById('ourWorksModal');
myModal.addEventListener('show.bs.modal', function (event) {
    let image = event.relatedTarget.getAttribute('data-bs-image');
    let modalImage = myModal.querySelector('#modalImage');
    modalImage.src = image;
})
// End Our Works

