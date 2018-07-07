<?php
include 'conexiones.php';
    $respuesta=false;
    $nombre=$_GET["nombre"];
    $apepat=$_GET["apepat"];
    $apemat=$_GET["apemat"];
    $telefono=$_GET["telefono"];
    $correo=$_GET["correo"];
    $domicilio=$_GET["domicilio"];
    $escolaridad=$_GET["escolaridad"];
    $profesion=$_GET["profesion"];
    

    //Conectarnos al servidor de la BD
    $con=conecta();
        $consulta="INSERT INTO `usuario` (`nombre`, `apepat`, `apemat`, `telefono`, `correo`, `domicilio`, `escolaridad`, `profesion`) VALUES ('$nombre', '$apepat', '$apemat', '$telefono', '$correo', '$domicilio', '$escolaridad', '$profesion')";
        $resConsulta=mysqli_query($con,$consulta);
                                                                                                                                            
                                                                                                                                                                                                                                                                                                                                                            
    if($resConsulta){
        $respuesta = true;
    }
    else{
        echo'sorry man';
    }
    $salidaJSON = array('respuesta'  => $respuesta);
    print json_encode($salidaJSON);
?>