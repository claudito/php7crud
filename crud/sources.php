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
	
	$nombres          = trim($_REQUEST['nombres']);
	$apellidos        = trim($_REQUEST['apellidos']);
	$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];

	try {
		
    $query =  "INSERT INTO usuario
    (nombres,apellidos,fecha_nacimiento)
    VALUES(:nombres,:apellidos,:fecha_nacimiento)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $statement->execute();
    echo "ok";



	} catch (Exception $e) {
		
    echo "Error: ".$e->getMessage();

	}




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