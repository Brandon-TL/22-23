/* Añadir Opciones al campo select */
// Obtenemos el campo 
let select = document.getElementById('losTemas');
// Añadimos la opción para ver todos los libros
let  option = document.createElement("option");
let text = document.createTextNode("Todos los libros");
option.setAttribute("value", "todos");
option.appendChild(text);
select.appendChild(option);

// Array para guardar temas ya incluidos en el select
let temasGuardados = [];

// Añadir todos los temas de los libros sin incluir repetidos
libros.forEach(libro => {
    let tema = libro.tema;

    // Si el tema aún no ha sido guardado en temasGuardados[], guardar el tema y añadirlo al select
    if (!temasGuardados.includes(tema)) {
        temasGuardados.push(tema);
        let option = document.createElement("option");
        let text = document.createTextNode(tema);
        option.setAttribute("value", text.nodeValue);
        option.appendChild(text);
        select.appendChild(option);
    }
});

let caja  = document.getElementById('caja');
let table = document.createElement("table");

function limpiar(e) {
    while (e.firstChild) {
        e.firstChild.remove()
    }
}

// Añadir libros a la caja con el tema seleccionado
select.addEventListener("change", function(e) {
    limpiar(table);
    // Obtener el tema seleccionado
    let option = e.target.value;

    libros.forEach(libro => {
        let tr = document.createElement("tr");

        let tdTitulo = document.createElement("td");
        let tdTema = document.createElement("td");
        let tdAutor = document.createElement("td");
        let tdEditorial = document.createElement("td");
        let tdPrecio = document.createElement("td");

        let titulo = document.createTextNode(libro.titulo);
        let tema = document.createTextNode(libro.tema);
        let autor = document.createTextNode(libro.autor);
        let editorial = document.createTextNode(libro.editorial);
        let precio = document.createTextNode(libro.precio);

        tdTitulo.appendChild(titulo);
        tdTema.appendChild(tema);
        tdAutor.appendChild(autor);
        tdEditorial.appendChild(editorial);
        tdPrecio.appendChild(precio);

        tr.append(tdTitulo, tdTema, tdAutor, tdEditorial, tdPrecio);

        if (option === 'todos') {
            table.appendChild(tr);
        } else {
            if (libro.tema === option) {
                table.appendChild(tr);
            }
        }

        caja.appendChild(table);

        // Dar estilo a la table dentro de la caja ¡TOTALMENTE OPCIONAL!
        table.style.width = "100%";
        table.style.borderCollapse = "collapse";
        tr.style.border = "1px solid black";
    });
});


/* Busqueda por titulo de libro */
let btn = document.getElementById("buscatitulo");
btn.addEventListener("click", () => {
    limpiar(table);
    let campoBuscar = document.getElementById("titulo");
    let textoBuscar = campoBuscar.value.trim();
    // console.log(textoBuscar + ' ' + campoBuscar + ' ' + campoBuscar.checkValidity());

    let err = document.createElement("h4");
    if (textoBuscar ==='' || campoBuscar.checkValidity() == false) {
        let text = document.createTextNode("No se ha buscado ningun titulo.");
        err.appendChild(text);
        caja.appendChild(err);
    } else {
        // console.log(libros.find(libro => libro.titulo === textoBuscar));
        if (libros.find(libro => libro.titulo === textoBuscar)) {
            let encontrado = libros.find(libro => libro.titulo === textoBuscar);
            
            let tr = document.createElement("tr");

            let tdTitulo = document.createElement("td");
            let tdTema = document.createElement("td");
            let tdAutor = document.createElement("td");
            let tdEditorial = document.createElement("td");
            let tdPrecio = document.createElement("td");

            let titulo = document.createTextNode(encontrado.titulo);
            let tema = document.createTextNode(encontrado.tema);
            let autor = document.createTextNode(encontrado.autor);
            let editorial = document.createTextNode(encontrado.editorial);
            let precio = document.createTextNode(encontrado.precio);

            tdTitulo.appendChild(titulo);
            tdTema.appendChild(tema);
            tdAutor.appendChild(autor);
            tdEditorial.appendChild(editorial);
            tdPrecio.appendChild(precio);

            tr.append(tdTitulo, tdTema, tdAutor, tdEditorial, tdPrecio);

            table.appendChild(tr);
            caja.appendChild(table);

            // Dar estilo a la table dentro de la caja ¡TOTALMENTE OPCIONAL!
            table.style.width = "100%";
            table.style.borderCollapse = "collapse";
            tr.style.border = "1px solid black";
        } else {
            let text = document.createTextNode("No se ha encontrado ningun libro con el titulo buscado.");
            err.appendChild(text);
            caja.appendChild(err);
        }
    }
    campoBuscar.value = '';
});

/*
libros.forEach(libro => {
    if (option === 'todos') {
        let tr = document.createElement("tr");

        let tdTitulo = document.createElement("td");
        let tdTema = document.createElement("td");
        let tdAutor = document.createElement("td");
        let tdEditorial = document.createElement("td");
        let tdPrecio = document.createElement("td");

        let titulo = document.createTextNode(libro.titulo);
        let tema = document.createTextNode(libro.tema);
        let autor = document.createTextNode(libro.autor);
        let editorial = document.createTextNode(libro.editorial);
        let precio = document.createTextNode(libro.precio);

        tdTitulo.appendChild(titulo);
        tdTema.appendChild(tema);
        tdAutor.appendChild(autor);
        tdEditorial.appendChild(editorial);
        tdPrecio.appendChild(precio);

        tr.append(tdTitulo, tdTema, tdAutor, tdEditorial, tdPrecio);

        table.appendChild(tr);
    } else {
        if (libro.tema === option) {
            let tr = document.createElement("tr");

            let tdTitulo = document.createElement("td");
            let tdTema = document.createElement("td");
            let tdAutor = document.createElement("td");
            let tdEditorial = document.createElement("td");
            let tdPrecio = document.createElement("td");

            let titulo = document.createTextNode(libro.titulo);
            let tema = document.createTextNode(libro.tema);
            let autor = document.createTextNode(libro.autor);
            let editorial = document.createTextNode(libro.editorial);
            let precio = document.createTextNode(libro.precio);

            tdTitulo.appendChild(titulo);
            tdTema.appendChild(tema);
            tdAutor.appendChild(autor);
            tdEditorial.appendChild(editorial);
            tdPrecio.appendChild(precio);

            tr.append(tdTitulo, tdTema, tdAutor, tdEditorial, tdPrecio);
            
            table.appendChild(tr);
        }
    }
});
*/