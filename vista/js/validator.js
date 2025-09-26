//TP1 EJERCICIO 2
$(document).ready(function () {
    const $formulario = $("#formulario2");
    const dias = ["lunes", "martes", "miercoles", "jueves", "viernes"];

    function validarCampo($input, $error) {
        const valor = $input.val().trim();

        if (valor === "") {
            $error.text(" Debes ingresar un número (usa 0 si no cursas)");
            return false;
        } else if (isNaN(valor)) {
            $error.text(" Solo se permiten valores numéricos");
            return false;
        } else {
            $error.text("");
            return true;
        }
    }

    $formulario.on("submit", function (event) {
        let valido = true;

        dias.forEach(dia => {
            const $input = $("#" + dia);
            const $error = $("#error-" + dia);

            if (!validarCampo($input, $error)) {
                valido = false;
            }
        });

        if (!valido) {
            event.preventDefault();
        }
    });

    dias.forEach(dia => {
        const $input = $("#" + dia);
        const $error = $("#error-" + dia);

        $input.on("input", function () {
            validarCampo($input, $error);
        });
    });
});


//TP1 EJERCICIO 3, 5 y 6
$(document).ready(function () {
    const soloLetras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    $("#nombre, #apellido").on("input", function () {
        if (!soloLetras.test($(this).val())) {
            $(this).val($(this).val().replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, ""));
        }
    });
});


// Ejercio 3 TP 2 - Login
$(document).ready(function () {
    const $form = $("#loginForm");
    const $username = $("#username");
    const $password = $("#password");

    $form.on("submit", function (event) {
        let isValid = true;

        $username.removeClass("is-invalid");
        $password.removeClass("is-invalid");

        if (!$username.val() || $username.val().length < 4) {
            $username.addClass("is-invalid");
            isValid = false;
        }

        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/;
        if (!$password.val() || $password.val().length < 8 || !passwordRegex.test($password.val())) {
            $password.addClass("is-invalid");
            isValid = false;
        }

        if ($password.val() === $username.val()) {
            $password.addClass("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    $form.find("input").on("input", function () {
        $(this).removeClass("is-invalid");
    });
});


// Ejercio 4 TP 2 - Película
// Ejercicio 3 TP 3 - Película
$(document).ready(function () {
    const $form = $("#peliculaForm");
    if (!$form.length) return;

    const fields = {
        titulo: $("#titulo"),
        actores: $("#actores"),
        director: $("#director"),
        guion: $("#guion"),
        produccion: $("#produccion"),
        anio: $("#anio"),
        duracion: $("#duracion"),
        nacionalidad: $("#nacionalidad"),
        genero: $("#genero"),
        sinopsis: $("#sinopsis")
    };

    const $restriccionRadios = $('input[name="restriccion"]');

    const markInvalid = (el) => el.addClass("is-invalid");
    const markValid = (el) => el.addClass("is-valid");
    const unmarkInvalid = (el) => el.removeClass("is-invalid");
    const unmarkValid = (el) => el.removeClass("is-valid");

    $.each(fields, function (_, $el) {
        $el.on("input", function () {
            unmarkInvalid($el);
            unmarkValid($el);
        });
    });

    $restriccionRadios.on("change", function () {
        $restriccionRadios.each(function () {
            unmarkInvalid($(this));
            markValid($(this));
        });
    });

    $form.on("submit", function (event) {
        let isValid = true;
        const currentYear = new Date().getFullYear();

        $.each(fields, function (_, $el) {
            unmarkInvalid($el);
            unmarkValid($el);
        });
        $restriccionRadios.each(function () {
            unmarkInvalid($(this));
            unmarkValid($(this));
        });

        if (!fields.titulo.val() || fields.titulo.val().trim().length < 2) {
            markInvalid(fields.titulo);
            isValid = false;
        } else { markValid(fields.titulo); }

        if (!fields.actores.val()) { markInvalid(fields.actores); isValid = false; } else { markValid(fields.actores); }
        if (!fields.director.val()) { markInvalid(fields.director); isValid = false; } else { markValid(fields.director); }
        if (!fields.guion.val()) { markInvalid(fields.guion); isValid = false; } else { markValid(fields.guion); }
        if (!fields.produccion.val()) { markInvalid(fields.produccion); isValid = false; } else { markValid(fields.produccion); }

        const anioNum = parseInt(fields.anio.val(), 10);
        if (!fields.anio.val() || !/^\d{4}$/.test(fields.anio.val()) || anioNum < 1900 || anioNum > currentYear) {
            markInvalid(fields.anio); isValid = false;
        } else { markValid(fields.anio); }

        const duracionNum = parseInt(fields.duracion.val(), 10);
        if (!fields.duracion.val() || !/^\d{1,3}$/.test(fields.duracion.val()) || duracionNum < 30 || duracionNum > 500) {
            markInvalid(fields.duracion); isValid = false;
        } else { markValid(fields.duracion); }

        if (!fields.nacionalidad.val()) { markInvalid(fields.nacionalidad); isValid = false; } else { markValid(fields.nacionalidad); }
        if (!fields.genero.val()) { markInvalid(fields.genero); isValid = false; } else { markValid(fields.genero); }
        if (!fields.sinopsis.val() || fields.sinopsis.val().trim().length < 10) { markInvalid(fields.sinopsis); isValid = false; } else { markValid(fields.sinopsis); }

        if (!$restriccionRadios.is(":checked")) {
            markInvalid($restriccionRadios.first());
            isValid = false;
        } else {
            $restriccionRadios.each(function () {
                unmarkInvalid($(this));
                markValid($(this));
            });
        }

        $form.addClass("was-validated");

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
});


// Ejercicio 4 validarPersona.js (versión jQuery)
$(document).ready(function () {
    const $form = $("#personaForm");
    const $dni = $("#nroDni");
    const $nombre = $("#nombre");
    const $apellido = $("#apellido");

    $form.on("submit", function (event) {
        let isValid = true;

        // Resetear errores previos
        $dni.removeClass("is-invalid");
        $nombre.removeClass("is-invalid");
        $apellido.removeClass("is-invalid");

        // Validar DNI (solo números, de 1 o más dígitos)
        if (!$dni.val() || !/^[0-9]+$/.test($dni.val())) {
            $dni.addClass("is-invalid");
            isValid = false;
        }

        // Validar Nombre
        if (!$nombre.val().trim()) {
            $nombre.addClass("is-invalid");
            isValid = false;
        }

        // Validar Apellido
        if (!$apellido.val().trim()) {
            $apellido.addClass("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Quitar error en tiempo real
    $("#nroDni, #nombre, #apellido").on("input", function () {
        $(this).removeClass("is-invalid");
    });
});


// Ejercicio 4-8 TP4 (DNI, Patente) con jQuery
$(document).ready(function () {
    const $form = $("#patenteForm");
    if ($form.length === 0) return; // si no existe el form, salimos

    const $dni = $("#nroDni");     // puede existir o no
    const $patente = $("#patente");

    $form.on("submit", function (event) {
        let isValid = true;

        // Resetear errores previos
        $dni.removeClass("is-invalid");
        $patente.removeClass("is-invalid");

        // Validar DNI (si existe el campo)
        if ($dni.length && (!$dni.val() || !/^[0-9]+$/.test($dni.val()))) {
            $dni.addClass("is-invalid");
            isValid = false;
        }

        // Validar Patente (formato ABC123)
        if (!$patente.val() || !/^[A-Z]{3}[0-9]{3}$/.test($.trim($patente.val()).toUpperCase())) {
            $patente.addClass("is-invalid");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    // Quitar error en tiempo real
    $dni.on("input", function () {
        $(this).removeClass("is-invalid");
    });

    $patente.on("input", function () {
        $(this).removeClass("is-invalid");
    });
});


// validator.js - Validación NuevoAuto
$(document).ready(function () {
    const $form = $("#autoForm");
    if ($form.length === 0) return; // si no existe el form, salimos

    const $patente = $("#patente");
    const $marca = $("#marca");
    const $modelo = $("#modelo");
    const $dniDuenio = $("#dniDuenio");

    // Funciones auxiliares
    function markInvalid($el) { $el.addClass("is-invalid").removeClass("is-valid"); }
    function markValid($el) { $el.addClass("is-valid").removeClass("is-invalid"); }
    function unmark($el) { $el.removeClass("is-invalid is-valid"); }

    // Limpiar errores en tiempo real
    $patente.add($marca).add($modelo).add($dniDuenio).on("input change", function () {
        unmark($(this));
    });

    $form.on("submit", function (event) {
        let isValid = true;

        // Validar Patente (formato ABC123)
        const patenteRegex = /^[A-Z]{3}[0-9]{3}$/;
        if (!$patente.val() || !patenteRegex.test($.trim($patente.val()).toUpperCase())) {
            markInvalid($patente);
            isValid = false;
        } else {
            markValid($patente);
        }

        // Validar Marca
        if (!$marca.val().trim()) {
            markInvalid($marca);
            isValid = false;
        } else {
            markValid($marca);
        }

        // Validar Modelo
        if (!$modelo.val().trim()) {
            markInvalid($modelo);
            isValid = false;
        } else {
            markValid($modelo);
        }

        // Validar Dueño (select obligatorio)
        if (!$dniDuenio.val()) {
            markInvalid($dniDuenio);
            isValid = false;
        } else {
            markValid($dniDuenio);
        }

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
});
