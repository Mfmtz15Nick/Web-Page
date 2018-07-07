<?php
function conecta(){
    //Servidor, usuario, contraseña, base de datos
    $con=mysqli_connect("127.0.0.1","root","","sempo");
    return $con;
}


?>