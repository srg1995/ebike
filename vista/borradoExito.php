<?php
session_start();
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Reservas | Ebike </title>
        <?php include '../partials/head.php'; ?>
        <script src="https://use.fontawesome.com/e084de579c.js"></script>
    </head>
    <body>


        <?php include '../partials/header.php';
    ?>

        <div class="container mt-4 mb-4">
            <div class="row">

                <div class="col-8 offset-2 text-center">
                    <h3><i class="fa fa-trash"></i><?php echo _(" Booking canceled successfully ");?><i class="fa fa-trash"></i></h3>
                    <p>Para cuaquier duda puedes consultarnos <a href="Contacto.php?<?php echo $lang ?>">aqui</a></p>
                    <img src="../img/ElProyecto.JPG" class="img-thumbnail" alt="imagen">
                </div>
            </div>
        </div>

    <?php
        include '../partials/footer.php';
    ?>
    </body>
    </html>