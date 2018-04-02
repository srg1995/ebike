<?php
session_start();
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Reservas | Ebike </title>
        <?php include '../partials/head.php'; ?>
    </head>
    <body>
        <?php include '../partials/header.php'; ?>
             <div class="container mt-4">
                <div class="row">

                    <div class="col-8 offset-2 text-center">

                        <h2><i class="fa fa-paper-plane"></i> Su email ha sido enviado correctamente <i class="fa fa-paper-plane"></i></h2>
                        <h6>Estas a un paso de confirmar tu reserva</h6>

                        <p>
                            Para finalizar su reserva, debe introducir en la direccion que hemos enviado a su correo electronico la contaseña.
                        </p>
                        <p>
                            <strong>Si no ve el correo en la bandeja de entrada revise su correo spam</strong>
                            <img src="../logo.png" alt="Ebike" class="img-thumbnail border-0">
                        </p>
                    </div>
                </div>
            </div>
        <?php include '../partials/footer.php';?>
    </body>
    </html>

    <!--



     -->