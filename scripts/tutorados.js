'use strict'

document.addEventListener("DOMContentLoaded",iniciar);
	function iniciar(){
        var btnConferencia = document.getElementById("btnConf");
        var inicio = document.getElementById("inicio1");
        var conferencias = document.getElementById("conferencias1");
        var asistencias=document.getElementById("tabla_asistencias");
        var btnAsistencias=document.getElementById("asistencias");
        var btnTutor = document.getElementById("btnTutor");
        var fichaTutor = document.getElementById("fichaTutor");
        var imagen = document.getElementById("imagen");
        console.log(inicio+"\n"+conferencias);
        conferencias.hidden = true;
        inicio.hidden=false;
        asistencias.hidden=true;
        fichaTutor.hidden = !fichaTutor.hidden;

        btnConferencia.addEventListener("click", ()=> {
            inicio.hidden = true;
            conferencias.hidden = false;
            asistencias.hidden=true;
            fichaTutor.hidden = true;
        });
        btnAsistencias.addEventListener("click",()=>{
            inicio.hidden = true;
            conferencias.hidden = true;
            asistencias.hidden=false;
            fichaTutor.hidden = true;
        });
        btnTutor.addEventListener("click", ()=> {
            inicio.hidden = true;
            conferencias.hidden=true;
            fichaTutor.hidden = false;
            asistencias.hidden=true;
        });
	}