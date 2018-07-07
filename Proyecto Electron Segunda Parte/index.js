const $ = require('jquery');
//Para tener acceso al main atraves del js
//Para obtener informacion
const{BrowserWindow}=require('electron').remote
const app=require('electron').app
const path = require('path')
const url = require('url')

function datos(usuariovalida,periodo){
    this.usuariovalida=usuariovalida;
    this.periodo=periodo;
}
//Declaro la url a la que voy a acceder
var url2 = 'http://itculiacan.edu.mx/dadm/apipaselista/data/validausuario.php?usuario=';

function login(){
    //Creo variable de usuario
    var usuario = $("#usuario").val();
   
    //Creo variable de contraseña
    var contra = $("#contra").val();
    
    // concateno los valores de usuario y la contraseña en la variable url2 para ver si los datos son validos.
    url2 = url2 +usuario+"&clave="+contra;
    
    $.ajax({
        url: url2,
        dataType:'json',
        success: function(data){
            if(data.respuesta){
                var usuariovalida = data.usuariovalida;
                var periodo = data.periodoactual;
                abrirSegundaPantalla(usuario,usuariovalida,periodo);                
            }
            else{
                alert("*** Usuario o Contraseña Incorrecta ***");
                $("#usuario").val("");
                $("#usuario").focus();
                $("#contra").val("");
            }
        }
    })
    url2 = 'http://itculiacan.edu.mx/dadm/apipaselista/data/validausuario.php?usuario=';
    
}
//Funcion para abrir la segunda pantalla 
function abrirSegundaPantalla(usuario,usuariovalida,periodo){

    //llenar las variables globales
    require('electron').remote.getGlobal('infoUsuarios').usuario=usuario;
    require('electron').remote.getGlobal('infoUsuarios').usuariovalida=usuariovalida;
    require('electron').remote.getGlobal('infoUsuarios').periodo=periodo;

    let segundaPantalla = new BrowserWindow({width:1000,height:1000});
    segundaPantalla.loadURL(url.format({
        pathname: path.join(__dirname,'segundaPantalla.html'),
        protocol:'file',
        slashes:true
    })); 
    //segundaPantalla.webContents.openDevTools();
    segundaPantalla.show();
}
var enter = function(tecla){
    if(tecla.which == 13){//Enter
        login();
    }
}
const botonAceptar = document.getElementById('btnAceptar')
botonAceptar.addEventListener('click',login);
$("#contra").on("keypress",enter);
$("#usuario").on("keypress",function(tecla){
    if(tecla.which == 13){//Enter
        $("#contra").focus();  
    }
});

