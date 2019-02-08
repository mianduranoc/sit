'use strict'

document.addEventListener("DOMContentLoaded",ini);
function ini(){
	var btnProgramar = document.getElementById("btnProgramar");
	var actividades = document.getElementById("actividades");
	var notificaciones = document.getElementById("notificaciones");
	var btnIndividual = document.getElementById("btnindividual");
	var btnGrupal = document.getElementById("btngrupal");
	var reporteIn = document.getElementById("rindividual");
	var reporteGp = document.getElementById("rgrupal");
	actividades.hidden = !actividades.hidden;
	reporteGp.hidden = !reporteGp.hidden;
	reporteIn.hidden = !reporteIn.hidden;
	btnProgramar.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = false;
		reporteGp.hidden = true;
		reporteIn.hidden =true;
	});
	btnIndividual.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = true;
		reporteGp.hidden = true;
		reporteIn.hidden =false;
	});
	btnGrupal.addEventListener("click", ()=> {
		notificaciones.hidden = true;
		actividades.hidden = true;
		reporteGp.hidden = false;
		reporteIn.hidden =true;
	});
}