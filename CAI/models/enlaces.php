<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		/*muestra todos los posibles enlaces en los que navega la pagina*/

		if($enlaces == "login"){


			$module =  "views/modules/".$enlaces.".php";
		
		}

		else{

			$module =  "views/modules/login.php";
		
		}

		return $module;
	}

}

?>