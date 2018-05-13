<?php 
	//se llama al archivo de conexion
	include_once('conexion.php');
	//se hace la conexion con la base de datos indicada
	$conexion = BDConnection('practica6_2');

	//funcion que obtiene los datos de los jugadores dependiendo de la tabla seleccionada
	function getJugadores($tabla_jugadores){
		global $conexion;
		$jugadores = $conexion->prepare('SELECT * from '.$tabla_jugadores);
		//$jugadores->bindParam(':tabla_jugadores',$tabla_jugadores);
		$jugadores->execute();		
		return $jugadores;
	}
	//funcion que regresa los datos de un solo jugador
	function getPlayer($tabla_jugadores, $id_player){
		global $conexion;
		$player = $conexion->prepare('SELECT * from '.$tabla_jugadores.' where id = :id_player');
		$player->bindParam(':id_player',$id_player);
		$player->execute();		
		return $player->fetchAll();
	}

	//funcion que añade un nuevo jugador a la tabla indicada
	function Add($tabla_jugadores, $nombre, $posicion, $dorsal, $carrera, $email){
		global $conexion;
		$add_player = $conexion->prepare('INSERT INTO '.$tabla_jugadores.' (nombre, posicion, dorsal, carrera, email) values (:nombre, :posicion, :dorsal, :carrera, :email)');
		//se hace referencia a los parametros de la consulta con las variables
		$add_player->bindParam(':nombre', $nombre);
		$add_player->bindParam(':posicion', $posicion);
		$add_player->bindParam(':dorsal', $dorsal);
		$add_player->bindParam(':carrera', $carrera);
		$add_player->bindParam(':email', $email);
		//se ejecuta la consulta
		$add_player->execute();
		echo '<script> alert("Se añadio un jugador a la tabla de '.$tabla_jugadores.'"); </script>';

	}

	//funcion que actualiza un jugador a la tabla indicada
	function Update($tabla_jugadores, $id_player, $nombre, $posicion, $dorsal, $carrera, $email){
		global $conexion;
		$update_player = $conexion->prepare(
			'UPDATE '.$tabla_jugadores.' SET nombre = :nombre, posicion = :posicion, dorsal = :dorsal, carrera = :carrera, email = :email where id = :id_player');
		//se hace referencia a los parametros de la consulta con las variables
		$update_player->bindParam(':nombre', $nombre);
		$update_player->bindParam(':posicion', $posicion);
		$update_player->bindParam(':dorsal', $dorsal);
		$update_player->bindParam(':carrera', $carrera);
		$update_player->bindParam(':email', $email);
		$update_player->bindParam(':id_player', $id_player);
		//se ejecuta la consulta
		$update_player->execute();
		echo '<script> alert("Se actualizo un jugador en la tabla de '.$tabla_jugadores.'"); </script>';

	}

	//funcion que elimina un jugador de la tabla indicada
	function Delete($tabla_jugadores, $id_player){
		global $conexion;
		$delete_player = $conexion->prepare('DELETE FROM '.$tabla_jugadores.' where id = :id_player');
		//se hace referencia a los parametros de la consulta con las variables
		$delete_player->bindParam(':id_player', $id_player);
		//se ejecuta la consulta
		$delete_player->execute();
		echo '<script> alert("Se eliminó un jugador de la tabla de '.$tabla_jugadores.'"); </script>';
	}


 ?>