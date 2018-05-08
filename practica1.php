<!DOCTYPE html>
<html>
<head>
	<title>Practica 1</title>
</head>
<body>

<?php

$Persona1 = array('Nombre' => 'Armando', 'Apellido' => 'Hernandez');

echo 'Persona 1: '.$Persona1['Nombre']; ?> <br> <?php
echo 'Persona 1: '.$Persona1['Nombre']. ' '.$Persona1['Apellido'];

$Persona1['Nombre'] = 'Carlos'; ?> <br> <?php
echo 'Persona 1: '.$Persona1['Nombre']. ' '.$Persona1['Apellido']; ?> <br><br> <?php 

function mensaje($nombre, $apellido){

	$mess = 'Hello '.$nombre.' '.$apellido.'! <br>';
	$mess = $mess.$mess;
	$mess2 = 'Grettings '.$nombre.' '.$apellido;
	$mess2 = $mess2.'!!!<br>'.$mess2;

	return $mess.$mess2;

}

echo mensaje('Armando','Hernandez');



?>

</body>
</html>