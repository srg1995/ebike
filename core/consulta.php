<?php

include "Conexion.php";

$conexion = Conexion::conectar();
$conexion->iniciarConexionPDO();
$sql = "select nif from participante;";

$resultado=$conexion->query($sql);
$datos=array();
$row = $resultado->fetch(PDO::FETCH_OBJ);

while ($row != null) {
    $datos[]= $row;
    $row = $resultado->fetch(PDO::FETCH_OBJ);
}

echo (json_encode($datos));

?>