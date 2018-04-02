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
        include "../consultas/verDias.php";
        include "../consultas/verTurnos.php";
        ?>
        <script src="../js/administracion.js"></script>
    </head>
    <body>

        <?php
        $con = Conexion::conectar();
        if (isset($_REQUEST['dni'])) {

            $sql = "SELECT  nif, p.nombre, apellido1, apellido2, confirmado, fecha, t.nombre as turno FROM participante p, turno t, ruta r
where p.idRuta=r.idRuta and r.idTurno=t.id and nif='" . $_REQUEST['dni'] . "'";

            $resultado = $con->query($sql);

            $row = $resultado->fetch(PDO::FETCH_OBJ);

            ?>
            <table class="col-12 mt-3 mb-4 table table-hover" id="Exportar_a_Excel">
                    <thead>
                        <tr>
                            <th>NIF</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO 1</th>
                            <th>APELLIDO 2</th>
                            <th>CONF</th>
                            <th>DIA DEL MES</th>
                            <th>TURNO</th>
                        </tr>
                    </thead>
                <?php
                    echo "<tbody>";


                            //Por cada registro creamos un formulario para que al editar unicamente mande los datos de ese unico registro
                            echo '<form action="" method="post">';
                            echo "<tr>";
                                echo "<td class='pt-3'><input size='9'name='nif' value='$row->nif'></td>";
                                echo "<td class='pt-3'><input name='nombre' value='$row->nombre'> </td>";
                                echo "<td class='pt-3'><input name='apellido1' value='$row->apellido1'> </td>";
                                echo "<td class='pt-3'><input name='apellido2' value='$row->apellido2'> </td>";
                                echo "<td class='pt-3'><input size='1' name='confirmado' value='$row->confirmado' disabled> </td>";
                                echo "<td class='pt-3'>";

                                ?>
                                    <select class="custom-select mr-sm-2" id="dia"  name="dia" onchange='ajaxFecha(this.value)'>
                                    <?php
                                    foreach ($dias as $valor) {
                                        $date = strtotime($valor);
                                        setlocale(LC_ALL, "es_ES");
                                        echo "<option value='$valor'";
                                        if($valor==$row->fecha)
                                        {
                                            echo " selected ";
                                        }
                                        echo ">" . strtoupper(strftime("%d-%B", $date)) . "</option>";
                                    }
                                    ?>
                                </select>
                                </td>



                                <td class='pt-3'><select class="custom-select mr-sm-2" id="turno"  name="turno">
                                     <?php
                                     foreach ($turnos as $valor) {

                                        echo "<option value='$valor'";
                                        if($valor==$row->turno)
                                        {
                                            echo " selected ";
                                        }
                                        echo ">" .$valor. "</option>";
                                    }
                                    echo "</select></td></tr>";
                echo "</table>";
                echo "<button class='btn btn-primary center' type='submit' name=borrar onclick=this.form.action='borrarAdmin.php'>Modificar</button>";


        }

        include '../partials/footer.php';
        ?>

    </body>
</html>
