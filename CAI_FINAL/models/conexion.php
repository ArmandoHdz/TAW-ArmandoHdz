
<?php

class Conexion{

	public function conectar(){

		return new PDO("mysql:host=localhost;dbname=BD_CAI","root",""); 

	}

}

?>
