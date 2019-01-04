<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>

<!-- Bootstrap 4.1 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" >
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

<!-- Font Awesome (Iconos) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Datatable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<!-- Botón que activa el modal -->
<div class="form-group">

<button type="button" class="btn btn-primary btn-agregar">
 <i class="fa fa-plus"></i> Agregar
</button>

</div>


<!-- Tabla -->
<table id="consulta" class="table">
<thead>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha de Nacimiento</th>
</tr>
</thead>

</table>
	


	





</div>
</div>
</div>



<!-- Modal  Agregar-->
<form id="registro">
<div class="modal fade" id="modal-registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
<div class="form-group">
<label>Nombres:</label>
<input type="text" name="nombres" required class="form-control"> 
</div> 

<div class="form-group">
<label>Apellidos:</label>
<input type="text" name="apellidos" required class="form-control"> 
</div> 

<div class="form-group">
<label>Fecha de Nacimiento:</label>
<input type="date" name="fecha_nacimiento" required class="form-control"> 
</div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>
function load()
{

$(document).ready(function() {
    $('#consulta').DataTable( {
        "ajax": "sources.php?op=1",
        "columns": [
            { "data": "id" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "fecha_nacimiento" }
        ]
    } );
} );



}


load();


//Cargar Modal
$('.btn-agregar').on('click',function (){

$('#modal-registro').modal('show');

});

//Agregar Datos
$('#registro').on('submit',function (event){

parametros = $(this).serialize();

alert(parametros);



//Función que evita que el browser se recargue
event.preventDefault();
});




</script>




	
</body>
</html>