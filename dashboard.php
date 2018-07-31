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



<script>
//validacion de hora
function muestrahora()
{

	FechaDeSistema = new Date() 
  hora = FechaDeSistema.getHours();
  //alert(hora);
  if (hora >= 18 && hora <= 24)
  {
    document.getElementById("MensajeBienvenida").innerHTML = "Buenas noches,";
  }
  if (hora >= 0 && hora < 12)
  {

    document.getElementById("MensajeBienvenida").innerHTML = "Buenos días,";

  }

  if (hora >= 12 && hora < 18)
  {

    document.getElementById("MensajeBienvenida").innerHTML = "Buenas tardes,";

  }

}
</script>

<body onload = "muestrahora();">

<?php 

include 'base.php';

?>

<div class="jumbotron">
  <div class="container">
    <h1 id = "MensajeBienvenida"></h1>      
    <p>Bienvenido al sistema administrativo para coordinadores de comisiones de la JMJ para la parroquia San Nicolas De Baris - Pasionistas Arraiján.</p>
  </div>
</div>

</body>

</head>





</html>