<?php
session_start();
?>
<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <title>Disponibilidad | Ebike </title>
        <?php
        include '../partials/head.php';
        include '../partials/header.php';
        include "../core/Conexion.php";
        ?>



    </head>
    <body>
        <?php
        $con = Conexion::conectar();

//print_r($_REQUEST);
        if (isset($_REQUEST['nif'])) {
            //Actualizar todas las tablas
            
            $dia=$_REQUEST["fecha"];
            $turno=$_REQUEST["turno"];
           
            
            $sqldia="select id from turno where nombre='$turno'";
            $result=$con->query($sqldia);
            $idTurno=$result->fetch(PDO::FETCH_OBJ)->id;
            
            
            $sqlfecha="select idRuta from ruta where idTurno=$idTurno and fecha='$dia'";
            $result=$con->query($sqlfecha);
            $row=$result->fetch(PDO::FETCH_OBJ);
            $idRuta=$row->idRuta;
            
            $nif=$_REQUEST['nif'];
            $sqlIsrutaviejo="select idRuta from participante where nif='$nif'";
            $result=$con->query($sqlIsrutaviejo);
            $row=$result->fetch(PDO::FETCH_OBJ);
            $idRutaViejo=$row->idRuta;
         
            $sql = "update participante set idRuta=$idRuta where idRuta=$idRutaViejo";
            $result = $con->exec($sql);
            //cascca
            if ($result > 0) {
                echo "Actualizado bien";
            } else {
                echo "No has actualizado nada";
            }
        }

        
        
       
        
        $url=substr($_SERVER['HTTP_REFERER'], 33);
        //Si la ruta viene de administrador mostrar enlace administrador, sino el otro
        if($url!="modificar.php")
        {
            echo "<a href='administracion.php'>Volver a administracion</a>";
        }else
        {
            echo "<a href='../index.php'>Volver al menu</a>";
        }
        
        ?>


                <?php
                include '../partials/footer.php';
                ?>

    </body>
</html>