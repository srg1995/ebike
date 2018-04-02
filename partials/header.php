<header class="container-fluid bg-light">
    <div class=" container">
        <div class="row">
            <?php
                if(isset($_SESSION['lang']) && $_SESSION['lang']=="en_US"){
                    $lang ="lang=en";
                }
                else{
                    $lang ="lang=es";
                }
            ?>

            <div class="col-md-3 col-lg-2 col-sm-4 col-3 align-item-top d-none d-sm-block" >
                <a href="../vista/Principal.php?<?php echo $lang ?>"><img src="../logo.png" class="img-thumbnail bg-light border-light "></a>
            </div>

            <div class="col-12 col-sm-8 col-md-9 col-lg-10 pt-md-4 pt-sm-3 pt-lg-2">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-12 order-3 order-md-1 float-sm-right ">
                        <div class="row">
                            <div class="col-sm-9 col-12 float-right float-sm-none ">
                                <div class="row">
                                    <div class="d-none d-md-block col-9 col-md-8 text-right mt-2">
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="fa fa-facebook-square " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                        <a href="https://plus.google.com" target="_blank">
                                            <i class="fa fa-google-plus-square " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="fa fa-instagram " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                        <a href="https://twitter.com" target="_blank">
                                            <i class="fa fa-twitter-square " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                        <a href="https://github.com" target="_blank">
                                            <i class="fa fa-git-square " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                        <a href="https://www.linkedin.com" target="_blank">
                                            <i class="fa fa-linkedin-square " aria-hidden="true" style="font-size:25px"></i>
                                        </a>
                                    </div>

                                    <div class="text-center text-sm-right mt-2 mt-sm-0 col-12 col-sm-3 col-md-4">
                                        <div class="btn-group ">
                                            <button type="button" class="btn btn-default dropdown-toggle bg-light" data-toggle="dropdown" >
                                                <?php
                                                    if(isset($_SESSION['lang']) && $_SESSION['lang']=="en_US"){
                                                        echo '<span id="idioma" class="lang-sm lang-lbl" lang="en"></span>';
                                                    }
                                                    else{
                                                        echo '<span id="idioma" class="lang-sm lang-lbl" lang="es"></span>';
                                                    }
                                                ?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu border-primary text-center" role="menu">
                                                <li class="pb-2 nav-item">
                                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?lang=en">
                                                        <span class="lang-sm lang-lbl" lang="en"></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item"">
                                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>?lang=es">
                                                        <span class="lang-sm lang-lbl" lang="es"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-3 p-md-0 p-3 text-center text-sm-right" >
                                <div class="dropdown float-none float-lg-right pr-0 pr-sm-5 pr-sm-4">
                                    <button class="btn btn-primary dropdown-toggle ml-2" type="button" data-toggle="dropdown">
                                        <?php echo _("Reservations");?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu border-primary">
                                        <li class="p-2">
                                            <a href="Reservas.php?<?php echo $lang ?>"><?php echo _("Request reservation");?></a>
                                        </li>
                                        <li class="p-2">
                                            <a href="modificar.php?<?php echo $lang ?>"><?php echo _("Modify reservation");?></a>
                                        </li>
                                        <li class="p-2">
                                            <a href="borrar.php?<?php echo $lang ?>"><?php echo _("Cancel reservation");?></a>
                                        </li>
                                        <li class="p-2">
                                            <a href="Disponibilidad.php?<?php echo $lang ?>"><?php echo _("See availability");?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav class="col-md-12 col-sm-6 col-6 order-sm-2 navbar navbar-expand-md navbar-light bg-faded justify-content-center pb-0">
                        <button class="navbar-toggler navbar-toggler-right " type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon" style="font-size: 1.5em;"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end" id="menu">
                            <ul class="nav navbar-nav flex-center col-8">
                                <li class=" nav-item col-md-3 col-sm-12 "><a class="nav-link" href="Principal.php?<?php echo $lang ?>"><?php echo _("Principal");?> </a></li>
                                <li class=" nav-item col-md-3 col-sm-12 "><a class="nav-link" href="Servicios.php?<?php echo $lang ?>"><?php echo _("Services");?> </a></li>
                                <li class=" nav-item col-md-3 col-sm-12 "><a class="nav-link" href="Contacto.php?<?php echo $lang ?>"><?php echo _("Contact");?> </a></li>
                                <li class=" nav-item col-md-3 col-sm-12 "><a class="nav-link" href="Conocenos.php?<?php echo $lang ?>"><?php echo _("Know us");?> </a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>




