<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Usuarios</title>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body>

<table id="consulta" >

<thead>
<tr>
	
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha de Nacimiento</th>

</tr>
</thead>


</table>


<script>
$(document).ready(function() {
    $('#consulta').DataTable( {
        "ajax": 'data.php'
    } );
} );
</script>
</body>
</html>				