<?php
    if(!(isset($_SESSION["lang"]) && !isset($_REQUEST["lang"])))
    {
        if(isset($_REQUEST["lang"]) && $_REQUEST["lang"]!="es")
        {
            $_SESSION["lang"]="en_US";
            $language = $_SESSION["lang"];
            putenv("LC_ALL=$language");
            setlocale(LC_ALL, $language);
            bindtextdomain("en", "../locale");
            textdomain("en");
        }else
        {
            $_SESSION["lang"]="es_ES";
            $language = $_SESSION["lang"];
            putenv("LC_ALL=$language");
            setlocale(LC_ALL, $language);
            bindtextdomain("es", "../locale");
            textdomain("es");
        }
    }
?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/languages.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <!--<link rel="stylesheet" type="text/css" href="css/estilo.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/e084de579c.js"></script>
