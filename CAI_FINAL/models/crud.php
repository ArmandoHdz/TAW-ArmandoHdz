<?php 

	#se llama al archivo donde se encuentra la clase de conexion
	include_once "conexion.php";

	/**
	 * 
	 */
	class CRUD extends Conexion
	{
		#MODELO DE VISTA DE LA TABLA DE PAGOS EN LA PAGINA PUBLICA
		
		#Verificacion de Ingreso de usuario al sistema
		public function ingresaUsuariosModel($username, $password){
			#se verifican los datos
			$login = Conexion::conectar()->prepare(
				'SELECT tipo FROM Teacher WHERE username = :username and password = :password');
			$login->bindParam(':username', $username, PDO::PARAM_STR);
			$login->bindParam(':password', $password, PDO::PARAM_STR);
			//$login->execute();

			if($login->execute())
				return $login->fetchColumn();
			else
				return 'error';
		}

		public function vistaTeachersModel(){
			$teachers = Conexion::conectar()->prepare(
				'SELECT * FROM Teacher WHERE tipo = 2');
			$teachers->execute();

			return $teachers->fetchAll();
		}

		public function registroTeacherModel($datos){
			$user = Conexion::conectar()->prepare(
				'SELECT COUNT(*) FROM Teacher WHERE username = :username');
			$user->bindParam(':username', $datos['username'], PDO::PARAM_STR);
			$user->execute();

			if($user->fetchColumn() == 0){
				$nuevo = Conexion::conectar()->prepare(
				'INSERT INTO Teacher(nombre_completo, username, password, tipo) VALUES(:nombre, :username, :password, 2)');
				$nuevo->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
				$nuevo->bindParam(':username', $datos['username'], PDO::PARAM_STR);
				$nuevo->bindParam(':password', $datos['password'], PDO::PARAM_STR);
				if($nuevo->execute())
					return 'success';
				else
					return 'error';
			}
			else
				return 'existe';
		}

		public function getTeacherModel($id_teacher){
			$teacher = Conexion::conectar()->prepare(
				'SELECT * FROM Teacher WHERE id_teacher = :id_teacher');
			$teacher->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
			$teacher->execute();

			return $teacher->fetchAll();
		}

		public function actualizarTeacherModel($datos, $username_){
			$user = Conexion::conectar()->prepare(
				'SELECT COUNT(*) FROM Teacher WHERE username = :username');
			$user->bindParam(':username', $datos['username'], PDO::PARAM_STR);
			$user->execute();

			if($user->fetchColumn() == 0 || $datos['username'] == $username_){
				$update = Conexion::conectar()->prepare(
				'UPDATE Teacher SET nombre_completo = :nombre, username = :username, password = :password WHERE id_teacher = :id_teacher');
				$update->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
				$update->bindParam(':username', $datos['username'], PDO::PARAM_STR);
				$update->bindParam(':password', $datos['password'], PDO::PARAM_STR);
				$update->bindParam(':id_teacher', $datos['id'], PDO::PARAM_INT);
				if($update->execute())
					return 'success';
				else
					return 'error';
			}
			else
				return 'existe';
		}

		public function eliminaTeacherModel($id_teacher){
			$delete = Conexion::conectar()->prepare(
				'DELETE FROM Teacher WHERE id_teacher = :id_teacher');
			$delete->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
			$delete->execute();
		}
		
	}
?>