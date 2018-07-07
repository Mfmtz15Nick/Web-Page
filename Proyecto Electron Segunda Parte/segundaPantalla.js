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



var usuariovalida=require('electron').remote.getGlobal('infoUsuarios').usuariovalida;
var periodo=require('electron').remote.getGlobal('infoUsuarios').periodo;
var usuario=require('electron').remote.getGlobal('infoUsuarios').usuario;

var url2 = "http://itculiacan.edu.mx/dadm/apipaselista/data/obtienegrupos2.php?usuario="

var usuarios;
//Funcion para mandar los datos al arreglo
function datos(usu,val,peri,materia,grupo){
    this.usu=usu;
    this.val=val;
    this.peri=peri;
    this.materia=materia;
    this.grupo=grupo;
    
}



var urlasistencia = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadasistenciasgrupo.php?usuario=";
var urlfaltas = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadfaltasgrupo.php?usuario=";

function inicia(){
    //NombreMateria, ClaveMateria, ClaveGrupo
    
    var ClaveMateria = "";
    var ClaveGrupo = "";
    //var resultado = "";
    var NombreMateria = "";
    
    
    //Armar la url con los datos globales
    url2 = url2+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo;
    
    
    
   
    $.ajax({
        url:url2 ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                //Crear variable para saber cuantos grupos tiene
                var grupos = data.grupos[0].cantidad;
                //Crear arreglo para almacenar todos los grupos del maestro.
                usuarios = new Array(grupos);
                var j=1;
                
                for (var i = 0; i < grupos; i++) {
                    ClaveMateria = data.grupos[j].clavemateria;
                    ClaveGrupo = data.grupos[j].grupo;
                    NombreMateria = data.grupos[j].materia;
                    
                    getAsistencia(usuario,usuariovalida,periodo,ClaveMateria,ClaveGrupo,NombreMateria,i);                
                    usuarios[i] = new datos(usuario,usuariovalida,periodo,ClaveMateria,ClaveGrupo);
                    j++;
                }
            }
           
        }
    });

}

function getAsistencia(usuario,usuariovalida,periodo,materia,grupo,nommat,i){
    urlasistencia = urlasistencia+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo;
    urlfaltas = urlfaltas+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo;
    var resultado= "";
    var asistencia="";
    $.ajax({
        url:urlasistencia ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                asistencia = data.cantidad;  
                getfaltas(usuario,usuariovalida,periodo,materia,grupo,nommat,i,asistencia);     
                
            }
            else{
                alert("No fue exitoso");
            }
        }
    });
 urlasistencia = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadasistenciasgrupo.php?usuario=";
 
}
function getfaltas(usuario,usuariovalida,periodo,materia,grupo,nommat,i,asistencia){
    urlfaltas = urlfaltas+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo;
    var resultado= "";
    var faltas="";
    $.ajax({
        url:urlfaltas ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                faltas = data.cantidad;  
                resultado = "<li id="+i+" style='list-style:none;'>"+
                                " <span class='nito'> Clave Materia: </span>"+materia+
                                "<br><span class='nito'> Clave Grupo: </span>"+grupo+
                                "<br><span class='nito'> Nombre Materia: </span>"+nommat+
                                "<br><span class='nito'> Asistencia: </span>"+asistencia+ 
                                "<br><span class='nito'> Faltas: </span>"+faltas+                                                                                               
                                "<hr>"
                                
                    $("#listado").append(resultado);
                             
                
            }
            else{
                alert("No fue exitoso");
            }
        }
    });
 urlasistencia = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadasistenciasgrupo.php?usuario=";
 
}




function abrirTercerPantalla(){
    //alert("Abri segunda pantalla");
    //alert(this.id);
    require('electron').remote.getGlobal('infoUsuarios').usuario=usuarios[this.id].usu;
    require('electron').remote.getGlobal('infoUsuarios').usuariovalida=usuarios[this.id].val;
    require('electron').remote.getGlobal('infoUsuarios').periodo=usuarios[this.id].peri;
    require('electron').remote.getGlobal('infoUsuarios').materia=usuarios[this.id].materia;
    require('electron').remote.getGlobal('infoUsuarios').grupo=usuarios[this.id].grupo;
 
 
 
   let tercerPantalla = new BrowserWindow({width:1000,height:1000});
    tercerPantalla.loadURL(url.format({
        pathname: path.join(__dirname,'terceraPantalla.html'),
        protocol:'file',
        slashes:true
    }));
    //tercerPantalla.webContents.openDevTools();
    tercerPantalla.show();

}
$("body").on("click","li ",abrirTercerPantalla);
inicia();