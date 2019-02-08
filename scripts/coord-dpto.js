'use strict'

document.addEventListener("DOMContentLoaded",ini);

function ini(){

    var btnTutores = document.getElementById("btnTutores");
    var btnGrupos = document.getElementById("btnGrupos");
    var listadoTutorados = document.getElementById("listado-tutorados");
    var btnTutorados = document.getElementById("btnTutorados");
    var notificaciones = document.getElementById("notificaciones");
    var tutores = document.getElementById("tutoress");
    var grupos = document.getElementById("grupos");

    tutores.hidden = true;
    grupos.hidden = true;
    listadoTutorados.hidden=true;
    notificaciones.hidden=false;

    btnTutores.addEventListener("click", ()=> {
        notificaciones.hidden = true;
        grupos.hidden = true;
        tutores.hidden = false;
        listadoTutorados.hidden=true;
    });

    btnGrupos.addEventListener("click", ()=> {
        notificaciones.hidden = true;
        tutores.hidden = true;
        grupos.hidden = false;
        listadoTutorados.hidden=true;
    });
    btnTutorados.addEventListener("click", ()=> {
        notificaciones.hidden = true;
        tutores.hidden = true;
        grupos.hidden = true;
        listadoTutorados.hidden = false;
    });
}