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
