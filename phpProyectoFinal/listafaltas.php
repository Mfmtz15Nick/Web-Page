<?php
include 'conexiones.php';

    $respuesta=false;
    $periodo=$_GET["periodo"];
    $materia=$_GET["materia"];
    $grupo=$_GET["grupo"];

    

    //Conectarnos al servidor de la BD
    $con=conecta();
    $consulta="select * from reportealumnos where periodo='".$periodo."' and materia='".$materia."' and grupo='".$grupo."'order by faltas desc";
    $resConsulta=mysqli_query($con,$consulta);
    $tabla = "";
  
    if($resConsulta){ 
		$respuesta = true;
		$tabla.= "<thead>";
		$tabla.= "<tr>";
		$tabla.= "<th>Numero Control</th>";
		$tabla.= "<th>Nombre</th>";
		$tabla.= "<th>Faltas</th>";
		$tabla.= "</tr>";
		$tabla.= "</thead>";
		$tabla.= "<tbody>";
		$cuenta = 0;
		while($registro=mysqli_fetch_array($resConsulta)){
			$cuenta = $cuenta + 1;
			$tabla.= "<tr>";
			$tabla.= "<td>".$registro["ncontrol"]."</td>";			
			$tabla.= "<td>".$registro["nombre"]."</td>";			
			$tabla.= "<td>".$registro["faltas"]."</td>";			
			$tabla.= "</tr>";
		}
		$tabla.= "</tbody>";
	}else{
        echo 'Sorry man';
    }
	$salidaJSON = array('respuesta' => $respuesta,
                        'tabla'     => $tabla);
	print json_encode($salidaJSON);
?>