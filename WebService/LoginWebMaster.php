<?php
//recibiendo usuario y password
$telefono=$_REQUEST['telefono'];
$contra=$_REQUEST['contra']


//hacer conexion con base de datos
$cnx=new PDO("mysql:host=localhost;dbname=id5739563_controlacceso","id5739563_pelonchas","123456");
//ejecutar select y guardar en variable res
//el query permite ejecutar consulta en sql
//si existe almacena 1 y si no existe almacena el 0
$res=$cnx->query("select * from Master where telefono='$telefono' and contra='$contra'");

//crar variable datos que es un areglo
$datos=array();


if(is_array($res) || is_object($res)) {
    foreach($res as $row){
        $datos[]=$row;
    }
 }
//ya que tengo datos, mandarlo a un objeto json
echo json_encode($datos);
