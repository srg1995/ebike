<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administracion | Ebike </title>
    <?php
        include '../consultas/verDias.php';
        include '../partials/head.php';
     ?>
     <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
     <script language="javascript">
        $(document).ready(function() {
            $(".botonExcel").click(function(event) {
                $("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
                $("#FormularioExportacion").submit();
            });
        });

</script>
<script src="../js/administracion.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <?php
        include '../partials/header.php';
    ?>
    <div class="container text-center mt-4 mb-4">
        <h2>LISTADO DE RESERVAS</h2>


            <?php
            try
            {
                //Intentamos realizar la conexion
                $conexion = new PDO("mysql:host=localhost;dbname=ibike", "root", "");
                //Le decimos a la conexion que establezca el atributo ERRMODE_EXCEPTION para poder capturar excepciones
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //Ponemos el juego de caracteres a utf8 para que nos coja tildes y mas cosas de nuestro lenguaje
                $conexion->exec("set names utf8");


            } catch (PDOException $e) //Capturamos excepciones en casa de que las hubiera
            {
                //Si hay alguna excepcion capturamos el codigo de error y el mensaje
                $error = $e->getCode();
                $mensaje = $e->getMessage();
            }

            $sql = "SELECT  nif, p.nombre, apellido1, apellido2, confirmado, fecha, t.nombre as turno FROM participante p, turno t, ruta r
where p.idRuta=r.idRuta and r.idTurno=t.id order by fecha desc;";

            //Realizamos la consulta a la base de datos y guardamos los datos en resultado
            $resultado = $conexion->query($sql);

            //Si hay algun resultado...
            if ($resultado)
            {
                ?>
                <table class="col-12 mt-3 mb-4 table table-hover" id="Exportar_a_Excel">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>NIF</th>
                            <th>DIA</th>
                            <th>TURNO</th>
                            <th>CONFIRMADA</th>
                            <th>CANCELACION</th>
                            <th>MODIFICAR</th>
                        </tr>
                    </thead>
                <?php
                    echo "<tbody>";

                        //Guardamos en row un objeto que es un registro de la consulta
                        $row = $resultado->fetch(PDO::FETCH_OBJ);
                        //Creamos una tabla para mostrar los datos


                        //Mientras que haya registros..
                        while ($row != null)
                        {

                            //Por cada registro creamos un formulario para que al editar unicamente mande los datos de ese unico registro
                            echo '<form action="" method="post">';
                            echo "<tr>";
                                echo "<td class='pt-3'>$row->apellido1 $row->apellido2, $row->nombre </td>";
                                echo "<input type='hidden' name='dni' value='$row->nif'>";
                                echo "<td class='pt-3'>$row->nif</td>";
                                echo "<td class='pt-3'>$row->fecha</td>";
                                echo "<input type='hidden' name='fecha' value='$row->fecha'></td>";
                                echo "<td class='pt-3'>$row->turno</td>";
                                echo "<input type='hidden' name='turno'  value='$row->turno'></td>";
                                echo "<td class='pt-3'>";
                                if($row->confirmado==0)
                                {
                                    echo "NO";
                                } else {
                                    echo "SI";
                                }
                                echo "</td>";


                                echo "<td><button class='btn btn-primary' type='submit' name=borrar onclick=this.form.action='borrarAdmin.php'>Borrar</button></td>";
                                echo "<td><button class='btn btn-primary' type='submit' name=modificar onclick=this.form.action='modificarAdmin.php'>modificar</button></a></td>";

                            echo "</tr>";
                            echo "</form>";
                            //Volvemos a obtener un registro hasta que sea null
                            $row = $resultado->fetch(PDO::FETCH_OBJ);
                        }
                     echo "</tbody>";
                    //Cerramos la tabla
                print("</table>");
            }
        ?>



    <form action="../consultas/ficheroExcel.php" method="post" target="_blank" id="FormularioExportacion">
        <p>Exportar a Excel  <img src="../img/excel.png" class="botonExcel" height="25px" width="25px" /></p>
        <input type="hidden" id="datos_a_enviar" name="datos_a_enviar" />
    </form>

</div>

    <?php
        include '../partials/footer.php';
    ?>

</body>
</html>