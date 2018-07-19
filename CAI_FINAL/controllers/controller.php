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
			//echo '<script>alert("aqui");</script>';

			$login = CRUD::ingresaUsuariosModel($_POST['username'], $_POST['password']);

			#se verifica que el nombre de usuario y la contraseña sea 'admin'
			if($login == 1){
				$_SESSION['validar'] = true;
				echo "<script> window.location = 'index.php?user=admin&pass=".$_POST['password']."&action=visitas'; </script>";
			}
			else if($login == 2){
				$_SESSION['validar'] = true;
				echo "<script> window.location = 'index.php?user=teacher&action=asistencias'; </script>";
			}
			else{
				echo "<script> window.location = 'index.php?action=error'; </script>";
			}
		}
	}
	public function vistaTeachersController(){
		$teachers = CRUD::vistaTeachersModel();

		foreach($teachers as $row => $item){ 
			echo'<tr>
					<td>'.$item["id_teacher"].'</td>					
					<td>'.$item["nombre_completo"].'</td>
					<td style="text-align: center;"><a href="index.php?user=admin&action=editar_teacher&id='.$item["id_teacher"].'&username='.$item["username"].'"><button class="btn btn-warning">Editar</button></a></td>
					<td style="text-align: center;"><a href="index.php?user=admin&action=eliminar_teacher&id='.$item["id_teacher"].'"><button class="btn btn-danger">Eliminar</button></a></td>';

		}
	}
	public function agregarTeacherController(){

		echo '  <div class="card-body">
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" required name="nombre" placeholder="Nombre Completo">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" required name="username" placeholder="Nombre de Usuario">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="password" class="form-control" required name="password" placeholder="Contraseña">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="password" class="form-control" required name="password2" placeholder="Confirmar Contraseña">
	                </div>
	              </div>	              
	            </div>
	            <!-- /.card-body -->
	            <div class="card-footer">
	              <button type="submit" class="btn btn-success">Agregar Teacher</button>
	              <a href="index.php?user=admin&action=teachers" class="btn btn-default">Cancelar</a>
	            </div>';
	}
	public function registroTeacherController(){
		if(isset($_POST["nombre"])){

			if($_POST['password'] == $_POST['password2']){
				$datosTeacher = array( "nombre"=>strtoupper($_POST["nombre"]), 
								      "username"=>$_POST["username"],
								  	  "password"=>$_POST["password"]);

				$respuesta = CRUD::registroTeacherModel($datosTeacher);
				echo '<script> window.location = "index.php?user=admin&action=teachers&status='.$respuesta.'"; </script>';
			}
			else
				echo '<script> window.location = "index.php?user=admin&action=agregar_teacher&status=password"; </script>';	
		}

	}
	public function editarTeacherController(){

		$teacher = CRUD::getTeacherModel($_GET['id']);

		echo '  <div class="card-body">
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" required name="nombre" placeholder="Nombre Completo" value="'.$teacher[0]['nombre_completo'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" required name="username" placeholder="Nombre de Usuario" value="'.$teacher[0]['username'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="password" class="form-control" required name="password" placeholder="Contraseña" value="'.$teacher[0]['password'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="password" class="form-control" required name="password2" placeholder="Confirmar Contraseña" value="'.$teacher[0]['password'].'">
	                </div>
	              </div>	              
	            </div>
	            <!-- /.card-body -->
	            <div class="card-footer">
	              <button type="submit" class="btn btn-success">Actualizar Información</button>
	              <a href="index.php?user=admin&action=teachers" class="btn btn-default">Cancelar</a>
	            </div>';
	}
	public function actualizarTeacherController(){
		if(isset($_POST["nombre"])){

			if($_POST['password'] == $_POST['password2']){
				$datosTeacher = array("id" => $_GET['id'], 
									  "nombre"=>strtoupper($_POST["nombre"]), 
								      "username"=>$_POST["username"],
								  	  "password"=>$_POST["password"]);

				$respuesta = CRUD::actualizarTeacherModel($datosTeacher, $_GET['username']);
				echo '<script> window.location = "index.php?user=admin&action=teachers&status='.$respuesta.'"; </script>';
			}
			else
				echo '<script> window.location = "index.php?user=admin&action=editar_teacher&status=password"; </script>';	
		}

	}
	public function eliminaTeacherController(){
		if(isset($_POST['password'])){
			if($_POST['password'] == $_SESSION['password']){
				CRUD::eliminaTeacherModel($_GET['id']);
				echo '<script> window.location = "index.php?user=admin&action=teachers&status=borrado"; </script>';
			}
			else
				echo '<script> window.location = "index.php?user=admin&action=eliminar_teacher&id='.$_GET["id"].'&status=password"; </script>';
		}
	}
	



}
////
?>