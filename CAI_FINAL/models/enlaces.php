<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		/*muestra todos los posibles enlaces en los que navega la pagina*/

		if($enlaces == "login" || $enlaces == "visitas" || $enlaces == "teachers" || $enlaces == "agregar_teacher" || 
		   $enlaces == "editar_teacher" || $enlaces == "eliminar_teacher" || $enlaces == "salir"){


			$module =  "views/modules/".$enlaces.".php";
		
		}

		else{

			$module =  "views/modules/login.php";
		
		}

		return $module;
	}

}

?>