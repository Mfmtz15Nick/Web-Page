const $ = require('jquery');
const {BrowserWindow} = require('electron').remote
const app = require('electron').app;
//Constantes para el PDF
const ipc = require('electron').ipcRenderer
const botonPDF = document.getElementById('btnPDF')
const path = require('path')
const url = require('url')

var usuario=require('electron').remote.getGlobal('infoUsuarios').usuario;
var usuariovalida=require('electron').remote.getGlobal('infoUsuarios').usuariovalida;
var periodo=require('electron').remote.getGlobal('infoUsuarios').periodo;
var materia=require('electron').remote.getGlobal('infoUsuarios').materia;
var grupo=require('electron').remote.getGlobal('infoUsuarios').grupo;

function datos(nCont,nombre,asistencia){
    this.nCont=nCont;
    this.nombre=nombre;
    this.asistencia=asistencia; 
}
//Url que me sirve para obtener un listado de todos los alumnos
var url2 = "http://itculiacan.edu.mx/dadm/apipaselista/data/obtienealumnos2.php?usuario=";
url2 = url2+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo;
var matriculanombre = new Array();
var alum = new Array(); 
function inicia(){
    var numeroControl = "";
    var apepat = "";
    var apemat = "";
    var nombre = "";
    var resultado = "";
    $.ajax({
        url:url2 ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                //Crear variable para saber cuantos alumnos tiene el grupo
                var alumnos = data.alumnos[0].cantidad;
                var j = 1; 
                var color=0;
                            
                for (var i = 0; i < alumnos; i++) {
                    numeroControl=data.alumnos[j].ncontrol;
                    apepat=data.alumnos[j].apellidopaterno;
                    apemat=data.alumnos[j].apellidomaterno;
                    nombre=data.alumnos[j].nombre;                    
                    getAsistencias(usuario,usuariovalida,periodo,materia,grupo,numeroControl,i,nombre,apepat,apemat);
                    matriculanombre[i]=numeroControl+nombre;
                    
                   j++; 
                }
            }  
        }
    });
}
var color= 0;
var urlasistencia = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadasistenciasalumno.php?usuario=";
var asis = "";
function getAsistencias(usuario,usuariovalida,periodo,materia,grupo,numeroControl,i,nombre,apepat,apemat){
    urlasistencia = urlasistencia+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo+"&ncontrol="+numeroControl;
    var parametros = usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo+"&ncontrol="+numeroControl;
    $.ajax({
        url:urlasistencia ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                asis = data.cantidad;
               // alert(asis);
               alum[i] = new datos(numeroControl,nombre,asis);
                getFaltas(parametros,i,nombre,apepat,apemat,numeroControl,asis);
                
            }  
        }
    });
}

var urlfaltas = "http://itculiacan.edu.mx/dadm/apipaselista/data/cantidadfaltasalumno.php?usuario=";
var color=0;
var fal="";
function getFaltas(parametros,i,nombre,apepat,apemat,numeroControl,asis){
    urlfaltas = urlfaltas+parametros;
    $.ajax({
        url:urlfaltas ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                fal = data.cantidad;
                //alert(fal);
                //En el id del boton concatene un 1 o un 0 segun sea asistencia o falta
                    //0 = asistencia.
                    //1 = falta.
                    if(color==0){
                        color++;                        
                        resultado ="<tr style='background:rgb(220, 223, 223);'><td >"+numeroControl+"</td><td>"+nombre+"</td><td>"+apepat+" "+apemat+"</td><td>"+asis+"</td><td>"+fal+"<td><button class='btn' id=0"+numeroControl+">Asistencia </button>"+"</td><td><button class='btn' id=1"+numeroControl+">Falta </button></td>"
                    }else if(color==1){
                        resultado ="<tr style='background:#c6def7;'><td>"+numeroControl+"</td><td>"+nombre+"</td><td>"+apepat+" "+apemat+"</td><td>"+asis+"</td><td>"+fal+"</td><td><button class='btn' id=0"+numeroControl+">Asistencia </button>"+"</td><td><button class='btn' id=1"+numeroControl+">Falta </button></td>"
                        color--;
                    }                 
                       
                    $("#listado").append(resultado);
            }  
        }
    });
}

var urlAsisLocal="http://localhost/phpProyectoFinal/alumnoasistencias.php?periodo=";
function getAsistenciasLocal(periodo,ncontrol,nombre,materia,grupo){
    urlAsisLocal = urlAsisLocal+periodo+"&ncontrol="+ncontrol+"&nombre="+nombre+"&materia="+materia+"&grupo="+grupo;
    $.ajax({
        url:urlAsisLocal ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
                asis = data.cantidad;
               // alert(asis);
                //getFaltas(parametros,i,nombre,apepat,apemat,numeroControl,asis);
            }  
        }
    });
}

var urlFaltaLocal="http://localhost/phpProyectoFinal/alumnofaltas.php?periodo=";
function getFaltaLocal(periodo,ncontrol,nombre,materia,grupo){
    urlFaltaLocal = urlFaltaLocal+periodo+"&ncontrol="+ncontrol+"&nombre="+nombre+"&materia="+materia+"&grupo="+grupo;
    $.ajax({
        url:urlFaltaLocal ,
        dataType: 'json',
        success: function(data){
            if(data.respuesta){
               // asis = data.cantidad;
               // alert(asis);
                //getFaltas(parametros,i,nombre,apepat,apemat,numeroControl,asis);
            }  
        }
    });
}

//FUNCION DE BOTON PDF
//Activamos el evento click del boton btnPDF
botonPDF.addEventListener('click',function(event){
    //Quito los botones para poder imprimir un pdf sin botones.    
    //$("#listado>li>button").hide();
    $("#asis").hide();
    $("#fal").hide();
    $("#btnListaAsis").hide();
    $("#btnListaFal").hide();
    

    $("tr > td > button").hide();
    botonPDF.style.display = "none"
    ipc.send('print-to-pdf')
});

//Esta funcion me sirve para saber si el boton que se dio click es falta o asistencia.
function asistencia(){
    //Esta variable me sirve para obtener el id del boton
    //014171016Mario
    var aux = this.id;
    //alert("Aux "+aux);
    //Esta varialbe me sirve para obtener el primer caracter del id ya sea 1 o 0
    var aux2 = aux.substring(0,1);
    //alert("Aux2 "+aux2);
    
    //Para obtener el verdadero id que manda el boton 
    var aux3 = aux.substring(1,9);
    //alert("Aux3 "+aux3);
    
    //var auxnombre=aux.substring(9,aux.length);
    //alert("Auxnom "+auxnombre);
    //Ciclo for para recorrer el arreglo y sacar el nombre.
    var auxnombre="";
    var nom="";
    var matri="";
    var nombreEncontrado="";
    for (var index = 0; index < matriculanombre.length; index++) {
        auxnombre=matriculanombre[index];
        matri=auxnombre.substring(0,8);
       // alert("matricula "+matri);
        nom=auxnombre.substring(8,auxnombre.length);
       // alert("nombre"+nom);
        if(matri==aux3){
            nombreEncontrado=nom;
            //alert("Nombre encontrado"+nombreEncontrado);
        }  
    }
    
    //este if es para cuando es falta.
    if(aux2==1){
        var boton = document.getElementById(aux);
        var boton2 = document.getElementById(0+aux3);
        //Desaparecer botones al momento de dar click en uno de los dos
        boton.style.display ="none";
        boton2.style.display ="none"; 
        var numeroControl=aux3;
        //Esta url es para ingresar asistencia
        var url4 = "http://itculiacan.edu.mx/dadm/apipaselista/data/asignaincidencia.php?usuario=";        
        url4 = url4+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo+"&ncontrol="+numeroControl+"&incidencia=2";
        $.ajax({
            url:url4 ,
            dataType: 'json',
            success: function(data){
                if(data.respuesta){
                    //alert("TIENES FALTA :(");
                    getFaltaLocal(periodo,numeroControl,nombreEncontrado,materia,grupo);  
                    
                    
                }
                else{
                    alert("no hubo insercion");
                }  
            }
        });
    }
    //Este if es para cuando es asistencia.
    else if(aux2==0){
        var btn = document.getElementById(aux);
        var btn2 = document.getElementById(1+aux3);
        //Desaparecer botones
        btn.style.display ="none";
        btn2.style.display ="none";
       

        var numeroControl=aux3;
        var url4 = "http://itculiacan.edu.mx/dadm/apipaselista/data/asignaincidencia.php?usuario=";        
        url4 = url4+usuario+"&usuariovalida="+usuariovalida+"&periodoactual="+periodo+"&materia="+materia+"&grupo="+grupo+"&ncontrol="+numeroControl+"&incidencia=1";
        $.ajax({
            url:url4 ,
            dataType: 'json',
            success: function(data){
                if(data.respuesta){
                    //alert("ASISTENCIA");
                    getAsistenciasLocal(periodo,numeroControl,nombreEncontrado,materia,grupo);  
                }
                else{
                    alert("No hubo insercion");
                }
            }
        });
    }
}
function pantalla4(nomeroControl,nombre,cantAsistencias){
    let cuartaPantalla = new BrowserWindow({width:1000,height:1000});
    cuartaPantalla.loadURL(url.format({
        pathname: path.join(__dirname,'cuartaPantalla.html'),
        protocol:'file',
        slashes:true
    })); 
    //cuartaPantalla.webContents.openDevTools();
    cuartaPantalla.show();
}
function pantalla5(nomeroControl,nombre,cantAsistencias){
    let quintaPantalla = new BrowserWindow({width:1000,height:1000});
    quintaPantalla.loadURL(url.format({
        pathname: path.join(__dirname,'quintaPantalla.html'),
        protocol:'file',
        slashes:true
    })); 
    //quintaPantalla.webContents.openDevTools();
    quintaPantalla.show();
}
$("body").on("click","tr > td > button",asistencia);
$("#btnListaAsis").on("click",pantalla4);
$("#btnListaFal").on("click",pantalla5);

inicia();