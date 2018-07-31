<?php 

require_once "AcessConnectDB.php"; 

class AlmacenadataAlojamiento extends Modelo 
{     
     
    
	 
    public function __construct() 
    { 
	
	    
        parent::__construct(); 
		
		
    } 

    public function GuardaDataAlojamiento($Vcantialojamiento,$Vpreferencia,$VNombres,$VApellidos,
    $VCedula,$Vestadocivil,$Vnacionalidad,$Vprofesion,$Vlugardetrabajo,$Vdistrito,$Vcorregimiento,$Vbarrio,
    $Vcalle,$Vcasa,$Vtelefono_resi,$Vtelefono_ofi,$Vcelular,$Vcorreo, $Vnombres_conyugue,$Vapellidos_conyugue,
    $Vcedula_conyugue,$Vnacionalidadconyugue,$Vprofesionconyugue,$Vlugardetrabajoconyugue,$Vtelefono_oficonyugue,$Vcelularconyugue,
    $Vcorreoconyugue,$Vcorregimientocapilla,$Vexperfordisca,$Vrecibedisca,$Vauditiva,$Vvisual,$Vmotora,$Vintelectual,$nombredepais,$NombreResidentes,$EdadResidentes) 
    {
        

        $emailuser = $Vcorreo;
        $VNombres = ucwords($VNombres);
        $Nombreee = ucwords($VNombres);
        $VApellidos = ucwords($VApellidos);
        $Apellidoo = ucwords($VApellidos);
        $Vprofesion = ucwords($Vprofesion);
        $Vlugardetrabajo = ucwords($Vlugardetrabajo);
  
        $Vnombres_conyugue = ucwords($Vnombres_conyugue);
        $Vapellidos_conyugue = ucwords($Vapellidos_conyugue);
        $Vprofesionconyugue = ucwords($Vprofesionconyugue);
        $Vlugardetrabajoconyugue = ucwords($Vlugardetrabajoconyugue);

        $Vpreferencia="'".$Vpreferencia."'";
        $VNombres="'".$VNombres."'";
        $VApellidos="'".$VApellidos."'";
        $VCedula="'".$VCedula."'";
        $Vestadocivil="'".$Vestadocivil."'";
        $Vprofesion="'".$Vprofesion."'";
        $Vlugardetrabajo="'".$Vlugardetrabajo."'";
        $Vdistrito="'".$Vdistrito."'";
        $Vbarrio="'".$Vbarrio."'";
        $Vcalle="'".$Vcalle."'";
        $Vcasa="'".$Vcasa."'";
        $Vtelefono_resi="'".$Vtelefono_resi."'";
        $Vtelefono_ofi="'".$Vtelefono_ofi."'";
        $Vcelular="'".$Vcelular."'";
        $Vcorreo="'".$Vcorreo."'";
        $Vnombres_conyugue="'".$Vnombres_conyugue."'";
        $Vapellidos_conyugue="'".$Vapellidos_conyugue."'";
        $Vcedula_conyugue="'".$Vcedula_conyugue."'";
        $Vprofesionconyugue="'".$Vprofesionconyugue."'";
        $Vlugardetrabajoconyugue="'".$Vlugardetrabajoconyugue."'";
        $Vtelefono_oficonyugue="'".$Vtelefono_oficonyugue."'";
        $Vcelularconyugue="'".$Vcelularconyugue."'";
        $Vcorreoconyugue="'".$Vcorreoconyugue."'";        
        
        $resultado = mysql_query("CALL sp_insert_alojamiento($Vcantialojamiento,$Vpreferencia,$VNombres,$VApellidos,
        $VCedula,$Vestadocivil,$Vnacionalidad,$Vprofesion,$Vlugardetrabajo,$Vdistrito,$Vcorregimiento,$Vbarrio,
        $Vcalle,$Vcasa,$Vtelefono_resi,$Vtelefono_ofi,$Vcelular,$Vcorreo, $Vnombres_conyugue,$Vapellidos_conyugue,
        $Vcedula_conyugue,$Vnacionalidadconyugue,$Vprofesionconyugue,$Vlugardetrabajoconyugue,$Vtelefono_oficonyugue,$Vcelularconyugue,
        $Vcorreoconyugue,$Vcorregimientocapilla,$Vexperfordisca,$Vrecibedisca,$Vauditiva,$Vvisual,$Vmotora,$Vintelectual
        )");
        
    
       if ($resultado <> 1)
       {
          header('Location: errorsistema.php?'.mysql_error());
       }
       else 
       {
        
        $buscacodigo = mysql_query("select max(codigo_alojamiento) as PCodigo from alojamiento"); 
        $codigoregistro = mysql_fetch_row($buscacodigo);
        $CodigoInsertado = $codigoregistro[0];

        // INSERTANDO PAISES POR REGISTRO FAMILIAR 
        foreach ($nombredepais as $key => $value) {
            
            $value = "'".$value."'";
            $resultadoinsert = mysql_query("insert into idioma_alojamiento(Codigo_Alojamiento,Codigo_Idioma) values($CodigoInsertado,$value)"); 

        }

        //INSERTANDO NOMBRE DE RESIDENTES EN CASA 
        

        $longitud  = count($EdadResidentes);

        for($i=0; $i<$longitud; $i++)
        {
            $nombreresidentee = "'".ucwords($NombreResidentes[$i])."'";
            $edadresidenteen = $EdadResidentes[$i];
            $resultadoinsertresidentes = mysql_query("insert into residentes_vivienda(Codigo_Alojamiento,Nombre,edad) values($CodigoInsertado,$nombreresidentee,$edadresidenteen)"); 
            
        }


        $buscacodigoderegistro = mysql_query("select Codigo_Alterno  from alojamiento  where Codigo_Alojamiento =  $CodigoInsertado");
        $regiscodigo = mysql_fetch_row($buscacodigoderegistro);
        $codigodebusqueda = $regiscodigo[0];



    //////////////////////////////////// ENVIA E-MAIL A USUARIO DE WEB 
    $para      = $emailuser;
    $titulo    = 'CONFIRMACION DE INSCRIPCION - ALOJAMIENTO';
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
                     <p>Hola <b>'. $Nombreee .' '.$Apellidoo.'</b>,hemos recibido tu solicitud para ser <b> Familias de Acogida</b>.</p>
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

    /// BUSCANDO PERSONAS A QUIENES ENVIAR MAIL
    $query = "select CorreoElectronico
    from  comision com
    inner join coordinador coor on (com.Codigo_Comision = coor.Codigo_Comision)
    inner join usuarioslogin usuolog on (coor.Codigo_Usuario = usuolog.Codigousuario)
    where com.Nombre = 'Alojamiento'
    union all
    select CorreoElectronico
    from comision com
    inner join encargado encarg on (com.Codigo_Comision = encarg.Codigo_Comision)
    inner join usuarioslogin usuolog on (encarg.Codigo_Usuario = usuolog.CodigoUsuario)
    where com.Nombre = 'Alojamiento'
    and encarg.Codigo_Capilla = ".$Vcorregimientocapilla."";

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

    // BUSCANDO NOMBRE COMPLETO DE CAPILLA

    $resultacapi = mysql_query("select Nombre from capilla where Codigo_Capilla = ".$Vcorregimientocapilla);
    $getnamecapilla = mysql_fetch_row($resultacapi);
    $Nombrecapillacompleto = $getnamecapilla[0];


    
    //////////////////////////////////// ENVIA E-MAIL A USUARIO DE WEB 
    $para      = $Correosaenviar;
    $titulo    = 'NUEVA INSCRIPCION - EQUIPO ALOJAMIENTO';
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
                     <p>Este correo se ha enviado a usted por que es coordinador o encargado del <b>equipo de alojamiento (Familia de Acojida).</b><br> en su Parroquia o capilla.</p>
                     <hr>
                     <h2>Datos del solicitante</h2>
                     <hr>
                     <b>Codigo De Confirmación:</b> '.$codigodebusqueda.'
                     <br>
                     <b>       Nombre Completo: </b> '. $Nombreee .' '.$Apellidoo.'
                     <br>
                     <b>                Capilla: </b>'.$Nombrecapillacompleto.'
                     <br>
                     <b>			      Celular: </b>'. $Vcelular .'
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

   header('Location: confirmacionalojamiento.html');


       }



    }
}

    $usuarioModel = new AlmacenadataAlojamiento();

    $experienciadiscapacitado =  isset($_POST['experfordisca']) ? 1 : 0;
    $recibediscapacitado =  isset($_POST['recibedisca']) ? 1 : 0;
    $discaautitiva = isset($_POST['auditiva']) ? 1 : 0;
    $discavisual =  isset($_POST['visual']) ? 1 : 0;
    $discamotora =  isset($_POST['motora']) ? 1 : 0;
    $discintelectual = isset($_POST['intelectual']) ? 1 : 0;
    $distritop = "Arraiján";
    


    $CantidadUsuarios = $usuarioModel->GuardaDataAlojamiento($_POST['cantialojamiento'],$_POST['preferencia'],
    $_POST['Nombres'],$_POST['Apellidos'],$_POST['cedula'],$_POST['estadocivil'],$_POST['nacionalidad'],$_POST['profesion'],
    $_POST['lugardetrabajo'],$distritop,$_POST['corregimiento'],$_POST['barrio'],$_POST['calle'],$_POST['casa'],
    $_POST['telefono_resi'],$_POST['telefono_ofi'],$_POST['celular'], $_POST['correo'], $_POST['nombres_conyugue'],
    $_POST['apellidos_conyugue'],$_POST['cedula_conyugue'],$_POST['nacionalidadconyugue'],$_POST['profesionconyugue'],
    $_POST['lugardetrabajoconyugue'],$_POST['telefono_oficonyugue'],$_POST['celularconyugue'],$_POST['correoconyugue'],
    $_POST['codcapilla'],$experienciadiscapacitado, $recibediscapacitado,
    $discaautitiva,$discavisual, $discamotora,$discintelectual,$_POST['nombrepais'],$_POST['nombrecompletoresidentes'],$_POST['edadresidentes']); 
    
?>