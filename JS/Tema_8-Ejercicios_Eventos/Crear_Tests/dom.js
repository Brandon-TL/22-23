class Pregunta {
    constructor(enunciado, enunA, enunB, enunC, enunD, res) {
        this.enunciado = enunciado;
        this.respuestas = {
            1: enunA,
            2: enunB,
            3: enunC,
            4: enunD,
        };
        this.res = res;
    }
    
}

let formulario = {
    preg: {
        control: document.forms[0].preg,
        valido: false,
        vacio: "Es necesario escribir un enunciado",
    },
    enunA: {
        control: document.forms[0].enunA,
        valido: false,
        vacio: "Es necesario escribir una respuesta",
    },
    enunB: {
        control: document.forms[0].enunB,
        valido: false,
        vacio: "Es necesario escribir una respuesta",
    },
    enunC: {
        control: document.forms[0].enunC,
        valido: false,
        vacio: "Es necesario escribir una respuesta",
    },
    enunD: {
        control: document.forms[0].enunD,
        valido: false,
        vacio: "Es necesario escribir una respuesta",
    },
    respuesta: {
        control: document.forms[0].respuesta,
        valido: false,
        vacio: "Porfavor seleccione una respuesta correcta",
    },
};

let arrayPreguntas = [];

function numeroPregunta() {
    let titulo = document.querySelector('#titulo');
    titulo.innerText = `Pregunta número ${arrayPreguntas.length + 1} :`;
}