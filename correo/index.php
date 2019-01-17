<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Envío de Correo</title>
<!-- Bootstrap 4.1 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" >
<script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>

<!-- Font Awesome (Iconos) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>
<body>

<div class="container-fluid">

<div class="row">
	
<div class="col-md-12">

<form  id="envio" autocomplete="off">

<h1>Enviar Correo</h1><hr>

<div class="form-group">
<label>Nombres y Apellidos</label>
<input type="text" name="nombres"  class="form-control" required>
</div>
	
<div class="form-group">
<label>Correo</label>
<input type="email" name="correo"  class="form-control" required>
</div>

<div class="form-group">
<label>Asunto</label>
<input type="text" name="asunto" class="form-control" required>
</div>

<div class="form-group">
<label>Comentario</label>
<textarea name="comentario"  rows="3" class="form-control" required></textarea>
</div>

<button class="btn btn-primary">Enviar</button>


</form>	




</div>

</div>	

</div>
	

<script>
	
//Enviar Correo
$('#envio').on('submit',function (e){

parametros = $(this).serialize();

$.ajax({

url:'send.php',
type:'POST',
data:parametros,
beforeSend:function(){

swal({
 
  title:"Cargando",
  text: "Espere un momento no cierre la ventana",
  imageUrl: '../crud/img/loader2.gif',
  showConfirmButton:false

});


},
success:function(){

swal({
 
  title:"Buen Trabajo",
  text: "Mensaje Enviado",
  type: 'success',
  timer: 3000,
  showConfirmButton:false

});



}



});



e.preventDefault();
});



</script>
</body>
</html>