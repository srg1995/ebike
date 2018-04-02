<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reservas | Ebike </title>
    <?php
        include '../partials/head.php';
     ?>
    <script src="../js/validacionesConfirmar.js"></script>
</head>
<body>
    <?php
        include '../partials/header.php';
    ?>

    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-8 offset-2 text-center">

                <h3 class="mb-4"><?php echo _("BOOKING CONFIRMATION");?></h3>


                <form class="col-12" id="formulario" action="confirmadoExito.php" method="POST">
                    <div class="col-12 mb-1">
                        <div class="row">
                            <label for="pwd" class="col-12 col-md-3 col-md-3 mt-1 "><?php echo _("Password");?></label>
                            <input onblur="validarPassword(this);" onchange="comprobarPassword(this.value);" type="password" class="form-control col-12 col-md-9 col-lg-9" id="pwd" aria-describedby="" placeholder="<?php echo _("Enter password");?>">
                        </div>
                    </div>
                    <input type="hidden" name="hash" id="hash" value=" <?php echo $_REQUEST['hash'] ?>">
                    
                    <input type="submit" name="Confirmar" class="btn btn-primary mt-4">

                </form>

            </div>
        </div>
    </div>
    <?php
        include '../partials/footer.php';
    ?>

</body>
</html>