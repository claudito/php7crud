<?php 

//variables:
$numero1   = 100;
$numero2   = 0;
$resultado = "";

//Suma
$resultado = $numero1 + $numero2;
echo "La suma es: ".$resultado;
echo "<br>";
//Resta
$resultado = $numero1 - $numero2;
echo "La resta es: ".$resultado;
echo "<br>";
//Multiplicación
$resultado = $numero1 * $numero2;
echo "La Multiplicación es: ".$resultado;
echo "<br>";
//División
//$resultado = $numero1 / $numero2;
//echo "La División es: ".$resultado;
//echo "<br>";

//Operador Ternario
$resultado = ($numero2==0) ? "No se permite división entre Cero" : $numero1/$numero2 ;
echo "La División es: ".$resultado;


 ?>