<?php

//recibiendo usuario y password
$cve=$_REQUEST['cve'];
$nom=$_REQUEST['nom'];
$des=$_REQUEST['des'];
$time=$_REQUEST['time'];

//hacer conexion con base de datos
$cnx=new PDO("mysql:host=localhost;dbname=id5739563_serviciosandroidphp","id5739563_root","123456");

//ejecutar select y guardar en variable res
//el query permite ejecutar consulta en sql
//si existe almacena 1 y si no existe almacena el 0
//$res=$cnx->query("select * from tareas where clave='$cve' and nombre='$nom'");

$res=$cnx->query("INSERT INTO tareas VALUES ('$cve','$nom','$des','$time')");

//crar variable datos que es un areglo
$datos=array();


if(is_array($res) || is_object($res)) {
    foreach($res as $row){
        $datos[]=$row;
    }
 }
//ya que tengo datos, mandarlo a un objeto json
echo json_encode($datos);
