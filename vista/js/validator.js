document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("form-numero"); // <-- corregido
    const numeroInput = document.getElementById("numero");
    const mensajeError = document.getElementById("mensaje-error");

    formulario.addEventListener("submit", function(event) {
        let numero = numeroInput.value.trim();
        let mensaje = "";

        if(numero === ""){
            mensaje = "Debes de ingresar un número.";
        } else if(isNaN(numero)){
            mensaje = "Solo puedes ingresar valores numéricos."; 
        }

        if(mensaje !== ""){
            mensajeError.textContent = mensaje;
            event.preventDefault();
        } else {
            mensajeError.textContent = "";
        }
    }); 
});


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
// Ejercicio 4 TP 2 - Película
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("peliculaForm");
  if (!form) return;

  const fields = {
    titulo: document.getElementById("titulo"),
    actores: document.getElementById("actores"),
    director: document.getElementById("director"),
    guion: document.getElementById("guion"),
    produccion: document.getElementById("produccion"),
    anio: document.getElementById("anio"),
    duracion: document.getElementById("duracion"),
    nacionalidad: document.getElementById("nacionalidad"),
    sinopsis: document.getElementById("sinopsis"),
  };

  const restriccionRadios = Array.from(document.querySelectorAll('input[name="restriccion"]'));

  const markInvalid = (el) => el && el.classList.add("is-invalid");
  const unmarkInvalid = (el) => el && el.classList.remove("is-invalid");

  Object.values(fields).forEach((el) => {
    if (el) el.addEventListener("input", () => unmarkInvalid(el));
  });
  restriccionRadios.forEach((r) =>
    r.addEventListener("change", () => restriccionRadios.forEach(unmarkInvalid))
  );

  form.addEventListener("submit", (event) => {
    let isValid = true;

    const { titulo, actores, director, guion, produccion, anio, duracion, nacionalidad, sinopsis } = fields;

    Object.values(fields).forEach(unmarkInvalid);
    restriccionRadios.forEach(unmarkInvalid);

    if (!titulo.value || titulo.value.trim().length < 2) { markInvalid(titulo); isValid = false; }
    if (!actores.value) { markInvalid(actores); isValid = false; }
    if (!director.value) { markInvalid(director); isValid = false; }
    if (!guion.value) { markInvalid(guion); isValid = false; }
    if (!produccion.value) { markInvalid(produccion); isValid = false; }

    if (!anio.value || !/^\d{4}$/.test(anio.value)) { markInvalid(anio); isValid = false; }
    if (!duracion.value || !/^\d{1,3}$/.test(duracion.value) || parseInt(duracion.value, 10) <= 0) {
      markInvalid(duracion); isValid = false;
    }

    if (!nacionalidad.value) { markInvalid(nacionalidad); isValid = false; }
    if (!sinopsis.value || sinopsis.value.trim().length < 10) { markInvalid(sinopsis); isValid = false; }

    if (!restriccionRadios.some(r => r.checked)) {
      restriccionRadios.forEach(markInvalid);
      isValid = false;
    }

    // Mostrar mensajes de Bootstrap
    form.classList.add("was-validated");

    if (!isValid) {
      event.preventDefault();
      event.stopPropagation();
    }
  });
});


