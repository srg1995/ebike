<?php


if (isset($_REQUEST['hash'])) {



    $hash = $_REQUEST['hash'];

    require_once '../core/Conexion.php';
    $conexion = Conexion::conectar();

    $sql = "update participante set confirmado=1 where hash='" . $hash . "'";
    $conexion->exec($sql);


    header("location: ../vista/confirmadoExito.php");
} else {
    
    header("location: index.php");
}
?>