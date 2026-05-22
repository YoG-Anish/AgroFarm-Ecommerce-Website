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