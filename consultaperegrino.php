<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<title> Bienvenido - Sistema De Administración JMJ Comisiones </title>

<body>

<?php 

include 'base.php';

?>
 <div class="container">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Consultar</a>
        </li>
        <li class="breadcrumb-item active">Peregrino</li>
      </ol>


      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  Peregrinos Registrados</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>Codigo de Registro</th>
                  <th>Cédula</th>
                  <th>Nombre Completo</th>
                  <th>Edad</th>
                  <th>Capilla</th>
                 
                </tr>
              </thead>
              <tfoot>
                <tr>
                
                <th>Codigo de Registro</th>
                <th>Cédula</th>
                <th>Nombre Completo</th>
                <th>Edad</th>
                <th>Capilla</th>
                </tr>
              </tfoot>
              <tbody>
                
              <?php 	

						 require_once "AcessConnectDB.php"; 

                         class ObtienePeregrinos extends Modelo 
                            {     
     
                             public function __construct() 
                                { 
                                 parent::__construct(); 
                                } 
                                  
                               public function DatosPeregrinos() 
                               {  
                                  $resultado= mysql_query("SELECT codigo_delegacion as NroRegistro,Codigo_Alterno as CodigoRegistro,Cedula,concat(Apellido, ' ', Apellido_Materno,' , ',delegacion.Segundo_Nombre, ' ',delegacion.Nombre) as NombreCompleto,capilla.Nombre as Capilla, left((CURDATE()-fecha_de_nacimiento),2) as edad FROM delegacion inner join capilla on (delegacion.Codigo_Capilla = capilla.Codigo_Capilla)");
                                    return  $resultado;
                               }

                                public function ultimoIngreso() 
                                {  
                                  mysql_query ("SET lc_time_names = 'es_ES'");
                                   $resultadofecha = mysql_query("select concat(DATE_FORMAT(max(fecha_registro), '%W %e %M %Y'),' a las ',DATE_FORMAT(fecha_registro,'%r'))  as ulti from delegacion ");
                                     return  $resultadofecha;
                                }
 
                                public function AllPeregrinos() 
                                {  
                                   $resultadoallpere = mysql_query("
                                   SELECT codigo_alterno, 
                                   codigo_delegacion, 
                                   nombre, 
                                   segundo_nombre, 
                                   apellido, 
                                   apellido_materno, 
                                   cedula, 
                                   sexo, 
                                   fecha_de_nacimiento, 
                                   LEFT(( Curdate() - fecha_de_nacimiento ), 2)     AS edad, 
                                   alergia, 
                                   tipo_de_sangre, 
                                   padecimiento_enfermedad, 
                                   bautizo, 
                                   comunion, 
                                   confirmacion, 
                                   matrimonio, 
                                   telefono, 
                                   celular, 
                                   correo_electronico, 
                                   direccion, 
                                   (SELECT nombre 
                                    FROM   capilla 
                                    WHERE  codigo_capilla = d.codigo_capilla)       AS codigo_capilla, 
                                   (SELECT nombre 
                                    FROM   pastoral 
                                    WHERE  codigo_pastoral = d.codigo_pastoral)     AS codigo_pastoral, 
                                   caso_emerg_llamar, 
                                   telefono_emergencia, 
                                   por_que_ser_peregrino, 
                                   acudiente, 
                                   codigo_parentesco, 
                                   telefono_acudiente, 
                                   celular_acudiente, 
                                   estado, 
                                   fecha_registro 
                            FROM   delegacion d ");
                                     return  $resultadoallpere;
                                }
                                

                              }

							                 $obtieneperegrinos = new ObtienePeregrinos();
                               $data = $obtieneperegrinos -> DatosPeregrinos();	
                               $nroregis = '';
                               $codigoregis = '';
                               $cedula   = '';
                               $nbrecomp = '';
                               $capilla = '';
                               while ($fila =  mysql_fetch_array($data))                         
                              {
                                $nroregis = $fila["NroRegistro"];
                                $codigoregis = $fila["CodigoRegistro"];
                                $cedula   = $fila["Cedula"];
                                $nbrecomp =  $fila["NombreCompleto"];
                                $capilla = $fila["Capilla"];
                                $edad = $fila["edad"];
                                

                                echo'<tr>
                                
                                <td onclick="BuscaDatos('."'".$codigoregis."'".')"> <a data-toggle="modal" href="#portfolio-modal-11">'.$codigoregis.'</a></td>
                                <td>'.$cedula.'</td>
                                <td>'.$nbrecomp.'</td>
                                <td>'.$edad.'</td>
                                <td>'.$capilla.'</td>
                                </tr>'; 
                              }


                              //Cargando el Json Con todos los Delegados

                              $datap = $obtieneperegrinos -> AllPeregrinos();	
                              
                              while ($filape =  mysql_fetch_array($datap))                         
                              {
                               
                                $todosperegrinos[] = array(
                                "codigo_alterno" => $filape["codigo_alterno"],
                                "codigo_delegacion" => $filape["codigo_delegacion"],
                                "nombre" => $filape["nombre"],
                                "segundo_nombre" => $filape["segundo_nombre"],
                                "apellido" => $filape["apellido"],
                                "apellido_materno" => $filape["apellido_materno"],
                                "cedula" => $filape["cedula"],
                                "sexo" => $filape["sexo"],
                                "fecha_de_nacimiento" => $filape["fecha_de_nacimiento"],
                                "edad" => $filape["edad"],
                                "alergia" => $filape["alergia"],
                                "tipo_de_sangre" => $filape["tipo_de_sangre"],
                                "padecimiento_enfermedad" => $filape["padecimiento_enfermedad"],
                                "bautizo" => $filape["bautizo"],
                                "comunion" => $filape["comunion"],
                                "confirmacion" => $filape["confirmacion"],
                                "matrimonio" => $filape["matrimonio"],
                                "telefono" => $filape["telefono"],
                                "celular" => $filape["celular"],
                                "correo_electronico" => $filape["correo_electronico"],
                                "direccion" => $filape["direccion"],
                                "codigo_capilla" => $filape["codigo_capilla"],
                                "codigo_pastoral" => $filape["codigo_pastoral"],
                                "caso_emerg_llamar" => $filape["caso_emerg_llamar"],
                                "telefono_emergencia" => $filape["telefono_emergencia"],
                                "por_que_ser_peregrino" => $filape["por_que_ser_peregrino"],
                                "acudiente" => $filape["acudiente"],
                                "codigo_parentesco" => $filape["codigo_parentesco"],
                                "telefono_acudiente" => $filape["telefono_acudiente"],
                                "celular_acudiente" => $filape["celular_acudiente"],
                                "estado" => $filape["estado"],
                                "fecha_registro" => $filape["fecha_registro"]);
                                // $pecedula =  $filape["cedula"];

                                }
                              
                              $myJSON = json_encode($todosperegrinos,JSON_UNESCAPED_UNICODE);
                            
						?>

              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer small text-muted"><b>Última Actualización</b> <?php 
        
                               //$obtieneperegrinos = new ObtienePeregrinos();
                               $datafecha = $obtieneperegrinos -> ultimoIngreso();	 
                               $codigoregistro = mysql_fetch_row($datafecha);
                               $coigofechh = $codigoregistro[0];
                               
                               echo $coigofechh;

                               ?>
                               </div>

      </div>

    </div>
</div>

<!-- DALOGO PARA MODIFICAR REGISTROS  portfolio-modal-11-->

  <!-- The Modal -->
  <div class="modal fade" id="portfolio-modal-11">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">

          <h4 class="modal-title">Editar Registro</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" action = "almamaildelegacion.php" onsubmit="return  validacampos()" >
<div class="col-sm-12">
<ul>
    Los campos con un asterisco <strong><span style="color: #ff0000;">(*)</span></strong> son campos obligatorios.

 <div style="background-color: #e9ecef;">
 <hr>
 <center><h5 >Datos personales</h5></center>
 <hr>
 </div>

 <div class="form-group">
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
				 <select class="form-control" name = "sexo" id = "sexo" >
                  <option value="F">Femenino</option>
                  <option value="M">Masculino</option>
			  </select>
          
      </div>
      
        <div class = "col-sm-4">
             <label>Fecha De Nacimiento<span style="color: #ff0000;">(*)</span>: </label>
             <input name = "FechaNacimiento"  id="FechaNacimiento" class="form-control" type="date" onchange="calculaedad();" >
        </div>

        <div class = "col-sm-2">
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
      <div style="background-color: #e9ecef;">
      <hr>
      <center><h5 >Información Contacto</h5></center>
      <hr>
      </div>
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
       <div style="background-color: #e9ecef;">
      <hr>
      <center><h5 >Información Parroquial</h5></center>
      <hr>
      </div>
        <hr>
       <div class = "row">
        <div class = "col-sm-6">
             <label>Capilla<span style="color: #ff0000;">(*)</span>: </label>
             <input name = "capilla"  id="capilla" type="text" class="form-control" disabled>              
                       
        </div>

        <div class = "col-sm-6">
             <label>Pastoral: </label>
             <input name = "pastoral"  id="pastoral" type="text" class="form-control" disabled>              			  
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
             <textarea class="form-control" rows="2" placeholder="Ejemplo: Deseo ser peregrino por ..." minlength="10"  cols="50" name = "PorquePeregrino" id="PorquePeregrino" disabled></textarea>
        </div>

       </div>     
       <br>
       <div style="background-color: #e9ecef;">
      <hr>
      <center><h5 >Información Acudiente</h5></center>
      <hr>
      </div>
       <center> <p><b>Nota:</b> Completar si el peregrino es menor de edad.</p></center>
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
<button type="submit" style = "background-color:#007bff;color:#FFFFFF;" class="btn btn-primary btn-block">Modificar</button>           
</div>
<div class = "col-sm-4">              
</div>
</div>
</form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        
      </div>
    </div>
  </div>

<script type="text/javascript">

    $('#dataTable').DataTable( {
        "language": {"sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    } );

     var jaison = eval(<?php echo($myJSON)  ?> )
    //Declaracion de variables


function BuscaDatos(codigoalterbus) {
    //var x = document.getElementById("xa").value;
    LimpiElementosDeDialog();

   for(y = 0; y <jaison.length;y++)
   {
     
     if (jaison[y].codigo_alterno == codigoalterbus)
     {
      
        document.getElementById("Nombre").value =jaison[y].nombre;
        document.getElementById("SegundoNombre").value =jaison[y].segundo_nombre;
        document.getElementById("ApellidoPaterno").value =jaison[y].apellido;
        document.getElementById("ApellidoMaterno").value =jaison[y].apellido_materno;
        document.getElementById("Cedula").value =jaison[y].cedula;

        // Selecionar **Sexo** De Combobox 
        var sel = document.getElementById("sexo");
        
            for (var i = 0; i < sel.length; i++)
             {
            //  Aca haces referencia al "option" actual
            var opt = sel[i];
             if (opt.value == jaison[y].sexo)
             {
               // Selecciona el Sexo 
              sel[i].selected = true;
             }

            
             }

          document.getElementById("FechaNacimiento").value =jaison[y].fecha_de_nacimiento;
          document.getElementById("Edad").value =jaison[y].edad;
          document.getElementById("alergia").value =jaison[y].alergia;
          document.getElementById("tiposangre").value =jaison[y].tipo_de_sangre;
          document.getElementById("enfermedades").value =jaison[y].padecimiento_enfermedad;

          if (jaison[y].bautizo == 1)
          {
            document.getElementById("bautizo").checked = true; 
          }

          if (jaison[y].comunion  == 1)
          {
            document.getElementById("comunion").checked = true; 
          } 
         
          if (jaison[y].confirmacion  == 1)
          {
            document.getElementById("confirmacion").checked = true; 
          } 
         
          if (jaison[y].matrimonio  == 1)
          {
            document.getElementById("matrimonio").checked = true; 
          }

          
         document.getElementById("Telefono").value =jaison[y].telefono; 
         document.getElementById("celular").value =jaison[y].celular; 
         document.getElementById("correo").value =jaison[y].correo_electronico; 
         document.getElementById("direccion").value =jaison[y].direccion; 
         document.getElementById("capilla").value =jaison[y].codigo_capilla; 
         document.getElementById("pastoral").value =jaison[y].codigo_pastoral;
         document.getElementById("PorquePeregrino").value =jaison[y].por_que_ser_peregrino;
         document.getElementById("casollamar").value =jaison[y].caso_emerg_llamar;
         document.getElementById("telefonoemergencia").value =jaison[y].telefono_emergencia;
         document.getElementById("Acudiente").value =jaison[y].acudiente;

              // Selecionar **Parentezco de Acudiente ** De Combobox 
              var pare = document.getElementById("parentesco");

              for (var i = 0; i < pare.length; i++)
              {
              //  Aca haces referencia al "option" actual
              var opt = pare[i];
              if (opt.value == jaison[y].codigo_parentesco)
              {
              // Selecciona el parentezco
              pare[i].selected = true;
              }


              }

         document.getElementById("Telefono_acudiente").value =jaison[y].telefono_acudiente;
         document.getElementById("celular_acudiente").value =jaison[y].celular_acudiente;
         
        
     }
     

   }

}
function LimpiElementosDeDialog() {
      document.getElementById("Nombre").value ="";
      document.getElementById("SegundoNombre").value ="";
      document.getElementById("ApellidoPaterno").value ="";
      document.getElementById("ApellidoMaterno").value ="";
      document.getElementById("Cedula").value ="";
      document.getElementById("FechaNacimiento").value ="";
      document.getElementById("Edad").value ="";
      document.getElementById("alergia").value ="";
      document.getElementById("tiposangre").value ="";
      document.getElementById("enfermedades").value="";
      document.getElementById("bautizo").checked = false; 
      document.getElementById("comunion").checked = false;
      document.getElementById("confirmacion").checked = false; 
      document.getElementById("matrimonio").checked = false; 
      document.getElementById("Telefono").value =""; 
      document.getElementById("celular").value =""; 
      document.getElementById("correo").value =""; 
      document.getElementById("direccion").value =""; 
      document.getElementById("capilla").value =""; 
      document.getElementById("pastoral").value ="";
      document.getElementById("casollamar").value ="";
      document.getElementById("telefonoemergencia").value ="";
      document.getElementById("PorquePeregrino").value ="";
      document.getElementById("casollamar").value ="";
      document.getElementById("telefonoemergencia").value ="";
      document.getElementById("Acudiente").value ="";
      document.getElementById("Telefono_acudiente").value ="";
      document.getElementById("celular_acudiente").value ="";

}


</script>

</body>
</head>
</html>