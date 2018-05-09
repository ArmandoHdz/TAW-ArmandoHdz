<?php 

	include_once('conexion.php');

	$id = isset( $_GET['Id'] ) ? $_GET['Id'] : '';
	
	$conexion = mysqli_connect($servidor, $username, $password, $database) or die ('No se conecto');

	$borrar = mysqli_query($conexion,'DELETE FROM persona WHERE Id = '.$id);


	if($borrar){
		?><script>alert('Se elimino'); </script><?php
	}
	else{
		?><script>alert('No elimino');</script><?php
	}	

?>