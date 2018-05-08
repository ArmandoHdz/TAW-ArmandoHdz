<?php 

	$maestro = array(
		'num' => $_POST['num'],
		'carrera' => $_POST['carrera'],
		'nombre' => $_POST['nombre'],
		'telefono' => $_POST['telefono']
	);

	$fichero = fopen('maestros.txt','a');
	fputs($fichero, "\n".$maestro['num']);
	fputs($fichero, "\n".$maestro['carrera']);
	fputs($fichero, "\n".$maestro['nombre']);
	fputs($fichero, "\n".$maestro['telefono']);
	fclose($fichero);

	header('Location: maestros.php');



 ?>