<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reservas | Ebike</title>
        <?php
            include '../consultas/verDias.php';
            include '../partials/head.php';
         ?>
         <script type="text/javascript" src="../js/validacionesAjax.js"></script>
         <script type="text/javascript" src="../js/validacionesModificar.js"></script>

    </head>
    <body>
        <?php
        include '../partials/header.php';
        ?>
        <div class="container mt-4 mb-4">

            <?php
            if (!isset($_REQUEST['valido']))
            {
                ?>
                <form class="row" id="formulario" action="borrar.php?<?php echo $lang ?>" method="POST">

                    <?php
                    include_once '../partials/autenticar.php';
            } else
            {   //Hemos dado al boton por lo tanto existe el campo valido
                if ($_REQUEST['valido'] == 0)
                {
                    ?>
                    <form class="row" id="formulario" action="modificar.php" method="POST">

                    <?php
                        include_once '../partials/autenticar.php';
                } else
                {
                        ?>
                    <form class="row" id="formulario" action="../consultas/borrarReserva.php" method="POST">
                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="nif"><?php echo _("NIF");?></label>
                        </div>
                        <input type="hidden" id="existe" name="existe">
                        <div class="col-sm-9 sm-text-center mt-4">
                            <input oninvalid="validarModificarNIF()" type="text" class="form-control" id="nif" name="nif" aria-describedby="" placeholder="<?php echo _("Enter NIF")?>" required pattern="^\d{8}[a-zA-Z]$" value='<?php if (isset($_REQUEST['existe'])) echo $_REQUEST['nif'] ?>' <?php if (isset($_REQUEST['valido'])) echo 'disabled' ?>>
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
                            <input type="text" class="form-control" id="apellido1" name="ape1" aria-describedby="" placeholder="<?php echo _("Enter last name");?>" disabled>
                        </div>

                        <div class="col-sm-3 sm-text-center mt-4">
                            <label class="text-primary font-weight-bold" for="apellido2"><?php echo _("Second surname");?></label>
                        </div>
                        <div class="col-sm-9 sm-text-center mt-4">
                            <input type="text" class="form-control" id="apellido2" name="ape2" aria-describedby="" placeholder="<?php echo _("Enter second surname");?>"  disabled>
                        </div>

                        <script>
                        ajaxRellenar();
                        </script>
            <?php
                }
            }
            ?>
                <input type="hidden" name="valido" value="" id="valido">
                <div class="col-sm-6 offset-3 text-center mt-4">
                    <button id="enviar" type="submit" name="borrarReserva" class="btn btn-primary w-30"><?php echo _("Delete reservation");?></button>
                </div>
            </form>
        </div>
        <?php
        include '../partials/footer.php';
        ?>
    </body>
</html>