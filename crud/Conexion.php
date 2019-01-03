<?php 

class Conexion{


function get_conexion(){

try {
	
$conexion = new PDO(

'mysql:host=localhost;dbname=virtual',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);
return $conexion;





} catch (Exception $e) {
	
echo "Error :".$e->getMessage();

}



}




}



 ?>