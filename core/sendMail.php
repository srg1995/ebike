<?php

//Incluimos la función
require_once('../PHPMailer/class.phpmailer.php');

$mail = new PHPMailer();

$mail->From     = "avasir2hmr@gmail.com"; // Mail de origen
$mail->FromName = "Ricardo"; // Nombre del que envia
$mail->AddAddress("kokiyo13@hotmail.com"); // Mail destino, podemos agregar muchas direcciones
$mail->AddReplyTo("kokiyo13@hotmail.com"); // Mail de respuesta
$mail->WordWrap = 50; // Largo de las lineas
$mail->IsHTML(true); // Podemos incluir tags html
$mail->Subject  =  "Consulta formulario Web: ";
$mail->Body     =  "Nombre:  \n<br />".
"Email: kokiyo13@hotmail.com \n<br />".
"Tel: 666 \n<br />".
"Mensaje: 524178 \n<br />";
$mail->AltBody  =  strip_tags($mail->Body); // Este es el contenido alternativo sin html


//Adjuntar archivos
//$mail->AddAttachment("nombredearchivo.txt"); // Ingresamos la ruta del archivo
        
$mail->Host     = "localhost";

$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true;

$mail->Username = "avasir2hmr@gmail.com"; // SMTP username
$mail->Username = "avasir2hmr@gmail.com"; // SMTP username
$mail->Password = "kaliflay"; // SMTP password
        
$exito=$mail->Send();

if($exito)
{
    echo "OK";
}else
{
    echo "ERROR";
}

?>