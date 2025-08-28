//Ejercio 3 TP 2
$(document).ready(function() {
    $('#loginForm').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'bi bi-check-circle',
            invalid: 'bi bi-x-circle',
            validating: 'bi bi-arrow-repeat'
        },
        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de usuario es obligatorio'
                    },
                    stringLength: {
                        min: 4,
                        message: 'El nombre de usuario debe tener al menos 4 caracteres'
                    }
                }
            },
            clave: {
                validators: {
                    notEmpty: {
                        message: 'La contraseña es obligatoria'
                    },
                    stringLength: {
                        min: 8,
                        message: 'La contraseña debe tener al menos 8 caracteres'
                    },
                    regexp: {
                        regexp: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/,
                        message: 'La contraseña debe contener letras y números'
                    },
                    different: {
                        field: 'usuario',
                        message: 'La contraseña no puede ser igual al nombre de usuario'
                    }
                }
            }
        }
    });
});


//Ejercio 4 TP 2
$(document).ready(function() {
    $('#peliculaForm').bootstrapValidator({
        message: 'Este valor no es válido',
        feedbackIcons: {
            valid: 'bi bi-check-circle',
            invalid: 'bi bi-x-circle',
            validating: 'bi bi-arrow-repeat'
        },
        fields: {
            titulo: {
                validators: {
                    notEmpty: { message: 'El título es obligatorio' }
                }
            },
            actores: {
                validators: {
                    notEmpty: { message: 'Los actores son obligatorios' }
                }
            },
            director: {
                validators: {
                    notEmpty: { message: 'El director es obligatorio' }
                }
            },
            guion: {
                validators: {
                    notEmpty: { message: 'El guion es obligatorio' }
                }
            },
            produccion: {
                validators: {
                    notEmpty: { message: 'La producción es obligatoria' }
                }
            },
            anio: {
                validators: {
                    notEmpty: { message: 'El año es obligatorio' },
                    regexp: {
                        regexp: /^\d{4}$/,
                        message: 'Ingrese un año válido de 4 dígitos'
                    }
                }
            },
            duracion: {
                validators: {
                    notEmpty: { message: 'La duración es obligatoria' },
                    regexp: {
                        regexp: /^\d{1,3}$/,
                        message: 'Ingrese una duración válida (1-3 dígitos)'
                    }
                }
            },
            nacionalidad: {
                validators: {
                    notEmpty: { message: 'La nacionalidad es obligatoria' }
                }
            },
            sinopsis: {
                validators: {
                    notEmpty: { message: 'La sinopsis es obligatoria' }
                }
            },
            restriccion: {
                validators: {
                    notEmpty: { message: 'Seleccione una restricción de edad' }
                }
            }
        }
    });
});
