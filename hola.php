<?php

for ($x = 0; $x < 10; $x++)
{
    $arr[] = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
    $myJSON = json_encode($arr);
    
}




echo $myJSON;
?>