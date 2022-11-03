let ajax = new XMLHttpRequest();

ajax.addEventListener("readystatechange", ttoDatos);

ajax.open("GET","https://www.boe.es/diario_boe/xml.php?id=BOE-S-20220121");
ajax.send();

function ttoDatos() {
    if (ajax.status === 200 && ajax.readyState === 4) {
        let datos = ajax.responseXML;
        obtenerBoletin(datos);
    }
}

function obtenerBoletin() {

}