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
        <?php include '../partials/header.php'; ?>
             <div class="container mt-4 ">
                <div class="row">

                    <div class="col-8 offset-2 text-center">
                        <h3><i class="fa fa-check-circle"></i><?php echo _(" Reserve modified successfully ");?><i class="fa fa-check-circle"></i></h3>
                        <p>puede visitar la ruta <a href="Servicios.php">ver mapa</a></p>
                        <p>
                            Para cualquier duda consultanos <a href="Contacto.php?<?php echo $lang ?>">aqui</a>
                            <img src="../logo.png" alt="Ebike" class="img-thumbnail border-0">
                        </p>

                    </div>
                </div>
            </div>
        <?php include '../partials/footer.php';?>
    </body>
    </html>