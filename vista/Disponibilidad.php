<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Disponibilidad | Ebike </title>
    <link href='../calendario/fullcalendar.min.css' rel='stylesheet' />
    <link href='../calendario/fullcalendar.print.min.css' rel='stylesheet' media='print' />

    <link rel="stylesheet" type="text/css" href="../css/calendar-style.css">
    <?php
        include '../partials/head.php';
    ?>
    <script src='../calendario/lib/moment.min.js'></script>
    <script src='../calendario/lib/jquery.min.js'></script>
    <script src='../calendario/fullcalendar.min.js'></script>
    <script src='../calendario/lang/es.js'></script>
    <script src="../js/cargarCalendario.js"></script>
</head>
<body >
    <?php
        include '../partials/header.php';
        ?>

        <div class="container mt-4 mb-4">

            <h1 class="text-center"><?php echo _("RESERVATIONS CALENDAR");?></h1>
              <div id='calendar' ></div>
        </div>

    <?php
        include '../partials/footer.php';
    ?>

</body>
</html>