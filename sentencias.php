<?php 

//Sentencias de Control Múltiple
/*
a = turno mañana
b = turno tarde
c = turno noche
d = turno madrugada
*/

$turno =  "d";

switch ($turno) {
	case 'a':
echo "Turno Mañana";
		break;

	case 'b':
echo "Turno Tarde";
		break;

	case 'c':
echo "Turno Noche";
		break;


	case 'd':
echo "Turno Madrugada";
		break;
	
	default:
echo "No existe el turno";
		break;
}





 ?>