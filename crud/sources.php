<?php 
//Incluir la conexion a base de datos
include'Conexion.php';
//Crear la conexion
$conexion = new Conexion();
$conexion = $conexion->get_conexion();

/*
lista de usuarios  = opcion 1
agregar / Actualizar   = opcion 2
eliminar  = opcion 4
consulta por usuario = opcion 5

$_GET  = no  encriptado.
$_POST = encriptado
$_REQUEST = ambos ($_GET, $_POST)
*/
$opcion =  $_REQUEST['op'];

switch ($opcion) {
	case 1:

 //Creación de Consulta
 $query     = "SELECT 
  
 id,
 nombres,
 apellidos,
 DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') fecha_nacimiento

  FROM usuario";
 $statement = $conexion->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll(PDO::FETCH_ASSOC);

 //Creación de JSON
 $data = array();

 foreach ($result as $key => $value) {
 	 

 $data[] = [

 'id'=>$value['id'],
 'nombres'=>$value['nombres'],
 'apellidos'=>$value['apellidos'],
 'fecha_nacimiento'=>$value['fecha_nacimiento'],
 'acciones'=>' 
 
  <button class="btn btn-info btn-sm btn-edit" 
  data-id="'.$value['id'].'" >
  <i class="fa fa-edit"></i>
  </button>

  '

 ];


 }

 $json = ['data'=>$data];

 echo json_encode($json);

		break;
	case 2:
    
	$nombres          = trim($_REQUEST['nombres']);
	$apellidos        = trim($_REQUEST['apellidos']);
	$fecha_nacimiento = $_REQUEST['fecha_nacimiento'];

    if($_REQUEST['tipo']=='agregar')
    {
    
    //Agregar

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



    }
    else
    {

    //Actualizar
    
    $id = $_REQUEST['id'];

	try {
		
    $query =  "UPDATE  usuario SET 
    nombres=:nombres,
    apellidos=:apellidos,
    fecha_nacimiento=:fecha_nacimiento 
    WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombres',$nombres);
    $statement->bindParam(':apellidos',$apellidos);
    $statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
    $statement->bindParam(':id',$id);
    $statement->execute();
    echo "ok";



	} catch (Exception $e) {
		
    echo "Error: ".$e->getMessage();

	}




    }


	

		break;
    case 3:
	echo "actualizar";
		break;
	case 4:
	echo "eliminar";
		break;

	case 5:
     
     $id = $_REQUEST['id'];

     try {
    
     $query =  "SELECT * FROM usuario WHERE id=:id";
     $statement = $conexion->prepare($query);
     $statement->bindParam(':id',$id);
     $statement->execute();
     $result    = $statement->fetch(PDO::FETCH_ASSOC);

     echo json_encode($result);
 

     	
     } catch (Exception $e) {
     	
     echo "Error: ".$e->getMessage();

     }


	break;
    
	default:
	echo "no existe la opción";
		break;
}



 ?>