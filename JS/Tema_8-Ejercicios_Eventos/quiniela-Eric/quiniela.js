/* ERIC RENEDO URIARTE */

let equipos = ["España", "Francia", "Inglaterra", "Italia", "Rusia", "Portugal", "Gales", "Alemania"];
let longitud = equipos.length;
let posibles = ["1", "X", "2"];

let shadow = document.getElementById("shadow");
let arbol = shadow.attachShadow({mode: "open"});

let btnCargarQuiniela = document.getElementById("cargarQuiniela");
let btnJugar = document.getElementById("jugar");

terminos.addEventListener("click", aceptar);
btnCargarQuiniela.addEventListener("click", cargar);
btnJugar.addEventListener("click", jugar);

function aceptar() {
    if (terminos.checked === true) {
        btnCargarQuiniela.disabled = false;
    } else {
        btnCargarQuiniela.disabled = true;
    } 
}
function cargar() {
    if (nombre.value.trim() === "") {
        errores.innerText = "El nombre es obligatorio";
    } else {
        errores.innerText = "";

        let tabla = document.createElement("table");
        let style = document.createElement("style");
        style.innerText = ` td {
            border: 1px solid black;
            text-align: center;
            padding: .5rem;
        }`;
        let cabecera = document.createElement("tr");
        let partidos = equipos.length/2;

        btnCargarQuiniela.disabled = true;

        for (let k = 0; k < 5; k++) {
            let columnaCabecera = document.createElement("td");
            switch(k) {
                case 0:
                    columnaCabecera.innerText = "LOCAL";
                    break;
                case 1:
                    columnaCabecera.innerText = "1";
                    break;
                case 2:
                    columnaCabecera.innerText = "X"
                    break;
                case 3:
                    columnaCabecera.innerText = "2";
                    break;
                case 4:
                    columnaCabecera.innerText = "VISITANTE";
                    break;
            }
            cabecera.appendChild(columnaCabecera);
        }
        tabla.appendChild(cabecera);

        for (let i = 0; i < partidos; i++) {
            let fila = document.createElement("tr");
            for (let j = 0; j < 5; j++) {
                let columna = document.createElement("td");
                switch (j) {
                    case 0:
                    case 4:
                        columna.setAttribute("name", "equipo");
                        columna.innerText = sortearEquipo();
                        break;
                    case 1:
                        crearRadio(columna, i, "1");
                        break;
                    case 2:
                        crearRadio(columna, i, "X");
                        break;
                    case 3:
                        crearRadio(columna, i, "2");
                        break;
                }
                fila.appendChild(columna);
            }
            tabla.appendChild(fila);
        }
        arbol.append(tabla, style);    
        btnJugar.disabled = false;
        nombre.disabled = true;
        terminos.disabled = true;
    }
}
function sortearEquipo() {
    let random = Math.floor(Math.random() * equipos.length);
    let equipo = equipos[random];
    equipos.splice(random, 1);
    return equipo;
}
function crearRadio(columna, fila, valor) {
    let radio = document.createElement("input");
    radio.setAttribute("type", "radio");
    radio.setAttribute("name", fila);
    radio.setAttribute("id", fila);
    radio.setAttribute("value", valor);
    radio.innerText = valor;
    columna.appendChild(radio);
}
function jugar() {
    let radios = [...arbol.querySelectorAll('input[type=radio]:checked')];    
    if (radios.length != (longitud/2)) {
        errores.innerText = "¡Faltan partidos para completar la quiniela!"
    } else {
        errores.innerText = "";
        let tablaComparativa = document.createElement("table");
        let cabecera = document.createElement("tr");
        let tuApuesta = [];
        let resultados = [];
    
        for (let j = 0; j < 2; j++) {
            let columna = document.createElement("td");
            if (j === 0) {
                columna.innerText = "TU APUESTA";
            } else {
                columna.innerText = "APUESTA GANADORA";
            }
            cabecera.appendChild(columna);
        }
        tablaComparativa.appendChild(cabecera);
    
        for (let i = 0; i < radios.length; i++) {
            let fila = document.createElement("tr");
            for (let k = 0; k < 2; k++) {
                let columna = document.createElement("td");
                if (k === 0) {
                    columna.innerText = radios[i].value;
                    tuApuesta.push(radios[i].value);
                } else {
                    let resultado = generarResultado();
                    resultados.push(resultado);
                    columna.innerText = resultado;
                }
                fila.appendChild(columna);
            }
            tablaComparativa.appendChild(fila);
        }
        arbol.append(tablaComparativa);
    
        compararResultados(tuApuesta, resultados);
    }
}
function generarResultado() {
    let random = Math.floor(Math.random()*3);
    return posibles[random];
}
function compararResultados(apuesta, resultados) {
    let nAciertos = 0;
    let txt = document.createElement("h2");
    for (let i = 0; i < apuesta.length; i++) {
        if (apuesta[i] === resultados[i]){
            nAciertos++;
        }
    }
    if (nAciertos === 0) {
        txt.innerText = "Lo siento, no has acertado ningún resultado."
    } else {
        txt.innerText = `¡Has acertado ${nAciertos} resultado/s!`;
    }
    arbol.append(txt);
}