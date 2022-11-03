let select = document.getElementById('anio');
let artista = document.getElementById('artista');
let titulo = document.getElementById('titulo');
let visor = document.getElementById('visor');

let archivo = new XMLHttpRequest();
archivo.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        cargarYears(this);
    }
};
archivo.open("GET", "catalogo.xml", true);
archivo.send();

function cargarYears(xml) {
    let docXML = xml.responseXML;
    let discos = docXML.getElementsByTagName("CD");
    
    let incluidos = [];
    for (let index = 0; index < discos.length; index++) {
        let year = discos[index].querySelector("YEAR").textContent;
        if (!incluidos.includes(year)) {
            incluidos.push(year);
        }
    }
    incluidos.sort();
    incluidos.forEach(incl => {
        let option = document.createElement("option");
        option.append(incl);
        select.append(option);
    });
}

document.addEventListener("keyup", function(event) {
    let artistaBuscado = artista.value.trim();
    let tituloBuscado = titulo.value.trim();
    
    if (event.key === 'Enter' && select.value!=0 &&
    artistaBuscado ==='' || artista.checkValidity() == false) {
        console.log(select.value, artistaBuscado, tituloBuscado);
    }
});