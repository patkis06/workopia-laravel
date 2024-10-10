import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

Alpine.store("menu", {
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    },
});
