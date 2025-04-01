import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("dropdownToggle");
    const menu = document.getElementById("dropdownMenu");

    if (toggle && menu) {
        let isOpen = false;

        toggle.addEventListener("click", function (e) {
            e.stopPropagation(); // Förhindra att klicket bubblar vidare
            isOpen = !isOpen;

            if (isOpen) {
                menu.classList.remove("hidden");
            } else {
                menu.classList.add("hidden");
            }
        });

        document.addEventListener("click", function (e) {
            if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add("hidden");
                isOpen = false;
            }
        });
    }
});
