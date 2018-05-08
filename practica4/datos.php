<?php

	function getAlumno(){

		$fichero = fopen('alumnos.txt','a+');
		$n = 0;
		$datos = array('','','','','');
		$alumno=[];
		while(!feof($fichero)) {
			$linea = fgets($fichero);
			if($linea != "\n"){
				$datos[$n] = $linea;

				$n++;
			}
			if($n == 5){
				$alumno[] = [
					'matricula' => $datos[0],
					'nombre' => $datos[1],
					'carrera' => $datos[2],
					'email' => $datos[3],
					'telefono' => $datos[4]
				];
				$n = 0;
			}
			
		}
		fclose($fichero);

		return $alumno;
	}
	function getMaestro(){

		$fichero = fopen('maestros.txt','a+');
		$n = 0;
		$datos = array('','','','');
		$maestro = [];
		while(!feof($fichero)) {
			$linea = fgets($fichero);
			if($linea != "\n"){
				$datos[$n] = $linea;
				//echo $datos[$n];

				$n++;
			}
			if($n == 4){
				$maestro[] = [
					'num' => $datos[0],
					'carrera' => $datos[1],
					'nombre' => $datos[2],
					'telefono' => $datos[3]
				];
				$n = 0;
			}
			
		}

		
		fclose($fichero);

		return $maestro;
	}
 ?>