// Ejercio 3 TP 2 - Login
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("loginForm");

    form.addEventListener("submit", function(event) {
        let isValid = true;

        const username = document.getElementById("username");
        const password = document.getElementById("password");

        // Reiniciar clases de error
        username.classList.remove("is-invalid");
        password.classList.remove("is-invalid");

        // Validar usuario
        if (!username.value || username.value.length < 4) {
            username.classList.add("is-invalid");
            isValid = false;
        }

        // Validar contraseña
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;
        if (!password.value || password.value.length < 8 || !passwordRegex.test(password.value)) {
            password.classList.add("is-invalid");
            isValid = false;
        }

        // Contraseña diferente a usuario
        if (password.value === username.value) {
            password.classList.add("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); 
        }
    });

    const inputs = form.querySelectorAll("input");
    inputs.forEach(input => {
        input.addEventListener("input", () => input.classList.remove("is-invalid"));
    });
});



// Ejercio 4 TP 2 - Película
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("peliculaForm");
    if (!form) return;

    form.addEventListener("submit", function(event) {
        let isValid = true;

        const titulo = document.getElementById("titulo");
        const actores = document.getElementById("actores");
        const director = document.getElementById("director");
        const guion = document.getElementById("guion");
        const produccion = document.getElementById("produccion");
        const anio = document.getElementById("anio");
        const duracion = document.getElementById("duracion");
        const nacionalidad = document.getElementById("nacionalidad1");
        const sinopsis = document.getElementById("sinopsis");
        const restriccionRadios = document.querySelectorAll('input[name="restriccion"]');

        // Reiniciar clases
        [titulo, actores, director, guion, produccion, anio, duracion, nacionalidad, sinopsis].forEach(campo => campo.classList.remove("is-invalid"));
        restriccionRadios.forEach(radio => radio.classList.remove("is-invalid"));

        // Validaciones
        if (!titulo.value || titulo.value.trim().length < 2) { titulo.classList.add("is-invalid"); isValid = false; }
        if (!actores.value) { actores.classList.add("is-invalid"); isValid = false; }
        if (!director.value) { director.classList.add("is-invalid"); isValid = false; }
        if (!guion.value) { guion.classList.add("is-invalid"); isValid = false; }
        if (!produccion.value) { produccion.classList.add("is-invalid"); isValid = false; }
        if (!anio.value || !/^\d{4}$/.test(anio.value)) { anio.classList.add("is-invalid"); isValid = false; }
        if (!duracion.value || !/^\d{1,3}$/.test(duracion.value) || parseInt(duracion.value) <= 0) { duracion.classList.add("is-invalid"); isValid = false; }
        if (!nacionalidad.value) { nacionalidad.classList.add("is-invalid"); isValid = false; }
        if (!sinopsis.value || sinopsis.value.trim().length < 10) { sinopsis.classList.add("is-invalid"); isValid = false; }

        // Validación de radio
        if (![...restriccionRadios].some(r => r.checked)) {
            restriccionRadios.forEach(r => r.classList.add("is-invalid"));
            isValid = false;
        }

        if (!isValid) event.preventDefault();

        // Quitar error al escribir o cambiar
        [titulo, actores, director, guion, produccion, anio, duracion, nacionalidad, sinopsis].forEach(campo => {
            campo.addEventListener("input", () => campo.classList.remove("is-invalid"));
        });
        restriccionRadios.forEach(r => r.addEventListener("change", () => r.classList.remove("is-invalid")));
    });
});