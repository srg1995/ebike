<?php

include '../core/Conexion.php';
$conexion=Conexion::conectar();


$nif=$_REQUEST['nif'];

$sql="delete from  participante where nif='$nif'";
$conexion->exec($sql);

//modificar idioma
header("location:../vista/borradoExito.php");


