<?php

class Mvc{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset($_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{

			$enlaces = "index";
		}



		$respuesta = Paginas::enlacesPaginasModel($enlaces);
		include $respuesta;
	}

	public function ingresaAdminController(){
		if(isset($_POST['ingresar'])){
			#parametros de administrador
			$admin_user = "admin";
			$admin_pass = "admin";
			#se verifica que el nombre de usuario y la contraseña sea 'admin'
			if($_POST['username'] == $admin_user && $_POST['password'] == $admin_pass){
				$_SESSION['validar'] = true;
				echo "<script> window.location = 'index.php?action=pagos&page=admin'; </script>";
			}
		}
	}
	



}
////
?>