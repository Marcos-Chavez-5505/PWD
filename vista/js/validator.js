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
// Ejercicio 3 TP 3 - Película
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("peliculaForm");
  if (!form) return; // única salida

  const fields = {
    titulo: document.getElementById("titulo"),
    actores: document.getElementById("actores"),
    director: document.getElementById("director"),
    guion: document.getElementById("guion"),
    produccion: document.getElementById("produccion"),
    anio: document.getElementById("anio"),
    duracion: document.getElementById("duracion"),
    nacionalidad: document.getElementById("nacionalidad"),
    genero: document.getElementById("genero"),
    sinopsis: document.getElementById("sinopsis"),
  };

  const restriccionRadios = Array.from(
    document.querySelectorAll('input[name="restriccion"]')
  );

  const markInvalid = (el) => el && el.classList.add("is-invalid");
  const markValid = (el) => el && el.classList.add("is-valid");
  const unmarkInvalid = (el) => el && el.classList.remove("is-invalid");
  const unmarkValid = (el) => el && el.classList.remove("is-valid");

  // Limpiar clases al escribir/cambiar
  Object.values(fields).forEach((el) => {
    if (el) el.addEventListener("input", () => {
      unmarkInvalid(el);
      unmarkValid(el);
    });
  });
  restriccionRadios.forEach((r) =>
    r.addEventListener("change", () => {
      restriccionRadios.forEach((radio) => {
        unmarkInvalid(radio);
        markValid(radio);
      });
    })
  );

  form.addEventListener("submit", function (event) {
    let isValid = true;
    const currentYear = new Date().getFullYear();

    // Limpiar estados previos
    Object.values(fields).forEach((el) => {
      unmarkInvalid(el);
      unmarkValid(el);
    });
    restriccionRadios.forEach((r) => {
      unmarkInvalid(r);
      unmarkValid(r);
    });

    // Validaciones
    if (!fields.titulo.value || fields.titulo.value.trim().length < 2) {
      markInvalid(fields.titulo);
      isValid = false;
    } else {
      markValid(fields.titulo);
    }

    if (!fields.actores.value) {
      markInvalid(fields.actores);
      isValid = false;
    } else {
      markValid(fields.actores);
    }

    if (!fields.director.value) {
      markInvalid(fields.director);
      isValid = false;
    } else {
      markValid(fields.director);
    }

    if (!fields.guion.value) {
      markInvalid(fields.guion);
      isValid = false;
    } else {
      markValid(fields.guion);
    }

    if (!fields.produccion.value) {
      markInvalid(fields.produccion);
      isValid = false;
    } else {
      markValid(fields.produccion);
    }

    const anioNum = parseInt(fields.anio.value, 10);
    if (!fields.anio.value || !/^\d{4}$/.test(fields.anio.value) || anioNum < 1900 || anioNum > currentYear) {
      markInvalid(fields.anio);
      isValid = false;
    } else {
      markValid(fields.anio);
    }

    const duracionNum = parseInt(fields.duracion.value, 10);
    if (!fields.duracion.value || !/^\d{1,3}$/.test(fields.duracion.value) || duracionNum < 30 || duracionNum > 500) {
      markInvalid(fields.duracion);
      isValid = false;
    } else {
      markValid(fields.duracion);
    }

    if (!fields.nacionalidad.value) {
      markInvalid(fields.nacionalidad);
      isValid = false;
    } else {
      markValid(fields.nacionalidad);
    }

    if (!fields.genero.value) {
      markInvalid(fields.genero);
      isValid = false;
    } else {
      markValid(fields.genero);
    }

    if (!fields.sinopsis.value || fields.sinopsis.value.trim().length < 10) {
      markInvalid(fields.sinopsis);
      isValid = false;
    } else {
      markValid(fields.sinopsis);
    }

    if (!restriccionRadios.some((r) => r.checked)) {
      restriccionRadios[0].classList.add("is-invalid");
      isValid = false;
    } else {
      restriccionRadios.forEach((r) => {
        r.classList.remove("is-invalid");
        markValid(r);
      });
    }

    form.classList.add("was-validated");

    if (!isValid) {
      event.preventDefault();
      event.stopPropagation();
    }
  });
});
