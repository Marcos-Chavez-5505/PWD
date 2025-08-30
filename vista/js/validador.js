document.addEventListener("DOMContentLoaded", () => {
    const formulario = document.getElementById("form1");
    const numeroInput = document.getElementById("numero");
    const mensajeError = document.getElementById("mensaje-error");

    formulario.addEventListener("submit", function(event) {
        let numero = numeroInput.value.trim();
        let mensaje = "";

        if(numero === ""){
            mensaje = "Debes de ingresar un numero: ";
        }else if(isNaN(numero)){
            mensaje = "Solo puedes ingresar valores numericos"; 
        }

        if(mensaje !== ""){
            mensajeError.textContent = mensaje;
            event.preventDefault();
        } else {
            mensajeError.textContent = "";
        }
    }) 
})