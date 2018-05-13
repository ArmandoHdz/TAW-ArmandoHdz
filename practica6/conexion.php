<?php 
	
	//funcion generica para la conexion a una base de datos
	function BDConnection($bd){
		$username = 'root';
		$password = '';
		$pdo = false;

		try{
			$pdo = new PDO('mysql: host=localhost; dbname='.$bd, $username, $password);
			//echo "<script> alert('Conexion exitosa'); </script>";
		}
		catch(PDOException $ex){
			print 'Error: '.$ex->getMessage().'<br>';
			die();

		}
		return $pdo;

	}

?>