let data = {};
let container = document.getElementById("container");

// Cargar datos de PHP
fetch("../php/getTPs.php")
  .then(res => res.json())
  .then(json => {
    data = json;
    mostrarTPs();
  });

// Mostrar tarjetas de TPs
function mostrarTPs() {
  container.innerHTML = "";
  Object.keys(data).forEach(tp => {
    let card = document.createElement("div");
    card.className = "card";
    card.innerText = "TP " + tp; // ej: "TP1", "TP2"
    card.onclick = () => mostrarEjercicios(tp);
    container.appendChild(card);
  });
}

// Mostrar tarjetas de Ejercicios dentro de un TP
function mostrarEjercicios(tp) {
  container.innerHTML = "";
  Object.keys(data[tp]).forEach((ejercicio, index) => {
    let card = document.createElement("div");
    card.className = "card";
    card.innerText = "Ejercicio " + (index + 1);
    card.onclick = () => mostrarArchivos(tp, ejercicio);
    container.appendChild(card);
  });

  // Botón volver a TPs
  let back = document.createElement("div");
  back.className = "card";
  back.innerText = "↙ Volver";
  back.onclick = mostrarTPs;
  container.appendChild(back);
}

// Mostrar archivos dentro de un ejercicio
function mostrarArchivos(tp, ejercicio) {
  container.innerHTML = "";
  data[tp][ejercicio].forEach(file => {
    let card = document.createElement("div");
    card.className = "card";
    card.innerText = file;
    card.onclick = () => {
      window.location.href = "../../vista/TP/" + tp + "/" + ejercicio + "/" + file;
    };
    container.appendChild(card);
  });

  // Botón volver a ejercicios
  let back = document.createElement("div");
  back.className = "card";
  back.innerText = "↙ Volver";
  back.onclick = () => mostrarEjercicios(tp);
  container.appendChild(back);
}
