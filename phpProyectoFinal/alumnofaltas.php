<?php
include 'conexiones.php';

    $respuesta=false;
    $periodo=$_GET["periodo"];
    $ncontrol=$_GET["ncontrol"];
    $nombre=$_GET["nombre"];
    $materia=$_GET["materia"];
    $grupo=$_GET["grupo"];

    

    //Conectarnos al servidor de la BD
    $con=conecta();
    $consulta="select * from reportealumnos where periodo=".$periodo." and ncontrol=".$ncontrol;
    $resConsulta=mysqli_query($con,$consulta);
   
  
    if(mysqli_num_rows($resConsulta)>0){
        $respuesta = true;
        while ($regConsulta=mysqli_fetch_array ($resConsulta)) {
           /* $periodo = "";
            $ncontrol= "";
            $nombre  = "";
            $materia= "";
            $grupo  = "";*/
            $periodo = $regConsulta["periodo"]; 
            $ncontrol= $regConsulta["ncontrol"];
            $nombre  = $regConsulta["nombre"];
            $materia = $regConsulta["materia"];
            $grupo   = $regConsulta["grupo"];
            $faltas = $regConsulta["faltas"];
            $faltas=$faltas+1;
           // $actualiza="UPDATE `reportealumnos` SET `asistencias`= 2 WHERE ncontrol='$ncontrol";
            $actualiza="Update `reportealumnos` Set faltas='$faltas' Where ncontrol='$ncontrol'";
            $rCons=mysqli_query($con,$actualiza);
            if(!$rCons){
                echo 'errroooooor';
            }else{
                $respuesta=true;
            }
             
        }
    }else{
        $inserta="INSERT INTO `reportealumnos` (`identificador`, `periodo`, `ncontrol`, `nombre`, `materia`, `grupo`, `faltas`, `asistencias`) VALUES (NULL, '$periodo', '$ncontrol', '$nombre', '$materia', '$grupo', '1', '0')";
        $rCon=mysqli_query($con,$inserta);
        if(!$rCon){
            $respuesta=false;
        }else{
            $respuesta= true;
        }

    }
    $salidaJSON = array('respuesta'  => $respuesta
                       /* 'periodo'    => $periodo,
                        'ncontrol'   => $ncontrol,
                        'nombre'     => $nombre,
                        'materia'    => $materia,
                        'grupo'      => $grupo*/);
    print json_encode($salidaJSON);
?>