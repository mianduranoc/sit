'use strict'

document.addEventListener("DOMContentLoaded",ini);
function ini(){
	var btnProgramar = document.getElementById("btnProgramar");
	var actividades = document.getElementById("actividades");
	var notificaciones = document.getElementById("notificaciones");
	var listadoTutorados = document.getElementById("listado-tutorados");
	var btnListadoTutorados = document.getElementById("btnlistadoTutorados");
	var btnIndividual = document.getElementById("btnindividual");
	var btnGrupal = document.getElementById("btngrupal");
	var reporteIn = document.getElementById("rindividual");
	var reporteGp = document.getElementById("rgrupal");
    var btnSesiones = document.getElementById("btnSesiones");
    var sesiones = document.getElementById("sesiones");


	actividades.hidden = !actividades.hidden;
	listadoTutorados.hidden = true;
	reporteGp.hidden = !reporteGp.hidden;
	reporteIn.hidden = !reporteIn.hidden;
    sesiones.hidden = true;


    //funciones
	btnProgramar.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		listadoTutorados.hidden = true;
        reporteGp.hidden = true;
        reporteIn.hidden= true;
		actividades.hidden = false;
        sesiones.hidden = true;

    });

	btnListadoTutorados.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = true;
		reporteGp.hidden = true;
		reporteIn.hidden= true;
		listadoTutorados.hidden = false;
        sesiones.hidden = true;


    });
	btnIndividual.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = true;
		reporteGp.hidden = true;
		listadoTutorados.hidden =true;
		reporteIn.hidden =false;
        sesiones.hidden = true;

    });
	btnGrupal.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = true;
		listadoTutorados.hidden =true;
		reporteGp.hidden = false;
		reporteIn.hidden =true;
        sesiones.hidden = true;

    });
    btnSesiones.addEventListener("click", ()=> {
        notificaciones.hidden = true;
        sesiones.hidden = false;
        listadoTutorados.hidden =true;
        reporteGp.hidden = true;
        reporteIn.hidden =true;
        actividades.hidden = true;
    });
}