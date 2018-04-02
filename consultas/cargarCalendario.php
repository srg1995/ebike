<?php

include_once '../core/Conexion.php';
$conexion=Conexion::conectar();

$consulta = "SELECT fecha, idTurno, num_participantes FROM ruta";
$resultadoCalendario = $conexion->query($consulta);
$arrayDatos = $resultadoCalendario->fetchAll(PDO::FETCH_ASSOC);

    $eventos = array();

    foreach($arrayDatos as $resultado){
          switch ($resultado['idTurno']) {
            case "1":
                $title = "Mañana: ".$resultado['num_participantes'];
                $color = "#ECCEF5";
                break;
            case "2":
                $title = "Tarde: ".$resultado['num_participantes'];
                $color = "#A9F5E1";
                break;
            case "3":
                $title = "Noche: ".$resultado['num_participantes'];
                $color = "#F6E3CE";
                break;
        }

        $start = $resultado['fecha'];
        $eventos[] = array('title' => $title, 'start' => $start, 'color' => $color);
    }
    $arrayJson = json_encode($eventos, JSON_UNESCAPED_UNICODE);
    print_r($arrayJson);
?>