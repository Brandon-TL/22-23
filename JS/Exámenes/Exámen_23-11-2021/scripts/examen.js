let figuras = [{id: "futbol", ruta: "imagenes/futbol.png", puntos: 20},
                {id: "basket", ruta: "imagenes/basket.png", puntos: 10},
                {id: "tenis", ruta: "imagenes/tenis.jpg", puntos: 5},
                {id: "rugby", ruta: "imagenes/rugby.png", puntos: 2}];

let btn = document.getElementById("btn").onclick = function (event) {
    let nombre = document.getElementById("jugador").value;
    if (nombre != "") {
        jugar();
    } else {
        alert("Debes de introducir un nombre para jugar");
    }
};

function jugar(event) {
    let imagenes = document.querySelectorAll("img");

    intervalo = setInterval(function() {
        imagenes.forEach(imagen => {
            let random = Math.floor(Math.random() * figuras.length);
            imagen.src = figuras[random].ruta;
        });
    }, 200);

    this.addEventListener("keydown", function() {
        if (this.KeyCode === 32) {
            clearInterval(intervalo);
        }
    });
}