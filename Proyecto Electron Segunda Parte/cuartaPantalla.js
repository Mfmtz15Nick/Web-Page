const $ = require('jquery')
const {BrowserWindow}=require('electron').remote
const app= require('electron').app;

//Constantes para el PDF
const ipc = require('electron').ipcRenderer
const botonPDF = document.getElementById('btnPDF')
//Activamos el evento click del boton btnPDF
botonPDF.addEventListener('click',function(event){
//Quito los botones para poder imprimir un pdf sin botones.
    $("#listado>li>button").hide();
    botonPDF.style.display = "none"
    ipc.send('print-to-pdf')
})


//Para tener acceso al main atraves del js
//Para obtener informacion
//const{BrowserWindow}=require('electron').remote
//const app=require('electron').app
const path = require('path')
const url = require('url')




var periodo=require('electron').remote.getGlobal('infoUsuarios').periodo;
var materia=require('electron').remote.getGlobal('infoUsuarios').materia;
var grupo=require('electron').remote.getGlobal('infoUsuarios').grupo;



var urlListadoAsistencia="http://localhost/phpProyectoFinal/listaasistencia.php?periodo=";
function getListado(){

 
    urlListadoAsistencia = urlListadoAsistencia+periodo+"&materia="+materia+"&grupo="+grupo;
    $.ajax({
        url:urlListadoAsistencia ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                $("#tblListado").append(data.tabla);
               
            }else{
                alert("Esta Mal")
            }
        }
    });  
}  
getListado();