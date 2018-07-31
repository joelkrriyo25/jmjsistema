<?php

class Modelo 
{ 
    protected $_db; 

    public function __construct() 
    { 
        $this->_db = mysql_connect('Localhost', 'Joel', 'Panama2016');
	     mysql_select_db('sysjmjdb');
		 mysql_query ("SET NAMES 'utf8'");
    } 


}

?>