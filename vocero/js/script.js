// Verifica si hay una preferencia guardada al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    const modoOscuro = localStorage.getItem("modoOscuro");

    if (modoOscuro === "activado") {
        document.body.classList.add("oscuro-activo");
    }

    const botonModo = document.querySelector(".mode-oscuro");

    if (botonModo) {
        botonModo.addEventListener("click", () => {
            document.body.classList.toggle("oscuro-activo");

            // Guardar el estado en localStorage
            if (document.body.classList.contains("oscuro-activo")) {
                localStorage.setItem("modoOscuro", "activado");
            } else {
                localStorage.setItem("modoOscuro", "desactivado");
            }
        });
    }
});
