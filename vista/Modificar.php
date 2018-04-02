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
            include '../consultas/verDias.php';
            include '../partials/head.php';
        ?>

        <script src='../js/validacionesAjax.js'></script>
        <script src='../js/validacionesModificar.js'></script>

    </head>
    <body>
        <?php
        include '../partials/header.php';
        ?>
        <div class="container mb-4 mt-4">

            <?php
            if (!isset($_REQUEST['valido']))
            {
                ?>
                <form class="row" id="formulario" action="modificar.php?<?php echo $lang ?>" method="POST">

                    <?php
                    include_once '../partials/autenticar.php';
            } else
            {   //Hemos dado al boton por lo tanto existe el campo valido
                if ($_REQUEST['valido'] == 0) {
                    ?>
                    <form class="row" id="formulario" action="modAdAcc.php" method="POST">

                    <?php
                    include_once '../partials/autenticar.php';
                } else
                {
                    ?>
                    <form class="row" id="formulario" action="modAdAcc.php" method="POST">
                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="nif"><?php echo _("NIF");?></label>
                        </div>
                        <input type="hidden" id="existe" name="existe">
                        <div class="col-sm-9 sm-text-center mt-4">
                            <input oninvalid="validarModificarNIF()" type="text" class="form-control" id="nif" name="nif" aria-describedby="" placeholder="<?php echo _("Enter NIF");?>" required pattern="^\d{8}[a-zA-Z]$" value='<?php if (isset($_REQUEST['existe'])) echo $_REQUEST['nif'] ?>' <?php if (isset($_REQUEST['valido'])) echo 'disabled' ?>>
                        </div>
                        <input type="hidden" value="<?php if (isset($_REQUEST['existe'])) echo $_REQUEST['nif'] ?>" name="nif">
                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="nombre"><?php echo _("Name");?></label>
                        </div>
                        <div class="col-sm-9 text-center  mt-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="" placeholder="<?php echo _("Enter name");?>" disabled>
                        </div>

                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="apellido1"><?php echo _("Last name");?></label>
                        </div>
                        <div class="col-sm-9 sm-text-center mt-4">
                            <input type="text" class="form-control" id="apellido1" name="apellido1" aria-describedby="" placeholder="<?php echo _("Enter the last name");?>" disabled>
                        </div>

                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="apellido2"><?php echo _("Second surname");?></label>
                        </div>
                        <div class="col-sm-9 sm-text-center mt-4">
                            <input type="text" class="form-control" id="apellido2" name="apellido2" aria-describedby="" placeholder="<?php echo _("Enter second surname");?>"  disabled>
                        </div>
                        <!-- CAmpo para saber los permisos-->
                        <input type="hidden" name="permisos" value="U">
                        <script>
                        ajaxRellenar();
                        </script>

                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" class="mr-sm-2" for="dia"><?php echo _("Day");?></label>
                        </div>
                        <div class="col-sm-9 sm-text-center mt-4">
                            <select class="custom-select mr-sm-2" id="fecha"  name="fecha" onchange='ajaxFecha(this.value)'>
                                <?php
                                foreach ($dias as $valor) {
                                    echo "<option value='$valor'>$valor</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" class="mr-sm-2" for="turno"><?php echo _("Turn");?></label>
                        </div>
                        <div class="col-sm-9 sm-text-center mt-4">
                            <select class="custom-select mr-sm-2" id="turno"  name="turno">
                            </select>
                        </div>

            <?php
                }
            }
            ?>
            <input type="hidden" name="valido" value="" id="valido">
            <div class="col-sm-6 offset-3 text-center mt-4">
                <button id="enviar" type="submit" name="enviar" class="btn btn-primary w-30"><?php echo _("Modify reservation");?></button>
            </div>
            </form>
        </div>
    <?php
    include '../partials/footer.php';
    ?>
    </body>
</html>