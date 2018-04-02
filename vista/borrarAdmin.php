<?php
session_start();
?>
<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <title>Reservas | Ebike </title>

        <?php
        include '../partials/head.php';
        include '../partials/header.php';
        include "../core/Conexion.php";
        ?>



    </head>
    <body>
        <?php
        $con = Conexion::conectar();


        if (isset($_REQUEST['dni'])) {
            $sql = "delete from participante where nif='" . $_REQUEST['dni'] . "'";
            $result = $con->exec($sql);
            if ($result > 0) {
                echo "Borrado bien";
            } else {
                echo "Error al borrar";
            }
        }

        echo "<a href='administracion.php'>Volver a administracion</a>";
        ?>


                <?php
                include '../partials/footer.php';
                ?>

    </body>
</html>