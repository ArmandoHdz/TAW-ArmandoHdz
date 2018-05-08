<?php 

	$alumno = array(
		'matricula' => $_POST['matricula'],
		'nombre' => $_POST['nombre'],
		'carrera' => $_POST['carrera'],
		'email' => $_POST['email'],
		'telefono' => $_POST['telefono']
	);

	$fichero = fopen('alumnos.txt','a');
	fputs($fichero, "\n".$alumno['matricula']);
	fputs($fichero, "\n".$alumno['nombre']);
	fputs($fichero, "\n".$alumno['carrera']);
	fputs($fichero, "\n".$alumno['email']);
	fputs($fichero, "\n".$alumno['telefono']);
	fclose($fichero);
	
	header('Location: index.php');
	

 ?>