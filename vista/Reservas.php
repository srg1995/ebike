<?php
session_start();
?>
<!DOCTYPE html>
<?php
    include '../consultas/verDias.php';

?>
<html>
<head>
    <title>Reservas | Ebike </title>
    <?php
        include '../partials/head.php';
        include '../consultas/realizarReserva.php';
    ?>
    <script src="../js/validacionesAjax.js"></script>
    <script src="../js/validacionesReservas.js"></script>

</head>
<body>
    <?php
        include '../partials/header.php';
        ?>
        <div class="container mb-4 mt-4">
            <form class="row" id="formulario" action="../consultas/realizarReserva.php?<?php echo $lang ?>" method="POST">

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="nombre"><?php echo _("Name");?></label>
                </div>
                <div class="col-sm-9 text-center  mt-4">
                    <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="" placeholder="<?php echo _("Enter name");?>" required pattern="^[a-zA-Z ]*$">
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="apellido1"><?php echo _("Last name");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="text" class="form-control" id="apellido1" name="ape1" aria-describedby="" placeholder="<?php echo _("Enter last name");?>" required  pattern="^[a-zA-Z ]*$">
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="apellido2"><?php echo _("Second surname");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="text" class="form-control" id="apellido2" name="ape2" aria-describedby="" placeholder="<?php echo _("Enter second surname");?>" required pattern="^[a-zA-Z ]*$">
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="edad"><?php echo _("Age");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="number" class="form-control" id="edad" name="edad" aria-describedby="" placeholder="<?php echo _("Enter age");?>" required min="17" max="100">
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="nif"><?php echo _("NIF");?></label>
                </div>
                <input type="hidden" id="existe">
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="text" class="form-control" id="nif" name="nif" aria-describedby="" placeholder="<?php echo _("Enter NIF")?>" required pattern="^\d{8}[a-zA-Z]$">
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="email"><?php echo _("Mobile phone:");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="number" class="form-control" id="telefono" name="telefono" aria-describedby="" placeholder="<?php echo _("Enter mobile phone");?>"  required pattern="^(6|7)\d{8}$">
                </div>


                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" for="email"><?php echo _("Email");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="" placeholder="<?php echo _("Enter email");?>"  required >
                </div>



                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" class="mr-sm-2" for="conocido"><?php echo _("How have you known us?");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <select class="custom-select mr-sm-2" id="conocido"  name="conocer">
                        <?php
                        foreach ($formasConocer as $valor)
                        {
                            echo "<option value='$valor'>";
                            echo _($valor);
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" class="mr-sm-2" for="dia"><?php echo _("Day");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <select class="custom-select mr-sm-2" id="dia"  name="dia" onchange='ajaxFecha(this.value)'>
                        <?php
                        foreach ($dias as $valor)
                        {
                            $date=strtotime($valor);
                            setlocale(LC_ALL,"es_ES");
                            echo "<option value='$valor'>".strtoupper(strftime("%d-%B",$date))."</option>";
                        }
                        ?>
                    </select>
                </div>



                <div class="col-sm-3 sm-text-center mt-4">
                    <label class="text-primary font-weight-bold" class="mr-sm-2" for="conocido" id="prueba"><?php echo _("Turn");?></label>
                </div>
                <div class="col-sm-9 sm-text-center mt-4">
                    <select class="custom-select mr-sm-2" id="turno" name="turno">
                    </select>
                </div>
                <?php
                    if(isset($_SESSION['lang']) && $_SESSION['lang']=="en_US"){
                        $lang ="lang=en";
                    }
                    else{
                        $lang ="lang=es";
                    }
                ?>
                <input type="hidden" name="idioma" value="<?php echo $lang ?>">
                <div class="col-sm-6 offset-3 text-center mt-4">
                    <button id="enviar" type="submit" name="enviar" class="btn btn-primary w-30"><?php echo _("Make a reservation");?></button>
                </div>

            </form>

        </div>


        <?php
        include '../partials/footer.php';
    ?>

</body>
</html>


