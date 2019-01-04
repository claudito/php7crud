<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sweet Alert</title>

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

</head>
<body>

<script>

//Alerta Mensaje Cargando
/*
swal({
 
  title:"Cargando",
  text: "Espere un momento no cierre la ventana",
  imageUrl: 'img/loader2.gif',
  showConfirmButton:false

});*/

/*
tipos:
success
error
info
warning

*/

//Mensaje de Confirmación
swal({
 
  title:"Buen Trabajo",
  text: "Registro Agregado",
  type: 'success',
  timer: 3000,
  showConfirmButton:false

});


</script>

	
</body>
</html>