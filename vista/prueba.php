<?php
require '../PHPMailer_5.2.4/class.phpmailer.php';

// Crear una nueva  instancia de PHPMailer habilitando el tratamiento de excepciones
$mail = new PHPMailer();
// Configuramos el protocolo SMTP con autenticación
$mail->IsSMTP();
$mail->SMTPAuth = true;

// Configuramos el protocolo SMTP con autenticación
$mail->Port = 25;
$mail->Host = 'smtp.mailtrap.io';
$mail->Username   = "d8fbea8fc865e9";
$mail->Password = "857cb35c4bef54";

// Configuración cabeceras del mensaje
$mail->From = "sergiosacristan8@gmail.com";
$mail->FromName = "Mi nombre y apellidos";
$mail->AddAddress("srg_ek@hotmail.com","Sergio");
//$mail->AddAddress("destino2@correo.com","Nombre 2");
$mail->AddCC("sergiosacristan8@gmail.com","Sergio");
//$mail->AddBCC("copia1@correo.com","Nombre copia 1");
$mail->Subject = "Asunto del correo";

// Creamos en una variable el cuerpo, contenido HMTL, del correo
$body  = "Proebando los correos con un tutorial<br>";
$body .= "hecho por <strong>Developando</strong>.<br>";
$body .= "<font color='red'>Visitanos pronto</font>";
$mail->Body = $body;


echo $body;

// Ficheros adjuntos
//$mail->AddAttachment("misImagenes/foto1.jpg", "developandoFoto.jpg");
//$mail->AddAttachment("files/proyecto.zip", "demo-proyecto.zip");

// eviar mail
$mail->Send();

var_dump($mail);

?>