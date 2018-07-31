<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>Control De Comisiones JMJ Arraiján - Inicio De Sesión</title>
     <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	

  </head>
  <body>

  
   <div class="container">

   
   <div class="row">
   
   <div class="col-sm-4">
   </div>
	<div class="col-sm-4">
	<br>
	<center><img class="img-responsive" style = "width: 35%;"src="Img/logo.png" alt="Chania"></center>
	<br>


	<center><b><p class = "titulo" >Iniciar sesión</p></b></center>
    <?php

            $url= $_SERVER["REQUEST_URI"];
            if (strpos($url, "errorlogin") > 0) 
            {
              echo "<font color = CE0B0B><center>Usuario o Contraseña Incorrectos!</center></font>";
            }
            if (strpos($url, "timeout") > 0) 
            {
              echo "<font color = CE0B0B><center>Sesión Finalizada, Vuelva a introducir los datos!</center></font>";
            }

            if (strpos($url, "ValidaNuevaClave") > 0) 
            {
              echo "<font color = 009000><center>Nuevos Datos De Acceso Envidos A Su Correo!</center></font>";
            }

    ?>
	<center><p class = "subtitulo" >Por favor, introduzca su nombre y contraseña.</p></center>
	<form method="post" action = "validalogin.php"> 
	
         <div class="input-group">
        
		 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
         <input type= "text" class="form-control" placeholder="Usuario" name="Usuario"   required >
		 
         </div>
		 
		 <br>

         <div class="input-group">
		 
		  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
		 
         </div>
		  <br>
		 
          <center><button type="submit" onclick="correo()" class="btn btn-primary btn-block"><i class="fa fa-lock"></i> Ingresar</button></center>
	</form>
	<br>
	<center><p><a href="CambioDeClave.php" target="_parent"> ¿Has perdido tu contraseña? </a></b></p></center>
	
    <center><p>Copyright © 2018-2019</p><p> Powered by <a href="http://carrillosystemsolutions.com/" target="_blank"> Joel Carrillo</a></b></p></center>
    </div>
	</div>	  
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>