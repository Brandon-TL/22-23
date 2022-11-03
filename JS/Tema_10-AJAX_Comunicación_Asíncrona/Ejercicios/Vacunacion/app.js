let ajax = new XMLHttpRequest();

ajax.addEventListener("readystatechange", ttoDatos);

ajax.open("GET","app.php");
ajax.send();

function ttoDatos() {
    if (ajax.status === 200 && ajax.readyState === 4) {
        let datos = ajax.responseText;
        obtenerVacunacion(datos);
    }
}