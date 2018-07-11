
<?php

class Conexion{

	public function conectar(){

		return new PDO("mysql:host=localhost;dbname=DB_CAI","root",""); 

	}

}

?>
