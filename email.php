<?php
$para      = 'joelcrrll06@gmail.com';
$titulo    = 'CONFIRMACION DE INSCRIPCION - EQUIPO DELEGACION';
$mensaje   = '


<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <style>
    

    </style>
<body style = "background-color:LightGray;";>

    <br>
    <center>
    <table style="background-color:rgb(255, 255, 255); width:98%; ; height: 100%;">
            <td>
                   
                 <td> <center><img src="http://parroquiasannicolasdebari.com/logo.png" alt="Logo" class="img-responsive" height="100"> </center>
                 <br>
                 <center> <h2>Confirmación de inscripción</h2>  
                 <p>Hola <b>Joel</b>,hemos recibido tu solicitud para pertenecer al <b>equipo de delegación (Peregrino). </b></p>
                 <p>En las próximas horas nos pondremos en contacto contigo para realizarte una pequeña entrevista.</p>
                 <b></b><h5>Código de Confirmación</h5>
                 <hr>
                 <h1>J-CNSDL-01-01</h1>
                 <hr>
                 <p><b>*</b> Para verificar su estado de inscripción , podrá visitar el siguiente vínculo.</p>

            </center>
            </td>
    </table>
    </center>
    <center>
    
    <p>Correo envíado vía JMJ- Arraiján (Pasionistas) 2018 - 2019.</p>

</body>
</head>
</html>
';
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset="utf-8"' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'From: Parroquia San Nicolas De Bari - Support <parroquia-san-nicolas@parroquiasannicolasdebari.com>' . "\r\n";

mail($para, $titulo, $mensaje, $cabeceras);
?>