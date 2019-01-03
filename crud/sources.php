<?php 
//Incluir la conexion a base de datos
include'Conexion.php';
//Crear la conexion
$conexion = new Conexion();
$conexion = $conexion->get_conexion();

/*
Consultar = opcion 1
agregar   = opcion 2
actualizar= opcion 3
eliminar  = opcion 4

$_GET  = no  encriptado.
$_POST = encriptado
$_REQUEST = ambos ($_GET, $_POST)
*/
$opcion =  $_REQUEST['op'];

switch ($opcion) {
	case 1:
	
 $query     = "SELECT * FROM usuario";
 $statement = $conexion->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll(PDO::FETCH_ASSOC);

 $data = ["data"=>$result];

 echo json_encode($data);



		break;
	case 2:
	
	var_dump($_REQUEST);




		break;
    case 3:
	echo "actualizar";
		break;
	case 4:
	echo "eliminar";
		break;
    
	default:
	echo "no existe la opción";
		break;
}



 ?>