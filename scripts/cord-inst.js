'use strict'
document.addEventListener("DOMContentLoaded",ini);

function ini(){
    var btnConferencia = document.getElementById("btnConferencia");
    var inicio = document.getElementById("inicio");
    var conferencias = document.getElementById("conferencias");
    console.log(inicio+"\n"+conferencias);
    conferencias.hidden = true;
    inicio.hidden=false;

    btnConferencia.addEventListener("click", ()=> {
        inicio.hidden = true;
        conferencias.hidden = false;
    });

}