<?php
//recibiendo usuario y password
$usu=$_REQUEST['usu'];
$pas=$_REQUEST['pas'];

//hacer conexion con base de datos
$cnx=new PDO("mysql:host=localhost;dbname=serviciosandroidphp","root","");
//ejecutar select y guardar en variable res
//el query permite ejecutar consulta en sql
//si existe almacena 1 y si no existe almacena el 0
$res=$cnx->query("select * from tareas where clave='$usu' and nombre='$pas'");

//crar variable datos que es un areglo
$datos=array();


if(is_array($res) || is_object($res)) {
    foreach($res as $row){
        $datos[]=$row;
    }
 }
//ya que tengo datos, mandarlo a un objeto json
echo json_encode($datos);
?>