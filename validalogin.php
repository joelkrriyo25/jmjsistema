<?php 

require_once "AcessConnectDB.php"; 

class usuariosModelo extends Modelo 
{     
     
    
	 
    public function __construct() 
    { 
	
	    
        parent::__construct(); 
		
		
    } 

    public function ValidaUsuario($usuario,$Clave) 
    { 
        $usuario = "'".$usuario."'";
        $Clave = "'".$Clave."'";
		$result= mysql_query("Select usuarioslogin.* from usuarioslogin Where usuarioslogin.Nick = $usuario and usuarioslogin.Clave = $Clave ");
        $cantiregistros = mysql_num_rows($result);
        return  $cantiregistros; 
    }

} 


 $usuarioModel = new usuariosModelo(); 
 $CantidadUsuarios = $usuarioModel->ValidaUsuario( $_POST['Usuario'],$_POST['clave']); 
 if ($CantidadUsuarios > 0)
{
    header('Location: dashboard.php?'.$usuario.' accepted');
}
else 
{
	header('Location: index.php?errorlogin');
}

?>