<?php
session_start();


if (isset($_REQUEST['hash'])) {
    $hash = substr($_REQUEST['hash'],1,32);

    require_once '../core/Conexion.php';
    $conexion = Conexion::conectar();
    $sql = "update participante set confirmado=1 where hash='". $hash ."'";
    $datos=$conexion->exec($sql);

//    if($datos!=0)
//        //echo "OK";
//   // else {
//
//   // echo "MAL";
//
//    }
    //$conexion->commit();

?>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Reservas | Ebike </title>
            <?php include '../partials/head.php'; ?>
        </head>
        <body>
            <?php include '../partials/header.php'; ?>
                 <div class="container mt-4 mb-4">
                    <div class="row">

                        <div class="col-8 offset-2 text-center" >
                            <h3> <i class="fa fa-check-circle"></i><?php echo _(" CONFIRMED RESERVATION ");?><i class="fa fa-check-circle"></i></h3>
                            <img src="../img/mapa/postes.JPG" class="m-auto img-thumbnail">
                            <p>Gracias por confiar en Ebike.<br> Disfrute de su ruta en bicicleta electrica, para cualquier duda no dudes en preguntarnos <a href="Contacto.php">aqui</a></p>
                            <p>Puede visitar la ruta <a href="Servicios.php?<?php echo $lang ?>">ver mapa</a></p>

                        </div>
                    </div>
                </div>
            <?php include '../partials/footer.php';?>
        </body>
    </html>

<?php
} else {
    header("location: principal.php");
}
?>

