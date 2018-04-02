<?php
include_once '../core/Conexion.php';
$conexion=Conexion::conectar();

$hash = trim($_REQUEST['hash']);
$password = $_REQUEST['password'];

$sha1pass= sha1($password);

$hash=substr($hash, 0, 32);

$sha1pass=substr($sha1pass, 0, 32);

//echo $sha1pass;
//echo $hash;

$consultaTurnos = "SELECT * FROM participante WHERE hash='$hash' && password ='$sha1pass'";


$res = $conexion->query($consultaTurnos);

//echo $res->rowCount();

if($res->rowCount() != 1){
    echo "false";
}
else{
    echo "true";
}

?>