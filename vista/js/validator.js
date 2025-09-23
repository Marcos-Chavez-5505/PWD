//TP1 EJERCICIO 2
document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("formulario2");
    //creamos el arreglos con los dias
    const dias = ["lunes", "martes", "miercoles", "jueves", "viernes"];

    // Función para validar un input específico
    function validarCampo(input, error) {
        const valor = input.value.trim();

        if (valor === "") {
            error.textContent = " Debes ingresar un número (usa 0 si no cursas)";
            return false;
        } else if (isNaN(valor)) {
            error.textContent = " Solo se permiten valores numéricos";
            return false;
        } else {
            error.textContent = "";
            return true;
        }
    }
    // Validación al enviar
    formulario.addEventListener("submit", function(event) {
        let valido = true;

        dias.forEach(dia => {
            const input = document.getElementById(dia);
            const error = document.getElementById("error-" + dia);

            if (!validarCampo(input, error)) {
                valido = false;
            }
        });

        if (!valido) {
            event.preventDefault();
        }
    });
    // Validación en tiempo real (cuando el usuario escribe  o cambia)
    dias.forEach(dia => {
        const input = document.getElementById(dia);
        const error = document.getElementById("error-" + dia);

        input.addEventListener("input", () => {
            validarCampo(input, error);
        });
    });
});

//TP1 EJERCICIO 3
document.addEventListener("DOMContentLoaded", function () {
    const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    document.querySelectorAll("#nombre, #apellido").forEach(input => {
        input.addEventListener("input", function () {
            if (!soloLetras.test(this.value)) {
                // Reemplaza todo lo que no sea letra o espacio
                this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, "");
            }
        });
    });
});

//TP1 EJERCICIO 4
document.addEventListener("DOMContentLoaded", function () {
    const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    document.querySelectorAll("#nombre, #apellido").forEach(input => {
        input.addEventListener("input", function () {
            if (!soloLetras.test(this.value)) {
                // Reemplaza todo lo que no sea letra o espacio
                this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, "");
            }
        });
    });
});

//TP1 EJERCICIO 5
document.addEventListener("DOMContentLoaded", function () {
    const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    document.querySelectorAll("#nombre, #apellido").forEach(input => {
        input.addEventListener("input", function () {
            if (!soloLetras.test(this.value)) {
                // Reemplaza todo lo que no sea letra o espacio
                this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, "");
            }
        });
    });
});

//TP1 EJERCICIO 6
document.addEventListener("DOMContentLoaded", function () {
    const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    document.querySelectorAll("#nombre, #apellido").forEach(input => {
        input.addEventListener("input", function () {
            if (!soloLetras.test(this.value)) {
                // Reemplaza todo lo que no sea letra o espacio
                this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, "");
            }
        });
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



// Ejercicio 4 validarPersona.js
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("personaForm");

    form.addEventListener("submit", function (event) {
        let isValid = true;

        const dni = document.getElementById("nroDni");
        const nombre = document.getElementById("nombre");
        const apellido = document.getElementById("apellido");

        // Resetear errores previos
        [dni, nombre, apellido].forEach(input => {
            input.classList.remove("is-invalid");
        });

        // Validar DNI
        if (!dni.value || isNaN(dni.value)) {
            dni.classList.add("is-invalid");
            isValid = false;
        }

        // Validar Nombre
        if (!nombre.value.trim()) {
            nombre.classList.add("is-invalid");
            isValid = false;
        }

        // Validar Apellido
        if (!apellido.value.trim()) {
            apellido.classList.add("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Quitar error en tiempo real
    document.querySelectorAll("#nroDni, #nombre, #apellido").forEach(input => {
        input.addEventListener("input", function () {
            input.classList.remove("is-invalid");
        });
    });
});


// Ejercicio 8 TP4 (DNI, Patente)
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("cambioDuenioForm");

    form.addEventListener("submit", function (event) {
        let isValid = true;

        const dni = document.getElementById("nroDni");
        const patente = document.getElementById("patente");

        // Resetear errores previos
        [dni, patente].forEach(input => {
            input.classList.remove("is-invalid");
        });

        // Validar DNI (solo números, entre 7 y 9 dígitos)
        if (!dni.value || !/^[0-9]{7,9}$/.test(dni.value)) {
            dni.classList.add("is-invalid");
            isValid = false;
        }

        // Validar Patente (formato ABC123 o AB123CD)
        if (!patente.value || !/^[A-Z0-9]{6,7}$/.test(patente.value.toUpperCase())) {
            patente.classList.add("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Quitar error en tiempo real
    document.querySelectorAll("#nroDni, #patente").forEach(input => {
        input.addEventListener("input", function () {
            input.classList.remove("is-invalid");
        });
    });
});



// validator.js - Validación NuevoAuto
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("autoForm");
    if (!form) return; // Salir si no existe el formulario

    const patente = document.getElementById("patente");
    const marca = document.getElementById("marca");
    const modelo = document.getElementById("modelo");
    const dniDuenio = document.getElementById("dniDuenio");

    // Función para marcar inválido/válido
    const markInvalid = (el) => el.classList.add("is-invalid");
    const markValid = (el) => el.classList.add("is-valid");
    const unmarkInvalid = (el) => el.classList.remove("is-invalid");
    const unmarkValid = (el) => el.classList.remove("is-valid");

    // Limpiar errores en tiempo real
    [patente, marca, modelo, dniDuenio].forEach(input => {
        input.addEventListener("input", () => {
            unmarkInvalid(input);
            unmarkValid(input);
        });
    });

    form.addEventListener("submit", function (event) {
        let isValid = true;

        // Validar Patente (ej: ABC123 o AB123CD)
        const patenteRegex = /^[A-Z]{2,3}\d{3,4}[A-Z]{0,2}$/i;
        if (!patente.value || !patenteRegex.test(patente.value.trim())) {
            markInvalid(patente);
            isValid = false;
        } else {
            markValid(patente);
        }

        // Validar Marca
        if (!marca.value.trim()) {
            markInvalid(marca);
            isValid = false;
        } else {
            markValid(marca);
        }

        // Validar Modelo
        if (!modelo.value.trim()) {
            markInvalid(modelo);
            isValid = false;
        } else {
            markValid(modelo);
        }

        // Validar Dueño (debe seleccionar una persona)
        if (!dniDuenio.value) {
            markInvalid(dniDuenio);
            isValid = false;
        } else {
            markValid(dniDuenio);
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
});
