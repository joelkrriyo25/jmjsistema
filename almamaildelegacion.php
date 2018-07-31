<?php 

require_once "AcessConnectDB.php"; 

class almacenadata extends Modelo 
{     
     
    
	 
    public function __construct() 
    { 
	
	    
        parent::__construct(); 
		
		
    } 

    public function GuardaData($Nombre,$SegundoNombre,$ApellidoPaterno,$ApellidoMaterno,$Cedula,$sexo,
                                $FechaNacimiento,$alergia,$tiposangre,$enfermedades,
                                $bautizo,$comunion,$confirmacion,$matrimonio, $Telefono,
                                $celular,$correo,$direccion,$capilla,$pastoral,$casollamar,
                                $telefonoemergencia, $PorquePeregrino,$Acudiente,
                                $parentesco,$Telefono_acudiente,$celular_acudiente) 
    { 
    
    $emailuser = $correo;
    $nombreee = ucfirst($Nombre);
    $segundonombre = ucfirst($SegundoNombre);
    $apellidoo = ucfirst($ApellidoPaterno);
    $apellidomaterno = ucfirst($ApellidoMaterno);
    $cel = $celular;


    $Nombre =  "'".$Nombre."'";
    $SegundoNombre =  "'".$SegundoNombre."'";
    $ApellidoPaterno =  "'".$ApellidoPaterno."'";
    $ApellidoMaterno =  "'".$ApellidoMaterno."'";
    $Cedula =  "'".$Cedula."'";
    $sexo =  "'".$sexo."'";
    $FechaNacimiento =  "'".$FechaNacimiento."'";
    $alergia =  "'".$alergia."'";
    $tiposangre =  "'".$tiposangre."'";
    $enfermedades =  "'".$enfermedades."'";
    $Telefono =  "'".$Telefono."'";
    $celular =  "'".$celular."'";
    $correo =  "'".$correo."'";
    $direccion =  "'".$direccion."'";
    $casollamar =  "'".$casollamar."'";
    $telefonoemergencia =  "'".$telefonoemergencia."'";
    $PorquePeregrino =  "'".$PorquePeregrino."'";
    $Acudiente =  "'".$Acudiente."'";
    $Telefono_acudiente =  "'".$Telefono_acudiente."'";
    $celular_acudiente  =  "'".$celular_acudiente ."'";

    try {

    $resultado = mysql_query("CALL sp_insert_delegacion($Nombre,
    $SegundoNombre,
    $ApellidoPaterno,
    $ApellidoMaterno,
    $Cedula,
    $sexo,
    $FechaNacimiento,
    $alergia,
    $tiposangre,
    $enfermedades,
    $bautizo,
    $comunion,
    $confirmacion,
    $matrimonio,
    $Telefono,
    $celular,
    $correo,
    $direccion,
    $capilla,
    $pastoral,
    $casollamar,
    $telefonoemergencia, 
    $PorquePeregrino,
    $Acudiente,
    $parentesco,
    $Telefono_acudiente,
    $celular_acudiente)");
    

   if ($resultado <> 1)
   {
      header('Location: errorsistema.php?'.mysql_error());
   }
   else 
   {

    $buscacodigo = mysql_query("select max(codigo_delegacion) as codigo from delegacion"); 
    //$cantre = mysql_num_rows($buscacodigo);
    $codigoregistro = mysql_fetch_row($buscacodigo);
    $CodigoInsertado = $codigoregistro[0];
    
    $buscacodigoderegistro = mysql_query("select Codigo_Alterno  from delegacion  where codigo_delegacion =  $CodigoInsertado");
    $regiscodigo = mysql_fetch_row($buscacodigoderegistro);
    $codigodebusqueda = $regiscodigo[0];
   

    $query = "select CorreoElectronico
    from  comision com
    inner join coordinador coor on (com.Codigo_Comision = coor.Codigo_Comision)
    inner join usuarioslogin usuolog on (coor.Codigo_Usuario = usuolog.Codigousuario)
    where com.Nombre = 'Transporte'
    union all
    select CorreoElectronico
    from comision com
    inner join encargado encarg on (com.Codigo_Comision = encarg.Codigo_Comision)
    inner join usuarioslogin usuolog on (encarg.Codigo_Usuario = usuolog.CodigoUsuario)
    where com.Nombre = 'Transporte'
    and encarg.Codigo_Capilla = ".$capilla ."";

    $Correosaenviar = '';
    $resulta = mysql_query($query);
    $cantidadderegistros = mysql_num_rows($resulta);
    $conta = 0;

    if ($cantidadderegistros > 0)
    {
           while($data = mysql_fetch_assoc($resulta)) {

             if($conta == 0)
             {
                $Correosaenviar = $data["CorreoElectronico"];
             }
             else
             {
                $Correosaenviar = $Correosaenviar.','.$data["CorreoElectronico"];
             }
             $conta=$conta+1;
            }
    }

    


    //////////////////////////////////// ENVIA E-MAIL A USUARIO DE WEB 
    $para      = $emailuser;
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
                     <p>Hola <b>'.$nombreee.' '.$apellidoo.'</b>,hemos recibido tu solicitud para pertenecer al <b>equipo de delegación (Peregrino). </b></p>
                     <p>En las próximas horas nos pondremos en contacto contigo para realizarte una pequeña entrevista.</p>
                     <b></b><h2>Código de Confirmación</h2>
                     <hr>
                     <h1> '.$codigodebusqueda.' </h1>
                     <hr>
                     <p><b>*</b> Para verificar su estado de inscripción , podrá visitar el siguiente vínculo.</p>
    
                </center>
                </td>
        </table>
        </center>
        <center>
        
        <p>Correo envíado vía Parroquia San Nicolás de Bari (Pasionistas) 2018 - 2019.</p>
    
    </body>
    </head>
    </html>';
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset="utf-8"' . "\r\n";
    
    // Cabeceras adicionales
    $cabeceras .= 'From: Parroquia San Nicolas De Bari <parroquia-san-nicolas@parroquiasannicolasdebari.com>' . "\r\n";
    
    mail($para, $titulo, $mensaje, $cabeceras);

   ////////////////////////////////////////////////////////////////////////////////////////////////////
    // Busca Nombre De Capilla
    
    $resultacapi = mysql_query("select Nombre from capilla where Codigo_Capilla = ".$capilla);
    $getnamecapilla = mysql_fetch_row($resultacapi);
    $Nombrecapillacompleto = $getnamecapilla[0];

    //////////////////////////////////// ENVIA E-MAIL A USUARIO DE WEB 
    $para      = $Correosaenviar;
    $titulo    = 'NUEVA INSCRIPCION - EQUIPO DELEGACION';
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
                     <center> <h2>Nueva inscripción</h2> 
                     <p>Este correo se ha enviado a usted por que es coordinador o encargado del <b>equipo de delegación (Peregrino).</b><br> en su Parroquia o capilla.</p>
                     <hr>
                     <h2>Datos del solicitante</h2>
                     <hr>
                     <b>Codigo De Confirmación:</b> '.$codigodebusqueda.'
                     <br>
                     <b>       Nombre Completo: </b> '.$nombreee.' '. $segundonombre.' '.$apellidoo.' '.$apellidomaterno .'
                     <br>
                     <b>                Capilla: </b>'.$Nombrecapillacompleto.'
                     <br>
                     <b>			      Celular: </b> '. $cel.'
                     <br>
                         <b> Correo Electrónico: </b> '. $emailuser .'
                     <br>
                             
                     <hr>
                     <p>Para más detalles debe de ingresar al sistema y realizar la aprobación si corresponde.</p>
    
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
    $cabeceras .= 'From: Parroquia San Nicolas De Bari <parroquia-san-nicolas@parroquiasannicolasdebari.com>' . "\r\n";
    
    mail($para, $titulo, $mensaje, $cabeceras);

   ////////////////////////////////////////////////////////////////////////////////////////////////////

   header('Location: confirmaciondelegacion.html');

   }
    } catch(Exception $e) {

        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
        //$cantiregistros = mysql_num_rows($result);
        //return  $cantiregistros; 
    }

} 


 $usuarioModel = new almacenadata();

 $bautizo =  isset($_POST['bauti']) ? 1 : 0;
 $comunion =  isset($_POST['comunion']) ? 1 : 0;
 $confirma = isset($_POST['confirma']) ? 1 : 0;
 $matrimo =  isset($_POST['matrimo']) ? 1 : 0;

 $CantidadUsuarios = $usuarioModel->GuardaData( $_POST['Nombre'],$_POST['SegundoNombre'],
                            $_POST['ApellidoPaterno'], $_POST['ApellidoMaterno'],
                            $_POST['idcard'],$_POST['sexo'],$_POST['FechaNacimiento'],$_POST['alergia'],$_POST['tiposangre'],
                            $_POST['enfermedades'], $bautizo,$comunion, $confirma,
                            $matrimo, $_POST['Telefono'],$_POST['celular'],$_POST['correo'],
                            $_POST['direccion'],$_POST['capilla'],$_POST['pastoral'],$_POST['casollamar'],
                            $_POST['telefonoemergencia'], $_POST['PorquePeregrino'],$_POST['Acudiente'],
                            $_POST['parentesco'],$_POST['Telefono_acudiente'], 
                            $_POST['celular_acudiente'], $_POST['celular_acudiente']           
                        ); 

/* if ($CantidadUsuarios > 0)
{
    header('Location: dashboard.php?'.$usuario.' accepted');
}
else 
{
	header('Location: index.php?errorlogin');
}
*/
?>