"use strict";

// Função para adicionar eventos a múltiplos elementos
const addEventOnElements = function (elements, eventType, callback) {
    elements.forEach((element) =>
        element.addEventListener(eventType, callback)
    );
};

// Preloader
const preloader = document.querySelector("[data-preload]");

window.addEventListener("load", function () {
    preloader.classList.add("loaded");
    document.body.classList.add("loaded");
});

// Navbar
const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
    document.body.classList.toggle("nav-active");
};

addEventOnElements(navTogglers, "click", toggleNavbar);

// Header e botão voltar ao topo
const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

let lastScrollPos = 0;

const hideHeader = function () {
    const isScrollBottom = lastScrollPos < window.scrollY;
    header.classList.toggle("hide", isScrollBottom);
    lastScrollPos = window.scrollY;
};

window.addEventListener("scroll", function () {
    if (window.scrollY >= 50) {
        header.classList.add("active");
        backTopBtn.classList.add("active");
        hideHeader();
    } else {
        header.classList.remove("active");
        backTopBtn.classList.remove("active");
    }
});

// Slider
const heroSlider = document.querySelector("[data-hero-slider]");
const heroSliderItems = document.querySelectorAll("[data-hero-slider-item]");
const heroSliderPrevBtn = document.querySelector("[data-prev-btn]");
const heroSliderNextBtn = document.querySelector("[data-next-btn]");

let currentSlidePos = 0;
let lastActiveSliderItem = heroSliderItems[0];

const updateSliderPos = function () {
    lastActiveSliderItem.classList.remove("active");
    heroSliderItems[currentSlidePos].classList.add("active");
    lastActiveSliderItem = heroSliderItems[currentSlidePos];
};
const slideNext = function () {
    currentSlidePos =
        currentSlidePos >= heroSliderItems.length - 1 ? 0 : currentSlidePos + 1;
    updateSliderPos();
};

const slidePrev = function () {
    currentSlidePos =
        currentSlidePos <= 0 ? heroSliderItems.length - 1 : currentSlidePos - 1;
    updateSliderPos();
};

heroSliderNextBtn.addEventListener("click", slideNext);
heroSliderPrevBtn.addEventListener("click", slidePrev);

// Auto Slide
let autoSlideInterval;

const autoSlide = function () {
    autoSlideInterval = setInterval(slideNext, 7000);
};

addEventOnElements([heroSliderNextBtn, heroSliderPrevBtn], "mouseover", () =>
    clearInterval(autoSlideInterval)
);

addEventOnElements(
    [heroSliderNextBtn, heroSliderPrevBtn],
    "mouseout",
    autoSlide
);

window.addEventListener("load", autoSlide);

// Efeito Parallax
const parallaxItems = document.querySelectorAll("[data-parallax-item]");

window.addEventListener("mousemove", function (event) {
    const x = (event.clientX / window.innerWidth) * 10 - 5;
    const y = (event.clientY / window.innerHeight) * 10 - 5;

    parallaxItems.forEach((item) => {
        const speed = Number(item.dataset.parallaxSpeed);
        item.style.transform = `translate3d(${x * speed}px, ${
            y * speed
        }px, 0px)`;
    });
});

// Lógica de Login
const isUserLoggedIn = () => false; // Substitua por sua lógica real

const loginButton = document.getElementById("login-btn");
const logoutButton = document.getElementById("logout-btn");

if (isUserLoggedIn()) {
    loginButton.style.display = "none";
    logoutButton.style.display = "inline-block";
} else {
    loginButton.style.display = "inline-block";
    logoutButton.style.display = "none";
}

if (logoutButton) {
    logoutButton.addEventListener("click", function () {
        // Lógica de logout aqui
        loginButton.style.display = "inline-block";
        logoutButton.style.display = "none";
    });
}
