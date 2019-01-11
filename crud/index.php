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

<!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<!-- DataTable Export -->

<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

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
<table id="consulta" class="table table-hover">
<thead>
<tr>
<th>Id</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha de Nacimiento</th>
<th>Área</th>
<th>Acciones</th>
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
        <h5 class="modal-title" id="exampleModalLabel">zzz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


  <input type="hidden" name="id" class="id">

  <input type="hidden" name="tipo" class="tipo">
       
<div class="form-group">
<label>Nombres:</label>
<input type="text" name="nombres" required 
class="nombres form-control"> 
</div> 

<div class="form-group">
<label>Apellidos:</label>
<input type="text" name="apellidos" required 
class="apellidos form-control"> 
</div> 

<div class="form-group">
<label>Fecha de Nacimiento:</label>
<input type="date" name="fecha_nacimiento" required
 class="fecha_nacimiento form-control"> 
</div> 

<div class="form-group">
<label>Área</label>
<select name="area" class="area form-control" required></select>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="submit" value="submit" class="btn btn-primary btn-submit">
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
        "destroy":true,
        "bAutoWidth":false,
        "language":{
        
         "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"

        },
        "ajax": "sources.php?op=1",
        "columns": [
            { "data": "id" },
            { "data": "nombres" },
            { "data": "apellidos" },
            { "data": "fecha_nacimiento" },
            { "data": "area"},
            { "data": "acciones"}

        ]
    } );
} );



}


load();


//Cargar Modal Agregar
$('.btn-agregar').on('click',function (){
$('#registro')[0].reset();
$('.modal-title').html('Agregar Usuario');
$('.btn-submit').attr('value','Agregar');
$('.tipo').val('agregar');

//Cargar Áreas
url  = "sources.php?op=4";
area = '<option value="">Seleccionar</option>';
$.getJSON(url,{},function(array){

//Recorre el Array de datos
array.forEach(function (data){

area += '<option value="'+data.id+'">'+data.nombre+'</option>';

$('.area').html(area);

});


});

$('#modal-registro').modal('show');

});


//Cargar Modal Actualizar
$(document).on('click','.btn-edit',function(){
 
 $('.modal-title').html('Actualizar Usuario');
 $('.btn-submit').attr('value','Actualizar');
 $('.tipo').val('actualizar');
 id = $(this).data('id');

 url = "sources.php?op=5";

 $.getJSON(url,{'id':id},function (data){

  //Cargar Valores a los Input´s 
   $('.id').val(id);
   $('.nombres').val(data.nombres);
   $('.apellidos').val(data.apellidos);
   $('.fecha_nacimiento').val(data.fecha_nacimiento);

   
   //Cargar  Áreas
    url  = "sources.php?op=4";
    area = '<option value="'+data.id_area+'">'+data.area+'</option>';
    $.getJSON(url,{},function(array){

    array.forEach(function (data_area){

    if(data_area.id!==data.id_area)
    {

    area += '<option value="'+data_area.id+'">'+data_area.nombre+'</option>';

    }

    $('.area').html(area);


    });



    });


   $('#modal-registro').modal('show');

 });

});


//Agregar o Actualizar
$('#registro').on('submit',function (event){

parametros = $(this).serialize();

tipo       = $('.tipo').val();

if(tipo=='agregar')
{
  mensaje = "Registro Agregado";
}
else
{
  mensaje = "Registro Actualizado";
}

//envío de datos por ajax
$.ajax({

url:"sources.php?op=2",
type:"POST",
data:parametros,
beforeSend:function(){

swal({
 
  title:"Cargando",
  text: "Espere un momento no cierre la ventana",
  imageUrl: 'img/loader2.gif',
  showConfirmButton:false

});


},
success:function(data){

//Cargar Data
 load();

swal({
 
  title:"Buen Trabajo",
  text: mensaje,
  type: 'success',
  timer: 3000,
  showConfirmButton:false

});

//Limpia los valores del formulario
$('#registro')[0].reset();
//Cerrar Ventana Modal
$('#modal-registro').modal('hide');


}

});

//Función que evita que el browser se recargue
event.preventDefault();
});

//Actualizar Estado
$(document).on('click','.btn-estado',function (){

 id     = $(this).data('id');
 estado = $(this).data('estado');

 url        = "sources.php?op=3";
 parametros = {'id':id,'estado':estado};

 $.post(url,parametros,function (data){

   //Cargar Data o Grilla de datos
   load();
  

 });



});



</script>




  
</body>
</html>