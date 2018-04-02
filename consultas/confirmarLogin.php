<?php
$dni = $_REQUEST['dni'];
$password = sha1($_REQUEST['pass']);
$password = substr($password, 0, 32);
include '../core/Conexion.php';
$con = Conexion::conectar();
$sql = "select nombre, apellido1, apellido2 from participante where nif='$dni' and password='$password'";
$resultado = $con->query($sql);

if ($resultado->rowCount() == 1) {
    echo 1;
    
}else
{
    echo 0;
}



?>

