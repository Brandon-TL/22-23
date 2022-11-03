let datos = {
    /* Informacion Personal */
    nombre:document.getElementById("nombre"),
    /* Direccion */
    calle:document.getElementById("calle"),
    poblacion:document.getElementById("poblacion"),
    provincia:document.getElementById("provincia"),
    /* Telefonos */
    movil:document.getElementById("movil"),
    casa:document.getElementById("casa"),
    trabajo:document.getElementById("trabajo")
}

document.getElementById("agregarDatos").onclick = function() {
    let persona = {
        direccion:{calle:datos.calle.value,
                    poblacion:datos.poblacion.value,
                    provincia:datos.provincia.value},
        telefonos:[datos.movil.value,
                    datos.casa.value,
                    datos.trabajo.value]
    }
    localStorage.setItem(datos.nombre.value, JSON.stringify(persona));
    for (let i = 0; i < document.getElementsByTagName("input").length; i++) {
        document.getElementsByTagName("input")[i].value = "";
    }
}

document.getElementById("buscarDatos").onclick = function() {
    let info = localStorage.getItem(datos.nombre.value);
    switch (info) {
        case "":
            let cadena = "No se ha introducido ningun nombre para la búsqueda";
            document.getElementById("info").innerHTML = cadena;
            break;
        case null:
            let cadena = "No se han encontrado datos sobre la persona buscada \""+datos.nombre.value+"\"";
            document.getElementById("info").innerHTML = cadena;
            break;
        default:
            let direccion = JSON.parse(info).direccion; 
            let telefonos = JSON.parse(info).telefonos;
            let i = 1;
            let cadena = "Se ha buscado informacion sobre "+datos.nombre.value+":<br>";
            cadena += `<p>Domicilio: ${direccion.calle}<br>`;        
            cadena += `Población: ${direccion.poblacion}<br>`;        
            cadena += `Provincia: ${direccion.provincia}<br>`;
            cadena += `Telefonos: `;      
            telefonos.forEach(numero => {
                cadena += `${numero}`;
                if (i == telefonos.length) {
                    cadena += ".";
                } else {
                    cadena += ", ";
                    i++;
                }
            });
            cadena += `</p>`;
            document.getElementById("info").innerHTML = cadena;
            break;
    }
}