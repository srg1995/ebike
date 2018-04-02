<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contacto | Ebike </title>
    <?php
        include '../partials/head.php';
     ?>
</head>
<body>
    <?php
        include '../partials/header.php';
    ?>
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="imagen col-3 d-none d-lg-block">
                <img alt="imagen formulario" src="../img/contacto.png" class="img-thumbnail">
            </div>
            <form class="col-lg-9 col-12" id="formulario" action="archivo.php" method="POST">
                <div class="col-12 mb-1">
                    <label class="text-primary font-weight-bold" for="nombre"><?php echo _("Name and surname");?></label>
                </div>
                <div class="col-12 mb-4">
                    <input type="text" class="form-control" id="nombre" aria-describedby="" placeholder="<?php echo _("Enter name");?>">
                </div>

                <div class="col-12 mb-1">
                    <label class="text-primary font-weight-bold" for="email"><?php echo _("Email");?></label>
                </div>
                <div class="col-12 mb-4">
                    <input class="form-control" type="email" class="form-control" id="email" aria-describedby="" placeholder="<?php echo _("Enter email");?>">
                </div>

                <div class="col-12 mb-1">
                    <label class="text-primary font-weight-bold" for="exampleTextarea"><?php echo _("Description");?></label>
                </div>
                <div class="col-12 mb-4">
                    <textarea class="form-control" id="exampleTextarea" rows="6"></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary text-center">Enviar</button>
                </div>
            </form>
        </div>
    </div>



    <?php
        include '../partials/footer.php';
    ?>

</body>
</html>