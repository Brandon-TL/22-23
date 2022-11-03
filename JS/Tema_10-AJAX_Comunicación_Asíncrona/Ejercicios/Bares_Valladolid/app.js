let ajax = new XMLHttpRequest();

ajax.addEventListener("readystatechange", ttoDatos);

ajax.open("GET","https://analisis.datosabiertos.jcyl.es/api/records/1.0/search/?dataset=registro-de-turismo-de-castilla-y-leon&q=&rows=209&facet=establecimiento&facet=provincia&facet=municipio&refine.establecimiento=Bares&refine.provincia=Valladolid&refine.municipio=Valladolid");
ajax.send();

function ttoDatos() {
    if (ajax.status === 200 && ajax.readyState === 4) {
        let datos = ajax.responseText;
        obtenerBares(datos);
    }
}

function obtenerBares(datos) {
    let baresJSON = JSON.parse(datos);
    let bares = baresJSON.records;
    let baresFragment = document.createDocumentFragment();

    bares.forEach(bar => {
        let nombre = bar.fields.nombre;
        let direccion = bar.fields.direccion;
        let parrafo = document.createElement("p");
        let spanNom = document.createElement("span");
        let spanDir = document.createElement("span");
    
        spanNom.innerText = nombre;
        spanDir.innerText = direccion;
        parrafo.append(spanNom, spanDir);
        baresFragment.append(parrafo);
    });
    document.getElementById("visor").append(baresFragment);
}