let visor = document.getElementById("noticias");
let form = document.createElement("form");
let antena3 = document.createElement("div");

class Noticia {
    constructor(title, link, guid, pubDate, category) {
        this.title = title,
        this.link = link,
        this.guid = guid,
        this.pubDate = pubDate,
        this.category = category
    }
}

let noticias = [];
let categorias = [];


// OBTENER DATOS DE LOS ARCHIVOS XML --------------------------------------------------------------------------
let europa = new XMLHttpRequest();
europa.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // ENVIAR LOS DATOS DEL ARCHIVO A LA FUNCION "crearNoticias" --------------
        crearNoticias(this);
        guardarCategorias(this);
    }
};
europa.open("GET", "agenciaefe.xml", true);
europa.send();

let agencia = new XMLHttpRequest();
agencia.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // ENVIAR LOS DATOS DEL ARCHIVO A LA FUNCION "crearNoticias" --------------
        crearNoticias(this);
        guardarCategorias(this);
    }
};
agencia.open("GET", "europapress.xml", true);
agencia.send();

function guardarCategorias(xml) {
    let docXML = xml.responseXML;
    let nots = docXML.getElementsByTagName("item");
    
    let incluidas = [];
    for (let index = 0; index < nots.length; index++) {
        let cat = nots[index].querySelector("category").textContent;
        if (!incluidas.includes(cat)) {
            incluidas.push(cat);
        }
    }

    incluidas.forEach(incl => {
        console.log(incl);
        let radio = document.createElement("input");
        radio.setAttribute("type", "radio");
        radio.setAttribute("name", "cat");
        radio.setAttribute("id", incl),
        radio.setAttribute("value", incl);

        let label = document.createElement("label");
        label.setAttribute("for", incl);
        label.style.border = "solid 2px black";
        label.innerText = incl;

        let div = document.createElement("div");
        div.style.display = "inline-block";
        div.append(radio, label);
        form.append(div);
    });
    visor.appendChild(form);
}

// CREAR LAS NOTICIAS UNA VEZ SE HAN OBTENIDO LOS DATOS DE LOS ARCHIVOS XML  -----------------------------------
function crearNoticias(xml) {
    let docXML = xml.responseXML;
    let nots = docXML.getElementsByTagName("item");
    
    for (let index = 0; index < nots.length; index++) {
        let title = nots[index].querySelector("title").textContent;
        let link = nots[index].querySelector("link").textContent;
        let guid = nots[index].querySelector("guid").textContent;
        let pubDate = nots[index].querySelector("pubDate").textContent;
        let category = nots[index].querySelector("category").textContent;

        let noticia = new Noticia(title, link, guid, pubDate, category);
        noticias.push(noticia);
    }
}