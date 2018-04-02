<?php
$dni = $_REQUEST['dni'];

include '../core/Conexion.php';
$con = Conexion::conectar();
$sql = "select nombre, apellido1, apellido2 from participante where nif='$dni'";
$resultado = $con->query($sql);
$row=$resultado->fetch(PDO::FETCH_OBJ);
echo json_encode($row);
?>

