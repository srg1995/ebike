<?php
$fecha = $_REQUEST['fecha'];
include_once '../core/Conexion.php';
$conexion=Conexion::conectar();

$consultaTurnos = "SELECT nombre, fecha FROM turno, ruta WHERE turno.id=ruta.idTurno && ruta.num_participantes>(SELECT COUNT(*) FROM participante WHERE idRuta=1) && ruta.fecha='".$fecha."'";

$resultadoTurnos = $conexion->query($consultaTurnos);
while($res = $resultadoTurnos->fetch(PDO::FETCH_OBJ)){
    $turnos[] = $res->nombre;
}
echo json_encode($turnos);
 ?>