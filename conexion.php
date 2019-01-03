<?php 

//Conexion a MYSQL mediante PDO

//utf8 = carácteres especiales del idioma español [ñ,ü,ó]

try {

//Código de conexion

$conexion = new PDO(

'mysql:host=localhost;dbname=virtual',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);

#Conexion SQLSEVER 
/*
$conexion = new PDO(

'sqlsrv:Server=localhost;database=virtual',
'sa',
'123',
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);
*/


#Validación de datos
$query =  "SELECT * FROM usuario";
//Creamos la sentencia preparada
$statement  = $conexion->prepare($query);//analísis de la sentencia SQL
$statement->execute();//ejecutamos la sentencia SQL

#recuperar la información
$result = $statement->fetchAll(PDO::FETCH_ASSOC); //Recuperamos la información que nos devuelve el código SQL

#array asociativo
//var_dump($result);


foreach ($result as $key => $value) {
	
  echo $value['nombres'].' '.$value['apellidos']."<br>";

}




} catch (Exception $e) {
	
//Mensaje de error 
echo "Error: ".$e->getMessage();

}







 ?>