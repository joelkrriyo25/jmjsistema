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

  <title> Inscripción - Equipo de Transporte - JMJ 2019 || Parroquia San Nicolás De Bari</title>
<body>

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <!-- Brand -->
  <img src="Img/logo.png" alt="Logo" style="width:40px;">
  <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  href="http://parroquiasannicolasdebari.com/peregrino/">
            <i class="fa fa-fw fa-sign-out"></i>Regresar</a>
        </li>
  </ul>
</nav>
<div class="container-fluid" style="background-color:#2c3742;background-image:url(Img/portadaTransporte.jpg);padding:100px 0;background-size:cover;background-repeat:no-repeat;background-position:50%;color:white">
  <center><h3> Inscripción - Equipo De Transporte</h3></Center>
</div>

<br>
<div class="container">
<form method="post" action = "almamailtransporte.php" onsubmit="return  validacampos()" >
<div class="col-sm-12">
<hr>
<ul>
    <li>Los campos con un asterisco <strong><span style="color: #ff0000;">(*)</span></strong> son campos obligatorios.</li>
    <li>Al finalizar su inscripción, se le enviara un correo electrónico confirmando su solicitud. </li>
    <li>En menos de 48 horas el coordinador general o de capilla se contactará  con usted para validar los datos y darle la aprobación para pertenecer al equipo.</h2></center>
<hr>
 <div class="form-group">
  
 <center><h2 style ="background-color:#003087;color:#FFFFFF;">Datos del Conductor</h2></center>
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

      <div class = "col-sm-3">
                <label>Celular<span style="color: #ff0000;">(*)</span>: </label>
                <input name = "celular"  id="celular" type="text" class="form-control" maxlength="9" placeholder= "Ejemplo: 6800-9652">              
        </div>

      <div class = "col-sm-6">
                <label>Correo Electrónico<span style="color: #ff0000;">(*)</span>: </label>
                <input name = "correo"  id="correo" type="emails" class="form-control" placeholder = "Ejemplo: pedro.pasionista@gmail.com">              
        </div>

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

        <div class = "col-sm-3">
            <label>Capilla<span style="color: #ff0000;">(*)</span>: </label>
            <select name ="capilla"  id = "capilla" class="form-control" data-search="true" >
            </select>                  
        </div> 
        
      </div>


      <br>
       <center><h2 style ="background-color:#003087;color:#FFFFFF;">Detalles del Auto</h2></center>
       <hr>
       <div class = "row">
         <div class = "col-sm-3">
                <label>Marca <span style="color: #ff0000;">(*)</span>: </label>
                <input name ="marca" id="marca" type="text" class="form-control" maxlength="25" placeholder = "Ejemplo: Toyota">              
        </div>

        <div class = "col-sm-3">
                <label>Modelo <span style="color: #ff0000;">(*)</span>: </label>
                <input name ="modelo" id="modelo" type="text" class="form-control" maxlength="25" placeholder = "Ejemplo: Yaris Hatchback">              
        
         </div>
         <div class = "col-sm-3">
                <label>Año<span style="color: #ff0000;">(*)</span>:</label>
                <input name ="year" id="year" type="number" class="form-control" maxlength="4"  placeholder = "Ejemplo: 2012">              
        
         </div>
         <div class = "col-sm-3">
                <label>Capacidad de Personas <span style="color: #ff0000;">(*)</span>:</label>
                <input name ="capacidad" id="capacidad" type="number" class="form-control" maxlength="4"  placeholder = "Ejemplo: 4">              
        
         </div>
         
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
        var celular = document.getElementById("celular").value;
        var correo = document.getElementById("correo").value;
        var capilla =  document.getElementById("capilla").value;
        var marca =  document.getElementById("marca").value;
        var modelo =  document.getElementById("modelo").value;
        var year =  document.getElementById("year").value;
        var capacidad =  document.getElementById("capacidad").value;
        
       if (nombre.length > 0 && apellido.length > 0 && cedula.length > 5 && edad.length > 1 && celular.length > 7 && validarEmail(correo) != false && capilla > 0 &&  marca.length > 3 && modelo.length > 2 && year.length >1 && capacidad.length >0 )
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