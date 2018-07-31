<!-- 

SITIO DESARROLLADO POR JOEL CARRILLO 

-->
<!DOCTYPE html>
<html lang="es" ng-app="myapp">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="Img/logo.png">

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="jquery.min.js"></script> 
<script src="popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="angular.min.js"></script> 
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/sb-admin.css" rel="stylesheet">
<script src="angular.min.js"></script> 

  <title> Inscripción - Alojamiento- JMJ 2019 || Parroquia San Nicolás De Bari</title>
<body ng-controller="ListController"   >

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
<div class="container-fluid" style="background-color:#2c3742;background-image:url(Img/alojamiento.jpg);padding:100px 0;background-size:cover;background-repeat:no-repeat;background-position:50%;color:white">
  <center><h3> Inscripción - Alojamiento </h3></Center>
</div>


<form  method="post"  action = "alamamailalojamiento.php"  onsubmit="return validacampos()" >

<br>
<div class="container">

<div class="col-sm-12">
<hr>
<ul>
    <li>Los campos con un asterisco <strong><span style="color: #ff0000;">(*)</span></strong>  son campos obligatorios.</li>
    <li>Al finalizar su inscripción, se le enviar un correo electrónico confirmando su solicitud. </li>
    <li>En menos de 48 horas el coordinador general o de capilla se contactará  con usted para validar los datos y darle la aprobación para pertenecer al equipo.</h2></center>
<hr>
</div>
 <div class="form-group">
 <center><h2 style ="background-color:#003087;color:#FFFFFF;">Información de alojamiento</h2></center>
 <hr>
   <br>
 <div class="row">
<div class = "col-sm-3">

<label>Disponibilidad de alojamientos <span style="color: #ff0000;">(*)</span>:</label>
<input type = "number" class="form-control" id="cantialojamiento" name = "cantialojamiento">

</div>
<div class = "col-sm-6">

              <label>Preferencias <span style="color: #ff0000;">(*)</span>:</label>
              <br>
              <select id = "preferencia" class="form-control" name = "preferencia" >
              <option  value="F"   id  = "Femenino"> Femenino </option>
              <option  value="M"  id  = "Masculino"> Masculino </option>
              <option  value="Mixto"      id  = "Mixto"> Mixto </option>
               </select>
</div>
</div>

<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Jefe de familia</h2></center>
<hr>
<hr>
<center><h4>Datos personales</h4></center>
<hr>
<div class = "row">

<div class = "col-sm-4">

  <label>Nombres <span style="color: #ff0000;">(*)</span>:</label>
  <input type = "text" class="form-control" name = "Nombres"  id="Nombres" placeholder = "Ejemplo: Alicia Isabela">

</div>
<div class = "col-sm-4">

  <label>Apellidos <span style="color: #ff0000;">(*)</span>:</label>
  <input type = "text" class="form-control" name = "Apellidos" id="Apellidos" placeholder = "Ejemplo:Alvarado Nuñez" >

</div>
<div class = "col-sm-4">

     <label>Cédula <span style="color: #ff0000;">(*)</span>:</label>
     <input type = "text" class="form-control" name = "cedula" id="Cedula"  placeholder = "Ejemplo: 8-987-123">

</div>
</div>
<div class = "row">


    <div class = "col-sm-3">
    <label>Estado civil <span style="color: #ff0000;">(*)</span>: </label>
    <select id = "estadocivil"  class="form-control" data-search="true" name = "estadocivil"  >
              <option value = "0" >	-- SELECCIONAR --</option>
              <option value = "Soltero/a">Soltero/a</option>
              <option value = "Comprometido/a">Comprometido/a</option>
              <option value = "Casado/a">Casado/a</option>
              <option value = "Divorciado/a">Divorciado/a</option>
              <option value = "Viudo/a">Viudo/a</option>
    </select>
    </div>

    <div class = "col-sm-3">
    <label>Nacionalidad <span style="color: #ff0000;">(*)</span>: </label>
    <select id = "nacionalidad" name =  "nacionalidad" class="form-control" data-search="true"  >
              <option value = "0" >	-- SELECCIONAR --</option>
              <?php 	

						 require_once "AcessConnectDB.php"; 

                         class Obtienenacionalidad extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function NombresNacionalidad() 
                               {  
                                  $resultado= mysql_query("SELECT Id_Nacionalidad,Nombre from nacionalidad  order by Nombre asc");
                                    return  $resultado;
                                }

                              } 

							                 $obtienenombres = new Obtienenacionalidad();
                               $data = $obtienenombres -> NombresNacionalidad();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Id_Nacionalidad']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>

    </select>
    </div>
  
    <div class = "col-sm-3">

     <label>Profesión <span style="color: #ff0000;">(*)</span>:</label>
     <input type = "text" class="form-control" id="profesion" name = "profesion" placeholder = "Ejemplo: Ejecutivo de Ventas" >

    </div>
  
    <div class = "col-sm-3">

     <label>Lugar de trabajo <span style="color: #ff0000;">(*)</span>:</label>
     <input type = "text" class="form-control" id="lugardetrabajo" name = "lugardetrabajo" placeholder = "Ejemplo: PSNDB INC" >

    </div>
  </div>
  <hr>
<center><h4>Dirección Residencial</h4></center>
<hr>

<div class = "row">
      <div class = "col-sm-3">

          <label>Distrito:</label>
          <input type = "text" class="form-control" id="distrito" name ="distritoc"  value = "Arraiján" disabled>

      </div>

      <div class = "col-sm-3">

              <label>Corregimiento <span style="color: #ff0000;">(*)</span>: </label>
              <select id = "corregimiento" name =  "corregimiento" class="form-control" data-search="true">
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
         <div class = "col-sm-3">  
  
         <label>Barrio <span style="color: #ff0000;">(*)</span>:</label>
         <input type = "text" class="form-control" id="barrio" name = "barrio" placeholder = "Ejemplo: Residencial Vista Alegre" >        

        </div>

        <div class = "col-sm-3">  
  
         <label>Calle <span style="color: #ff0000;">(*)</span>:</label>
         <input type = "text" class="form-control" id="calle" name = "calle" placeholder = "Ejemplo: Calle Primera" >        

        </div>
      </div> 
         <div class = "row">
         
          <div class = "col-sm-3">  
          <label>Casa <span style="color: #ff0000;">(*)</span>:</label>
          <input type = "text" class="form-control" id="casa" name="casa" placeholder = "Ejemplo: A-09" >        
          </div>

         </div>
        
      </div>
      <hr>
<center><h4>Información de contacto</h4></center>
<hr>
<div class = "row">

<div class = "col-sm-3">
          <label>Teléfono residencial:</label>
          <input type = "text" class="form-control" id="telefono_resi" name = "telefono_resi" maxlength="8" placeholder = "Ejemplo: 251-0101" > 
</div>

<div class = "col-sm-3">
          <label>Teléfono de oficina:</label>
          <input type = "text" class="form-control" id="telefono_ofi" name = "telefono_ofi" maxlength="8" placeholder = "Ejemplo: 301-123" > 
</div>

<div class = "col-sm-3">
          <label>Celular <span style="color: #ff0000;">(*)</span>:</label>
          <input type = "text" class="form-control" id="celular" name = "celular" ma maxlength="9" placeholder = "Ejemplo: 6800-9652"  > 
</div>

<div class = "col-sm-3">
          <label>Correo Electrónico <span style="color: #ff0000;">(*)</span>:</label>
          <input type = "email" class="form-control" id="correo" name =  "correo"  placeholder = "pedro.pasioniasta@gmail.com"  > 
</div>
</div>
<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Información de residentes en la vivienda</h2></center>
<center><p>A continuación debera de colocar el nombre y edad de las personas que actualmente residen en su vivienda, incluyendolo a usted.</p></center>
<hr>


<div class = "row">

  <div class = "col-sm-6">

            <label>Nombre Completo <span style="color: #ff0000;">(*)</span>:</label>
            <input type = "text" class="form-control" id="nombreresiente"  placeholder = "Luis Alberto Martinez"> 

  </div>
  <div class = "col-sm-3">

            <label>Edad <span style="color: #ff0000;">(*)</span>:</label>
            <input type = "number" class="form-control" id="edadrediente"  placeholder = "10" > 

  </div>
  <div class  = "col-sm-3">
            <br>
            <button type="button" style = "background-color: #003087;" class="btn btn-primary"  onclick =" agregaresientesenvivienda()">Agregar</button>

  </div>

</div>

<br>


<div class="col-md-12">
    <table class="table table-striped table-bordered" id = "residentesvivienda" name = "residentesvivienda">
        <thead>
            <tr>
                <th></th>
                <th><center>Nombre Completo</center></th>
                <th><center>Edad</center></th>
            </tr>
        </thead>
        <tbody>




        </tbody>
    </table>
    <div class="form-group">
        <input type="button" class="btn btn-danger pull-right"  onclick="eliminaresientesenvivienda()" value="Borrar">
    </div>
    <br>
</div>
<br>
<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Idiomas que se hablan en casa</h2></center>
<center><p>A continuación debera de seleccionar <b>"N"</b> Cantidad de idiomas que se hablan en su casa.</p></center>

<hr>

<div class = "row">
<div class="col-sm-3">
</div>
<div class="col-sm-6">

    <label>Idiomas <span style="color: #ff0000;">(*)</span>: </label>
    <select id = "cbx_idioma" class="form-control" data-search="true"  onchange = "AgregaIdioma();">
       <option value = "0" >	-- SELECCIONAR --</option>

                       <?php 	

						 require_once "AcessConnectDB.php"; 

                         class ObtieneIdiomas extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function NombresIdiomas() 
                               {  
                                  $resultado= mysql_query("SELECT Id_idioma, Nombre FROM idiomas order by Nombre asc");
                                    return  $resultado;
                                }

                              } 

                               
                              $obtienenombres = new ObtieneIdiomas();
                               $data = $obtienenombres -> NombresIdiomas();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Id_idioma']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>   
    </select>


</div>
<div class="col-sm-3">
</div>
</div>
<br>
<div class = "row">
<div class="col-sm-3">
</div>
<div class="col-sm-6">
<table class="table table-striped table-bordered"  id="idiomas">
        <thead>
            <tr>
                <th></th>
                <th><center>Idioma</center></th>
            </tr>
        </thead>
        <tbody>
 
        </tbody>
    </table>

    <div class="form-group">
        <input type="button" class="btn btn-danger pull-right" onclick="eliminaidioma()" value="Borrar">
    </div>
</div>
</div>
<br>
<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Conyugue (si aplica)</h2></center>
<hr>
<hr>
<center><h4>Datos personales</h4></center>
<hr>
<div class = "row">

<div class = "col-sm-4">
          <label>Nombres:</label>
          <input type = "text" class="form-control" id="nombres_conyugue" name = "nombres_conyugue">

</div>

<div class = "col-sm-4">
          <label>Apellido:</label>
          <input type = "text" class="form-control" id="apellidos_conyugue" name = "apellidos_conyugue">

</div>

<div class = "col-sm-4">

     <label>Cédula:</label>
     <input type = "text" class="form-control" id="cedula_conyugue" name = "cedula_conyugue" >

</div>

</div>

<div class = "row">
<div class = "col-sm-3">

<label>Nacionalidad: </label>
    <select id = "nacionalidadconyugue" name = "nacionalidadconyugue" class="form-control" data-search="true"  >
              <option value = "0" >	-- SELECCIONAR --</option>
              <?php 	

						
                             $obtienenombres = new Obtienenacionalidad();
                               $data = $obtienenombres -> NombresNacionalidad();		
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                               $valor=$fila['Nombre'];
                               $ValorConcatenado = str_replace(" ","_",$fila['Id_Nacionalidad']);
                               echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
                              }
						 
						  
						?>

    </select>

</div>

<div class = "col-sm-3">

     <label>Profesión:</label>
     <input type = "text" class="form-control" id="profesionconyugue" name = "profesionconyugue"  >

    </div>
  
    <div class = "col-sm-3">

     <label>Lugar de trabajo:</label>
     <input type = "text" class="form-control" id="lugardetrabajoconyugue" name = "lugardetrabajoconyugue" >

    </div>

</div>

<hr>
<center><h4>Información de contacto</h4></center>
<hr>
<div class = "row">


<div class = "col-sm-3">
          <label>Teléfono de oficina:</label>
          <input type = "text" class="form-control" id="telefono_oficonyugue" name = "telefono_oficonyugue" maxlength="8"  > 
</div>

<div class = "col-sm-3">
          <label>Celular:</label>
          <input type = "text" class="form-control" id="celularconyugue" name = "celularconyugue" ma maxlength="9"   > 
</div>

<div class = "col-sm-3">
          <label>Correo Electrónico:</label>
          <input type = "email" class="form-control" id="correoconyugue" name = "correoconyugue" > 
</div>
</div>

<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Apartado de discapacitados</h2></center>
<hr>
<div class = "row">
<div class = "col-sm-12">
<p>¿Tiene usted experiencia o formación en la atención a una persona con discapacidad?<span style="color: #ff0000;">(*)</span>             <input type="checkbox" id="experfordisca"  name = "experfordisca"></p>

</div>
</div>
<hr>
<div class = "row">
<div class = "col-sm-12">
<p>¿Recibiría usted a un joven con discapacidad?<span style="color: #ff0000;">(*)</span>              <input type="checkbox" id="recibedisca" name = "recibedisca"></p>

</div>
</div>
<hr>
<div class = "row">
<div class = "col-sm-12">
<p> ¿Con qué tipo de discapacidad? <b>(Si aplica)</b>: &nbsp; &nbsp; 
<input type="checkbox" id="auditiva" name = "auditiva" > Auditiva  &nbsp; &nbsp;
<input type="checkbox" id="visual" name = "visual" > Visual  &nbsp; &nbsp;
<input type="checkbox" id="motora" name = "motora"  > motora  &nbsp; &nbsp;
<input type="checkbox" id="intelectual" name = "intelectual"> intelectual 
</p> 
</div>
</div>
<hr>
<center><h2 style ="background-color:#003087;color:#FFFFFF;">Información parroquial</h2></center>
<hr>
<div class = "row">
<div class = "col-sm-3">
             <label>Corregimiento<span style="color: #ff0000;">(*)</span>: </label>
             <select id = "corregimientocapilla" name = "corregimientocapilla" class="form-control" data-search="true"  >
             	<option value = "0" >	-- SELECCIONAR --</option>			  
             <?php 	
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
             <select id = "capilla" name = "codcapilla" class="form-control" data-search="true" >
              </select>                  
        </div>
</div>

<hr>
<div class = "row">
<div class = "col-sm-12">
<p>Hago constar que la información plasmada es verídica,
y confiero permiso a la parroquia San Nicolás de Bari y la Arquiocésis de Panamá para que dicha información 
sea utilizada solamente con fines ligados a alojamientos para la JMJ 2019.</p> 
<p><input type="checkbox" id="terminos" > <b>&nbsp;Estoy de acuerdo con los terminos.</b> </p>

<p id="alerta" style = "color: red;"></p>

</div>
</div>
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
</div>

</form>

<br>
<br>
<br>


   <!-- Trigger the modal with a button -->
   <button id="mensajevalidacampos" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  style="visibility:hidden;" >
   Open modal
   </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Aviso</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
             Verificar que todos los campos esten llenos correctamente.
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
      
    </div>
  </div>
</div>



   <!-- Trigger the modal with a button -->
   <button id="validaidioma" type="button" class="btn btn-primary" data-toggle="modal" data-target="#mymodalidioma"  style="visibility:hidden;" >
   Open modal
   </button>

  <!-- The Modal -->
  <div class="modal fade" id="mymodalidioma">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Aviso</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
                Seleccione otro idioma.
      </div>
      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
      </div>
      
    </div>
  </div>
</div>

<!--  ************************************* INICIA MODEL  ********************************-->


   <!-- Trigger the modal with a button -->
   <button id="mensajevalidacamposfinal" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalfinal" style="visibility:hidden;" >
   Open modal
   </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModalfinal">
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

var VDisponibilidad = document.getElementById("cantialojamiento").value;
var VNombres = document.getElementById("Nombres").value;
var VApellidos = document.getElementById("Apellidos").value;
var VCedula = document.getElementById("Cedula").value;
var Vestadocivil = document.getElementById("estadocivil").value;
var Vnacionalidad = document.getElementById("nacionalidad").value;
var Vprofesion = document.getElementById("profesion").value;
var Vlugardetrabajo = document.getElementById("lugardetrabajo").value;
var Vcorregimiento = document.getElementById("corregimiento").value;
var VBarrio = document.getElementById("barrio").value;
var Vcalle = document.getElementById("calle").value;
var VCasa = document.getElementById("casa").value;
var Vcelular = document.getElementById("celular").value;
var Vcorreo = document.getElementById("correo").value;
var VCantidadDeResidentes =  document.getElementById("residentesvivienda").rows.length;
var VCantidadDeIdiomas =  document.getElementById("idiomas").rows.length;
var Vcapilla =  document.getElementById("capilla").value;
var Vterminos = document.getElementById("terminos").checked;

var validacionescorrectaas = 0;

if( VDisponibilidad > 0 && VNombres.length > 1  && VApellidos.length > 1 &&  VCedula.length > 5 
&& Vestadocivil != 0 && Vnacionalidad != 0 && Vprofesion.length > 4 && Vlugardetrabajo.length > 3 
&& Vcorregimiento != 0 && VBarrio.length > 4 && Vcalle.length > 4 && VCasa.length > 0 && Vcelular.length > 7 
&& validarEmail(Vcorreo) != false && VCantidadDeResidentes > 1 && VCantidadDeIdiomas > 1 && Vcapilla > 0)
{
    validacionescorrectaas = 1;
}

if  ( validacionescorrectaas == 1)
{

    if (Vterminos != true)
    {
        validacionescorrectaas = 0;
        document.getElementById("alerta").innerHTML = "Debe de aceptar los terminos para poder completar el registro!";   
    }

}

if (validacionescorrectaas == 0)
{
    $('#mensajevalidacamposfinal').click();  
    return false;     
}
else 
{
    return true;
}




}

function validarEmail(valor) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(valor) ? true : false;
}

var contador = 0;
var contadoresidentes = 0;

$(document).ready(function(){
    $("#corregimientocapilla").change(function(){
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



function agregaresientesenvivienda()
{

var nombreresi = document.getElementById("nombreresiente").value;
var edadresi = document.getElementById("edadrediente").value;


if (nombreresi.length > 1 && (edadresi > 0 || edadresi != null) )
{


        var tablaresidentesvivienda = document.getElementById("residentesvivienda");
        var cantregistros = document.getElementById("residentesvivienda").rows.length;
        var registrov = tablaresidentesvivienda.insertRow(cantregistros);
        contadoresidentes = contadoresidentes+1;
        var celdaun = registrov.insertCell(0);
        var celdado = registrov.insertCell(1);
        var celdatr = registrov.insertCell(2);
        celdaun.innerHTML = '<center><input  id = check_'+(contadoresidentes)+' type="checkbox"/></center>';
        celdado.innerHTML = '<center><input size="30" style = "border:none" type = "text" name = "nombrecompletoresidentes[]" value = "'+nombreresi+'" readonly></center>';
        celdatr.innerHTML = '<center><input size="2" style = "border:none" type = "text" name = "edadresidentes[]" value = "'+edadresi+'" readonly></center>';
        document.getElementById("nombreresiente").value = null;
        document.getElementById("edadrediente").value = null;
        
}
else
{

    $('#mensajevalidacampos').click();
}


return false;

}

function eliminaresientesenvivienda()
{
    
    var tablaresidentesvivienda = document.getElementById("residentesvivienda");
    var nombreid = "";
    var existentes = 0;
    for (var x = 1; x <= contadoresidentes ;x++)
    {
        nombreid = 'check_'+x;
        try
        {
            
            
            if (document.getElementById(nombreid).checked == true)
              {
                document.getElementById("residentesvivienda").deleteRow(existentes+1);
              }
              else 
              {
                existentes++;
              }
             

        }catch(err)
        {
            //alert(err.message);
        }

    }  

}


/*
var app = angular.module("myapp", []);
app.controller("ListController", ['$scope', function($scope) {
    $scope.residente = [];
    $scope.idiomas = [];

        $scope.addNew = function(residente){
           
            if (( residente.nombre != null)  && (residente.edad > 1 || residente.edad != null))
            {
                $scope.residente.push({ 
                  'nombre': residente.nombre, 
                  'edad': residente.edad,
              });
              $scope.PD = {};
                residente.nombre = null;
                residente.edad = null;
            }
            else 
            {
            
          
          
          
            }

        };

        $scope.remove = function(){
            var newDataList=[];
            $scope.selectedAll = false;
            angular.forEach($scope.residente, function(selected){
                if(!selected.selected){
                    newDataList.push(selected);
                }
            }); 
            $scope.residente = newDataList;
        };
    
    
}]);
   */ 

function AgregaIdioma()
{

    var tablaidiomas = document.getElementById("idiomas");
    var valida = 0;
    for (var x = 0; x < tablaidiomas.rows.length ;x++)
    {
        if (tablaidiomas.rows[x].cells[1].innerHTML == $( "#cbx_idioma option:selected" ).text() ||  $( "#cbx_idioma option:selected" ).text() == "	-- SELECCIONAR --" )
        {
            
            var valida = 1;
            document.getElementById("cbx_idioma").value = "";
            $('#validaidioma').click();

        }

    }

    if (valida != 1)
    {
            var tablaidiomas = document.getElementById("idiomas");
            var cantregistros = document.getElementById("idiomas").rows.length;
            var registro = tablaidiomas.insertRow(cantregistros);
            var celdauno = registro.insertCell(0);
            var celdados = registro.insertCell(1);
            var datoainsertar = $( "#cbx_idioma option:selected" ).text();
            contador = contador+1;
            celdauno.innerHTML = '<input  id = check_'+(contador)+' type="checkbox"/>';
            celdados.innerHTML = '<center><input style = "border:none" type = "text" name = "nombrepais[]" value = "'+datoainsertar+'" readonly></center>';
            valida = 0;
            document.getElementById("cbx_idioma").value = "";
        
    }
  
}


function eliminaidioma()
{
    
    var tablaidiomas = document.getElementById("idiomas");
    var nombreid = "";
    var existentes = 0;
    for (var x = 1; x <= contador ;x++)
    {
        nombreid = 'check_'+x;
        try
        {
            
            
            if (document.getElementById(nombreid).checked == true)
              {
                document.getElementById("idiomas").deleteRow(existentes+1);
              }
              else 
              {
                existentes++;
              }
             

        }catch(err)
        {
            //alert(err.message);
        }

    }  

}




</script>



</body>
</head>
</html>