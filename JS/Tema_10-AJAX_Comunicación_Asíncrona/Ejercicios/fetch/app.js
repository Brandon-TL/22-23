let peticion = fetch("https://analisis.datosabiertos.jcyl.es/api/records/1.0/search/?dataset=ofertas-de-empleo&q=&sort=fecha_de_publicacion&facet=provincia&facet=fecha_de_publicacion&facet=fuentecontenido");

peticion.then(correcta).then(datosJSON);
peticion.catch(incorrecta);

function correcta(respuesta) {
    return respuesta.json();
}

function datosJSON(datos) {
    console.log(datos);
}

function incorrecta(error) {
    console.log(error);
}