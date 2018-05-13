<?php 
	//se lama al archivo de funciones de gestion
	include_once('gestion.php');
	//se obtiene el id del jugador seleccionado
	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';

	//se ejecuta la funcion de eliminar
	Delete('basquetbolistas', $id);
	//se confirma el agregado y se redirecciona la pagina
	echo '<script> window.location = "basquet.php"; </script>';
	die();

 ?>