<?php

include "../core/Conexion.php";
$dni=$_POST['dni'];
$conexion = Conexion::conectar();



$sql = "select nif from participante where nif='$dni'";

$resultado=$conexion->query($sql);
//echo $resultado->rowCount();

if($resultado->rowCount()!=0)
{
    echo "Existe";
}else
{
    echo "no existe";
}
/*
return true;

$datos=array();
$row = $resultado->fetch(PDO::FETCH_OBJ);

while ($row != null) {
    $datos[]= $row;
    $row = $resultado->fetch(PDO::FETCH_OBJ);
}

echo (json_encode($datos));
*/


?>