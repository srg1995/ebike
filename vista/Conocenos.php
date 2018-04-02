<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Conocenos | Ebike </title>
    <?php
        include '../partials/head.php';
     ?>

     <style type="text/css">
        .fin{
            position: absolute;
            bottom: 0;
        }
/*        img{
            marg
        }*/

        @media (max-width: 991px) {
            .fin{
                position: relative;
            }
            .video{
                top:30px;
            }
        }
        
         @media (max-width: 768px) {
            .fin{
                position: relative;
                bottom: 0;
            }
        }
     </style>
</head>
<body>
    <?php
        include '../partials/header.php';
    ?>

        <div class="container mt-4 mb-4">
            <h1 class="text-center pb-2"><?php echo _("About us");?></h1>

            <div class="row">
            <div class="col-12 d-md-none d-sm-block video pb-5">
                <div class="text-center">
                    <video loop muted autoplay poster="../img/banner2.png" class="fullscreen-bg__video " width="100%">
                        <source src="../img/videos/video2.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
                <div class="col-12 col-md-3">
                     <div class="col-12 text-center">
                        <h6><?php echo _("INTEGRATED SCHOOL");?></h6>
                        <div class="row">
                            <!--<img class="img-fluid" height="100" src="../img/Colaboradores/CentroIntegrado.png">-->
                            <p class="col-12 text-center">Calle Giacomo Puccini, 2, 05003 Ávila</p>
                            <img src="../img/Colaboradores/CentroIntegrado.png" height="40px" class="mb-2 m-auto">
                        </div>
                    </div>
                    <div class="col-12 text-center fin">
                        <h6><?php echo _("IES ALONSO DE MADRIGAL");?></h6>

                        <div class="row">
                            <!-- <img class="img-fluid" height="100" src="../img/Colaboradores/IESalonso.png">-->
                            <p class="col-12 text-center">Calle Juan Grande, 1, 05003 Ávila</p>
                            <img src="../img/Colaboradores/IESalonso.png" height="40px" class="mb-2 m-auto">
                        </div>

                    </div>
                </div>
                <div class="col-6 d-none d-md-block video">
                    <div class="text-center">
                        <video loop muted autoplay poster="../img/banner2.png" class="fullscreen-bg__video " width="100%">
                            <source src="../img/videos/video2.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="col-12 text-center">
                        <h6>IES JORGE SANTAYANA</h6>
                        <div class="row">
                            <!--<img class="img-fluid" height="100" src="../img/Colaboradores/IESsantayana.png">-->
                            <p class="col-12 text-center">Calle Santo Tomás, 6, 05003 Ávila</p>
                            <img src="../img/Colaboradores/IESsantayana.png" height="40px" class="mb-2 m-auto">
                        </div>
                    </div>
                    <div class="col-12  text-center fin">
                        <h6>IES VASCO DE LA ZARZA</h6>
                        <div class="row" >
                            <!--<img class="img-thumbnail text-center " src="../img/Colaboradores/IESvasco.png">-->
                            <p class="col-12 text-center">Calle Valladolid, 19, 05005 Ávila</p>
                            <img src="../img/Colaboradores/IESvasco.png" height="40px" class="mb-2 m-auto" >
                        </div>
                    </div>
                </div>
            </div>

    </div>
        <?php
        include '../partials/footer.php';
    ?>

</body>
</html>
