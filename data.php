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

// 1. Armar un array que contenga todos las filas
  
  $data = array();

 foreach ($result as $key => $value) {
    
  $data[] = [

  $value['id'],
  $value['nombres'],
  $value['apellidos'],
  $value['fecha_nacimiento']

  ];

 }

//2. armar la estructura tipo json
 $json  = ["data"=>$data];


//3. Imprimir el JSON

echo json_encode($json);




} catch (Exception $e) {
  
//Mensaje de error 
echo "Error: ".$e->getMessage();

}







 ?>