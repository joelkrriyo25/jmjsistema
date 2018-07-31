<!DOCTYPE html>
<html lang="es">

<head>
<link rel="shortcut icon" href="Img/logo.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery.min.js"></script> 
<script src="popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="angular.min.js"></script> 
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/sb-admin.css" rel="stylesheet">
<script src="angular.min.js"></script> 

  <title> Inscripción - Equipo De Delegación - JMJ 2019 || Parroquia San Nicolás De Bari</title>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <!-- Brand -->
  <img src="Img/logo.png" alt="Logo" style="width:40px;">
  <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="#">
            <i class="fa fa-fw fa-sign-out"></i>Regresar</a>
        </li>
  </ul>
</nav>
<div class="container-fluid" style="background-color:#2c3742;background-image:url(Img/Peregrinos.jpg);padding:100px 0;background-size:cover;background-repeat:no-repeat;background-position:50%;color:white">
  <center><h3> Inscripción - Equipo Delegación </h3></Center>
</div>



<br>
<div class="container">
<form method="post" action = "almamaildelegacion.php" onsubmit="return  validacampos()" >
<div class="col-sm-12">
<hr>
<ul>
    <li>Los campos con un asterisco <strong><span style="color: #ff0000;">(*)</span></strong> son campos obligatorios.</li>
    <li>Al finalizar su inscripción, se le enviar un correo electrónico confirmando su solicitud. </li>
    <li>En menos de 48 horas el coordinador general o de capilla se contactará  con usted para validar los datos y darle la aprobación para pertenecer al equipo.</h2></center>
<hr>
 <div class="form-group">
  
 <center><h2 style ="background-color:#003087;color:#FFFFFF;">Datos personales</h2></center>
 <hr>
      <div class="row">
          <div class = "col-sm-3">

          <label >Nombre<span style="color: #ff0000;">(*)</span>:</label>
          <input type="text" class="form-control" id="Nombre" name="Nombre">

           </div>
           <div class = "col-sm-3">

              <label>Segundo Nombre:</label>
              <input type="text" class="form-control" id="SegundoNombre" name="SegundoNombre">

           </div>
           <div class = "col-sm-3">

              <label >Apellido Paterno<span style="color: #ff0000;">(*)</span>:</label>
              <input type="text" class="form-control" id="ApellidoPaterno" name ="ApellidoPaterno" >

           </div>
           <div class = "col-sm-3">

              <label >Apellido Materno:</label>
              <input type="text" class="form-control" id="ApellidoMaterno" name = "ApellidoMaterno">

           </div>           
      </div>
      <div class = "row">

      <div class = "col-sm-3">
             <label>Cedula <span style="color: #ff0000;">(*)</span>:</label>
             <input name = "idcard"  id="Cedula" class="form-control" type="text"  maxlength="20" placeholder = "Ejemplo: 8-444-0120" >
        </div>

      <div class = "col-sm-3">
				<label>Sexo<span style="color: #ff0000;">(*)</span>:</label>
				 <select class="form-control" name = "sexo" >
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
			  </select>
          
      </div>
      
        <div class = "col-sm-3">
             <label>Fecha De Nacimiento<span style="color: #ff0000;">(*)</span>: </label>
             <input name = "FechaNacimiento"  id="FechaNacimiento" class="form-control" type="date" onchange="calculaedad();" >
        </div>

        <div class = "col-sm-3">
             <label>Edad: </label>
             <input name = "Edad" id="Edad" type="text" class="form-control" disabled>
        </div>        
       </div>
       <div class = "row">
       <div class =  "col-sm-9">
       <label>Alergias:</label>
       <input name = "alergia" id = "alergia" type = "text" class = "form-control">
       </div>
       <div class = "col-sm-3">
       <label>Tipo de sangre<span style="color: #ff0000;">(*)</span>:</label>
       <input Style = " text-transform: uppercase;" name = "tiposangre" id = "tiposangre" type = "text" class = "form-control" maxlength = 3 placeholder = "Ejemplo: O+">      
       </div>
       </div>
       <div class = "row">
       <div class =  "col-sm-9">
       <label>Padecimiento o enfermedades:</label>
       <input name = "enfermedades" id = "enfermedades" type = "text" class = "form-control">
       </div>
       </div>
       <div class = "row">
       <div class = "col-sm-12">
             <label>Sacaramentos: </label>
             <br>
             <label class="checkbox-inline"><input type="checkbox"   name =  "bauti" id  = "bautizo"> Bautizo </label>&nbsp;&nbsp;&nbsp;&nbsp;
             <label class="checkbox-inline"><input type="checkbox"   name = "comunion" id  = "comunion"> Comunión </label>&nbsp;&nbsp;&nbsp;&nbsp;
             <label class="checkbox-inline"><input type="checkbox"   name = "confirma" id  = "confirmacion"> Confirmación </label>&nbsp;&nbsp;&nbsp;&nbsp;
             <label class="checkbox-inline"><input type="checkbox"   name = "matrimo" id  = "matrimonio"> Matrimonio </label>&nbsp;&nbsp;&nbsp;&nbsp;
              <br>
        </div>        
       </div>
       
       <br>
       <center><h2 style ="background-color:#003087;color:#FFFFFF;">Información Contacto</h2></center>
       <hr>
       <div class = "row">
         <div class = "col-sm-3">
                <label>Teléfono: </label>
                <input name ="Telefono" id="Telefono" type="text" class="form-control" maxlength="8" placeholder = "Ejemplo: 251-0399">              
        </div>

        <div class = "col-sm-3">
                <label>Celular<span style="color: #ff0000;">(*)</span>: </label>
                <input name = "celular"  id="celular" type="text" class="form-control" maxlength="9" placeholder= "Ejemplo: 6800-9652">              
        </div>

        <div class = "col-sm-6">
                <label>Correo Electrónico<span style="color: #ff0000;">(*)</span>: </label>
                <input name = "correo"  id="correo" type="emails" class="form-control" placeholder = "Ejemplo: pedro.pasionista@gmail.com">              
        </div>           
       </div>
       <div class = "row">
        <div class = "col-sm-12">
             <label>Dirección<span style="color: #ff0000;">(*)</span>: </label>
             <textarea class="form-control" rows="2" placeholder="Ejemplo: Barriada San Gabriel, entrando por ..." minlength="10" name="direccion" cols="50" id="direccion"></textarea>
        </div>
       </div>
       <br>
       <center><h2 style ="background-color:#003087;color:#FFFFFF;">Información Parroquial</h2></center>
        <hr>
       <div class = "row">
       <div class = "col-sm-3">
             <label>Corregimiento<span style="color: #ff0000;">(*)</span>: </label>
             <select name = "corregimiento" id = "corregimiento" class="form-control" data-search="true"  >
             	<option value = "0" >	-- SELECCIONAR --</option>			  
             <?php 	

						 require_once "AcessConnectDB.php"; 

                         class ObtieneCorregimientos extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function NombresCorregimiento() 
                               {  
                                  $resultado= mysql_query("SELECT Codigo_Corregimiento,Nombre from corregimiento  order by Nombre asc");
                                    return  $resultado;
                                }

                              } 

							                 $obtienenombres = new ObtieneCorregimientos();
                               $data = $obtienenombres -> NombresCorregimiento();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Codigo_Corregimiento']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>
             </select>
        </div>
        <div class = "col-sm-6">
             <label>Capilla<span style="color: #ff0000;">(*)</span>: </label>
             <select name ="capilla"  id = "capilla" class="form-control" data-search="true" >
              </select>                  
        </div>

        <div class = "col-sm-3">
             <label>Pastoral: </label>
             <select  name = "pastoral" id = "pastoral" class="form-control" data-search="true"   >
             	<option value = "0" >	-- SELECCIONAR --</option>			  
             <?php 	

						 require_once "AcessConnectDB.php"; 

                         class ObtienePastoral extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function NombresPastoral() 
                               {  
                                  $resultado= mysql_query("SELECT Codigo_Pastoral,Nombre from pastoral  order by Nombre asc");
                                    return  $resultado;
                                }

                              } 

							                 $obtienenombres = new ObtienePastoral();
                               $data = $obtienenombres -> NombresPastoral();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Codigo_Pastoral']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>
             </select>
        </div>
        </div>
        <div class = "row">
        <div class = "col-sm-8">
        <label> En caso de Emergencia llamar a<span style="color: #ff0000;">(*)</span>:</label>
        <input name ="casollamar"  id="casollamar" type="text" class="form-control">  
        </div>
        <div class = "col-sm-4">
        <label>Al Teléfono:<span style="color: #ff0000;">(*)</span>: </label>
        <input name ="telefonoemergencia"  id="telefonoemergencia" type="text" class="form-control" maxlength="9">   
        </div>
        </div>
        </div>
        <div class = "row">
        <div class = "col-sm-12">
             <label>¿ Por qué deseas ser peregrino? <span style="color: #ff0000;">(*)</span></label>
             <textarea class="form-control" rows="2" placeholder="Ejemplo: Deseo ser peregrino por ..." minlength="10"  cols="50" name = "PorquePeregrino" id="PorquePeregrino"></textarea>
        </div>

       </div>     
       <br>
        <center><h2 style ="background-color:#003087;color:#FFFFFF;">Información Acudiente</h2></center>
       <center> <p><b>Nota:</b> Completar solo si usted es menor de edad.</p></center>
        <hr>                              
        <div class= "row">
        
            <div class = "col-sm-3">
                   <label >Acudiente:</label>
                  <input type="text" class="form-control" id="Acudiente" name = "Acudiente">   
            </div>
         

            <div class = "col-sm-3">
             <label>Parentesco: </label>
             <select name = "parentesco" id = "parentesco" class="form-control" data-search="true"   >
             	<option value = "0" >	-- SELECCIONAR --</option>			  
             <?php 	

						 require_once "AcessConnectDB.php"; 

                         class ObtieneParentesco extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function NombresParentesco() 
                               {  
                                  $resultado= mysql_query("SELECT Codigo_Parentesco,Nombre FROM parentesco order by Nombre asc");
                                    return  $resultado;
                                }

                              } 

							                 $obtienenombres = new ObtieneParentesco();
                               $data = $obtienenombres -> NombresParentesco();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Codigo_Parentesco']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>
             </select>
        </div>
        
        <div class = "col-sm-3">
                <label>Teléfono: </label>
                <input name = "Telefono_acudiente" id="Telefono_acudiente" type="text" class="form-control" maxlength="8">              
        </div>

        <div class = "col-sm-3">
                <label>Celular: </label>
                <input name = "celular_acudiente"  id="celular_acudiente" type="text" class="form-control" maxlength="9">              
        </div>
</div>
<br>
<hr>
<div class = "row">

<div class = "col-sm-4">              
</div>
<div class = "col-sm-4">
<button type="submit" style = "background-color:#003087;color:#FFFFFF;" class="btn btn-primary btn-block">Enviar Solicitud</button>           
</div>
<div class = "col-sm-4">              
</div>
</div>
</form>
</div>
<!--  ************************************* INICIA MODEL  ********************************-->


   <!-- Trigger the modal with a button -->
   <button id="mensajevalidacampos" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="visibility:hidden;" >
   Open modal
   </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header" style = "background-color: #dc3545;">
        <h4 class="modal-title" style = " color: #EEE8E8;">-Alerta</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
             Verificar que todos los campos con un asterisco <span style="color: #ff0000;">(*)</span> esten completos correctamente.
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
      </div>
      
    </div>
  </div>
</div>

<!--  ************************************* FIN  MODEL  ********************************-->
<script type="text/javascript"> 
function validacampos()
{       

        var nombre = document.getElementById("Nombre").value;
        var apellido = document.getElementById("ApellidoPaterno").value;
        var cedula = document.getElementById("Cedula").value;
        var edad = document.getElementById("Edad").value;
        var tipodesangre =  document.getElementById("tiposangre").value;
        var celular = document.getElementById("celular").value;
        var correo = document.getElementById("correo").value;
        var direccion = document.getElementById("direccion").value;
        var capilla =  document.getElementById("capilla").value;
        var casollamar = document.getElementById("casollamar").value;
        var telefonoemergencia = document.getElementById("telefonoemergencia").value;
        var PorquePeregrino = document.getElementById("PorquePeregrino").value;
        
       if (nombre.length > 0 && apellido.length > 0 && cedula.length > 5 && edad.length > 1 && tipodesangre.length > 1 && celular.length > 7 && validarEmail(correo) != false && capilla > 0 && casollamar.length > 3 && telefonoemergencia.length > 6 && PorquePeregrino.length > 10)
       {
        return true;
       }
       else
       {
        $('#mensajevalidacampos').click();
        return false;
       }
}


function validarEmail(valor) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(valor) ? true : false;
}


function calculaedad()
{

      fechaactual = new Date();
      var fechanacimientopersona = document.getElementById('FechaNacimiento').value;
      var mes = fechanacimientopersona.substring(5,7);
      mes = parseInt(mes);
      var dia = fechanacimientopersona.substring(8,10);
      dia = parseInt(dia);
      var yearnacimiento = fechanacimientopersona.substring(0,4);
      yearnacimiento = parseInt(yearnacimiento);
      var yearactual  = fechaactual.getFullYear();
      var mesactual = fechaactual.getMonth();
      mesactual = mesactual+1;
      var diaactual = fechaactual.getDate();
      var edada = 0;
      if (mesactual > mes)
      {
         edada = (yearactual-yearnacimiento);
         document.getElementById("Edad").value  = edada;
      }
      if (mesactual == mes)
      {
            if (diaactual >=  dia)
            {
              edada = (yearactual-yearnacimiento);
             document.getElementById("Edad").value  = edada;
            } 
            else
            {
              edada = (yearactual-yearnacimiento)-1;
              document.getElementById("Edad").value  = edada;
            }
      }
      if (mesactual < mes)
      {
        edada = (yearactual-yearnacimiento)-1;
        document.getElementById("Edad").value  = edada;
      } 

}

$(document).ready(function(){
    $("#corregimiento").change(function(){
    	 var corregmientoId = $(this).val();
       $.ajax({
                type:'POST',
                url:'muestra.php',
                data:'corregimiento_id='+corregmientoId,
                success:function(html){
                    $('#capilla').html(html);
                }
            });
    });
});

</script>
</body>
</head>
</html>