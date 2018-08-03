<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		/*muestra todos los posibles enlaces en los que navega la pagina*/

		if($enlaces == "login" || $enlaces == "visitas" || $enlaces == "salir" || $enlaces == "vista_grupo" || $enlaces == "grupos_teacher" ||
		   $enlaces == "teachers" || $enlaces == "agregar_teacher" || $enlaces == "editar_teacher" || $enlaces == "eliminar_teacher" ||
		   $enlaces == "grupos" || $enlaces == "agregar_grupo" || $enlaces == "editar_grupo" || $enlaces == "eliminar_grupo" || 
		   $enlaces == "unidades" || $enlaces == "agregar_unidad" || $enlaces == "editar_unidad" || $enlaces == "eliminar_unidad" || 
		   $enlaces == "agregar_alumno" || $enlaces == "editar_alumno" || $enlaces == "eliminar_alumno" || $enlaces == "alumnos_teacher" ||
		   $enlaces == "actividades" || $enlaces == "agregar_actividad" || $enlaces == "editar_actividad" || $enlaces == "eliminar_actividad" ||
		   $enlaces == "agregar_visita" || $enlaces == "eliminar_visita" || $enlaces == "historial"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else{

			$module =  "views/modules/login.php";
		
		}

		return $module;
	}

}

?>