<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
    <title>Principal | Ebike </title>
    <?php
        include '../partials/head.php';
     ?>
</head>
<body>
    <?php
        include '../partials/header.php';
        include '../partials/banner.php';
        ?>

        <div class="container mt-4 mb-4">
            <div class="row">
                <section class="col-12">
                    <div class="row">
                        <article class="col-lg-4 col-12 text-center" >
                            <h3 class="text-center"><?php echo _("The route");?></h3>
                            <img alt="foto" src="../img/laRuta.JPG" class="img-thumbnail">
                            <p class="text-justify">
                                <?php echo _("During the tourist route you can observe historical monuments that allow you to expand your knowledge about the city of Ávila, as well as doing outdoor sports.");?>
                            </p>
                            <p class="text-justify">
                                 <a href="servicios.php?<?php echo $lang ?>"><?php echo _("see map");?></a>
                            </p>
                        </article>
                        <article class="col-lg-4 col-12 text-center" >
                            <h3 class="text-center"><?php echo _("The proyect");?></h3>
                            <img alt="foto" src="../img/ElProyecto.JPG" class="img-thumbnail">
                            <p class="text-justify">
                                 <?php echo _("It consists of electric bike routes in groups of 6-8 people, guided by specialists, teachers and students of the Integrated Center, with explanations about the history of the city by tourism students of the IES Jorge Santayana.");?>

                            </p>
                        </article>
                        <article class="col-lg-4 col-12 text-center" >
                            <h3 class="text-center"><?php echo _("Starting point");?></h3>
                            <img alt="foto" src="../img/PuntoPartida.JPG" class="img-thumbnail">
                            <p class="text-justify">
                                <?php echo _("The departure point will be the Visitor Center of Avila. From this place we will start a route through the historical monuments of the city, enjoying an outdoor experience with a clean and fresh environment.");?>
                            </p>
                        </article>
                    </div>
                </section>

                <section class="col-12 mt-4">
                    <div class="row">
                        <article class="col-lg-6 col-md-6 text-center" >
                            <h3 class="text-center"><?php echo _("The objective");?></h3>
                            <img alt="foto" src="../img/ElObjetivo.png" class="img-thumbnail">
                            <p class="text-justify">
                               <?php echo _("The objective of this educational project is to promote entrepreneurship among vocational students.");?>
                            </p>
                            <p class="text-justify">
                                <?php echo _("We also want to raise awareness of the importance of using the bicycle as a means of clean transport, mentalizing the population of the many benefits of physical exercise.");?>
                            </p>
                        </article>
                        <article class="col-lg-6 col-md-6 text-center" >
                            <h3 class="text-center"><?php echo _("Additional Information");?></h3>
                            <img alt="foto" src="../img/informacion.png" class="img-thumbnail">
                            <p class="text-justify">
                                <?php echo _("Free routes for customers. They include: Accident insurance, helmet and reflective vest.");?>
                            </p>
                            <p class="text-justify">
                                <?php echo _("Urban route through monumental Ávila, 1 hour 20 minutes duration approx.");?>
                            </p>
                            <p class="text-justify">
                                <?php echo _("The point of departure and arrival is the Visitor Center of Avila.");?>
                            </p>
                        </article>
                    </div>
                </section>
            </div>
        </div>
        <?php
        include '../partials/footer.php';
    ?>

</body>
</html>