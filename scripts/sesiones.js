'use strict'

document.addEventListener("DOMContentLoaded", () => {
	var fecha = document.getElementById("fechases");
	fecha.value = obtenerFecha();             
	var hora = document.getElementById("horases");
	hora.value = "07:00";
});

function validar(formulario) {
	if (formulario.fechases.value < obtenerFecha()){
		alert("La fecha no puede ser anterior a hoy");
		return false;
	}
	if (formulario.horases.value < "07:00" || formulario.horases.value > "20:00"){
		alert("La hora no puede ser fuera de horario de clases");
		return false;
	}
	if (formulario.duracion.value<1 || formulario.duracion.value>480){
		alert("La duración debe ser un número entero positivo");
		return false;
	}
	return true;
}

function obtenerFecha(){
	var f = new Date();
	if (f.getDate() < 10) {
		return f.getFullYear() + "-" + (f.getMonth() +1) + "-0" + f.getDate();
	} else {
		return f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
	}
}