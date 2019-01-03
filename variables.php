<?php 

//Variables
//$nombres = "Luis Augusto";
$nombres = 'Luis Claudio';
$edad    = 28;
$talla   = 1.65;
$estado  = true;
$fecha   = "2018-11-22";
$hora    = "18:59:12";

$lenguajes = array
(
'Luis Claudio',
28,
1.65,
true,
"2018-11-22",
"18:59:12"
	);

//echo $lenguajes[5];

foreach ($lenguajes as $key => $value) {
	
    echo $key." ".$value."<br>";

}




 ?>