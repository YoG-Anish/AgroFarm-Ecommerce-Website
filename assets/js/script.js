document.addEventListener("DOMContentLoaded", function() {
    // 1. Get all the buttons and all the panels
    const buttons = document.querySelectorAll(".tab-btn");
    const panels = document.querySelectorAll(".tab-panel");

    // 2. Add a click event to every button
    buttons.forEach(function(button) {
        button.addEventListener("click", function() {
            
            // A. Remove 'active' class from ALL buttons
            buttons.forEach(function(btn) {
                btn.classList.remove("active");
            });

            // B. Remove 'active' class from ALL panels
            panels.forEach(function(panel) {
                panel.classList.remove("active");
            });

            // C. Add 'active' class to the clicked button
            this.classList.add("active");

            // D. Find the ID we need to show (from data-target) and add 'active' to it
            const targetID = this.getAttribute("data-target");
            document.getElementById(targetID).classList.add("active");
            
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {

    // Initialize all sliders on the page
    const productSliders = document.querySelectorAll('.small-product-slider');
    
    productSliders.forEach(function(slider) {
        // We initialize Swiper for each column
        new Swiper(slider, {
            slidesPerView: 1,      // 1 slide shows the group of 3 products
            spaceBetween: 20,
            loop: false,           // STOP the infinite loop
            autoplay: false,       // Don't move by itself
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true,
                bulletClass: 'dot',           // Matches CSS
                bulletActiveClass: 'active'   // Matches CSS
            },
        });
    });

});

document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonial-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: { delay: 1500 },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
});
document.addEventListener('DOMContentLoaded', function() {

    // 1. Initialize Product Column Sliders (The ones in 3 columns)
    const productSliders = document.querySelectorAll('.small-product-slider');
    productSliders.forEach(slider => {
        new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: false,
            autoplay: false,
            
            // SWIPE SETTINGS
            grabCursor: true,        // Shows the 'hand' icon so users know they can drag
            simulateTouch: true,    // Allows mouse dragging to act like a swipe
            allowTouchMove: true,   // Ensures swiping is enabled
            threshold: 5,           // The distance (in px) a user must move the mouse to trigger a swipe
            
            pagination: {
                el: slider.querySelector('.swiper-pagination'),
                clickable: true,
            },
        });
    });

    // 2. Initialize Testimonial Slider
    const testimonialSlider = document.querySelector('.testimonial-slider');
    if (testimonialSlider) {
        new Swiper(testimonialSlider, {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: { delay: 5000 },

            // SWIPE SETTINGS
            grabCursor: true,
            simulateTouch: true,
            allowTouchMove: true,

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
});