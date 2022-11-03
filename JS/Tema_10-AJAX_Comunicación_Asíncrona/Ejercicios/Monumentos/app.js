let input = document.getElementById("provincia");
let boton = document.getElementById("pedir");
let visor = document.getElementById("visor");

boton.addEventListener("click", function() {
    let httReq = new XMLHttpRequest();
    let titulo = document.createElement("h1");

    titulo.innerText = `Monumentos de la provincia de ${input.value}`;
    visor.append(titulo);
    
    httReq.addEventListener("readystatechange", function() {
        if (httReq.readyState == 4 && httReq.status == 200) {
            let datos = JSON.parse(httReq.responseText);

            visualizarMonumentos(datos);
            console.log(datos);
        }
    });

    httReq.open("GET", `app.php?provincia=${input.value}`);
    httReq.send();
});

function visualizarMonumentos(monumentos) {
    monumentos.forEach(monumento => {
        let localidad = monumento.poblacion.provincia;
        let nombre = monumento.nombre;
        let parrafo = document.createElement("p");

        parrafo.innerText = `${localidad} > ${nombre}`;
        visor.append(parrafo);
    });
}