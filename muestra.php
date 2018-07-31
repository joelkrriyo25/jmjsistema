<?php 

    require_once "AcessConnectDB.php"; 

        class ObtieneCapillas extends Modelo 
        {     

            public function __construct() 
            { 
                parent::__construct(); 
            } 
                
            public function NombresCapillas() 
            {  
                $resultado= mysql_query("SELECT Codigo_Capilla,Nombre from capilla where Codigo_Corregimiento = ".$_POST['corregimiento_id']." order by Nombre asc");
                return  $resultado;
            }

            } 

            $obtienenombres = new ObtieneCapillas();
            $data = $obtienenombres -> NombresCapillas();		
            while ($fila =  mysql_fetch_array($data))                         
            {
            $valor=$fila['Nombre'];
            $ValorConcatenado = str_replace(" ","_",$fila['Codigo_Capilla']);
            echo    "<option value= ". $ValorConcatenado.">".$valor."</option>\n";
            }
        
        


?>