<?php
if(isset($_POST['enviar']))
{

    $hash = sha1(rand(0,1000));
    $password = rand(1000,5000);
    $nombre=$_POST['nombre'];
    $apellido1=$_POST['ape1'];
    $apellido2=$_POST['ape2'];
    $nif=$_POST['nif'];
    $email=$_POST['email'];
    $edad=$_POST['edad'];
    $telefono=$_POST['telefono'];
    $conocido=$_POST['conocer'];
    $dia=$_POST['dia'];
    $turno=$_POST['turno'];
    $idioma=$_POST['idioma'];
    require_once '../core/Conexion.php';
    $conexion= Conexion::conectar();
    //Comprobar que el NIF no existe
    $dnis="select NIF from participante where NIF='".$nif."'";
    $resulDni=$conexion->query($dnis);

    if($resulDni->rowCount()!=0)
    {
        //Sesion para guardar dni no valido
        header("location: ../vista/Reservas.php");//Sacar un mensaje de error avisando de que ya existe el dni
    }




    //Sacar el id del turno segun el dia elegido y el turno
    $sqlIdTurno="select id from turno where nombre='$turno'";
    $resulTurno=$conexion->query($sqlIdTurno);
    //echo $resulTurno->rowCount();

    $row=$resulTurno->fetch(PDO::FETCH_OBJ);
    $idTurno=$row->id;
    //echo $idTurno;

    //Sacar el id de la ruta segun el dia elegido y el turno
    $sqlId="select idRuta from ruta where fecha='".$dia."' AND idTurno=$idTurno";
    $resulID=$conexion->query($sqlId);
    //echo $resulID->rowCount();
    $row=$resulID->fetch(PDO::FETCH_OBJ);
    $idRuta=$row->idRuta;
    //echo $idRuta;

    //Realizamos la inserccion
    $sql="INSERT INTO participante (NIF, nombre, apellido1, apellido2, email, tel_movil, edad, comoConocido, idRuta, hash, password)"
            . "values('".$nif."','".$nombre."','".$apellido1."','".$apellido2."','".$email."',$telefono,$edad,'".$conocido."',$idRuta,'".$hash."','".sha1($password)."')";
    $conexion->exec($sql);





        //Mensaje informativo para que verifique el registro con ese correo
    $to = $email; // Send email to our user
    $paginaWeb="http://localhost/eBikeDef1/vista/confirmacion.php";
    $subject = 'Registro | Verificacion'; // Give the email a subject
    $link=$paginaWeb.'?email=' . $email . '&hash=' . $hash;
    $mensaje = "

Gracias por registrarse!
Tu cuenta ha sido creada, para confirmar la reserva debes pulsar sobre el siguiente enlace y despues introducir la contraseña que se menciona a continuacion.

------------------------
Contraseña: $password
------------------------

Por favor haga click sobre el enlace para confirmar la reserva:

".$link;
    // Our message above including the link
    $headers = 'From:f1aa093b56-5f7b5f@inbox.mailtrap.io' . "\r\n"; // Set from headers
    $enviado=mail($to, $subject, $mensaje, $headers); // Send our email
    header("location:../vista/confirmacionReserva.php?".$idioma."");


}

?>