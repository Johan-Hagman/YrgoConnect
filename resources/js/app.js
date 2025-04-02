import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("dropdownToggle");
    const menu = document.getElementById("dropdownMenu");

    toggle?.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });
});
