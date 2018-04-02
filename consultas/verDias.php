<?php
include_once '../core/Conexion.php';
$conexion=Conexion::conectar();

$consultaDias = "SELECT DISTINCT fecha FROM ruta";
$resultadoDias = $conexion->query($consultaDias);
while ($res = $resultadoDias->fetch(PDO::FETCH_OBJ)) {
    $dias[] = $res->fecha;
}

$formasConocer = array("AVILA TURISMO WEB", "FOLLETOS PUBLICITARIOS", "BUSQUEDA EN INTERNET", "VISTO EN EL HOTEL", "OTROS: OFRECIERON POR LA CALLE", "OTROS:ME LO DIJO UN FAMILIAR", "OTROS: ME LAS ENCONTRE EN LA CALLE Y PREGUNTE");