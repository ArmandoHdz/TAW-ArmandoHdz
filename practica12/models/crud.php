<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM users WHERE user_name = :username and user_password_hash = :password");	
		$stmt->bindParam(":username", $datosModel["username"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetch();

		$stmt->close();

	}

	public function registroProductosModel($datos){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = :nombre");
		$stmt->bindParam(':nombre', $datos['categoria'], PDO::PARAM_STR);
		$stmt->execute();
		$id_categoria = $stmt->fetchColumn();

		$stmt = Conexion::conectar()->prepare("INSERT INTO products(codigo_producto, nombre_producto, data_added, precio_producto, stock, id_categoria) VALUES (:codigo, :nombre, :fecha, :precio, :stock, :categoria)");
		$stmt->bindParam(':codigo', $datos['codigo'], PDO::PARAM_STR);
		$stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
		$stmt->bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
		$stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
		$stmt->bindParam(':stock', $datos['stock'], PDO::PARAM_INT);
		$stmt->bindParam(':categoria', $id_categoria, PDO::PARAM_INT);

		if($stmt->execute()){
			return 'success';
		}
		else{
			return 'error';
		}


	}

	#VISTA USUARIOS
	#-------------------------------------

	public function vistaProductosModel(){

		$stmt = Conexion::conectar()->prepare(
			"SELECT p.id_producto as id,
			       p.codigo_producto as codigo,
			       p.nombre_producto as nombre,
			       date(p.data_added) as fecha,
			       p.precio_producto as precio,
			       p.stock as stock,
			       c.nombre_categoria as categoria       
			FROM products as p INNER JOIN categorias as c on p.id_categoria = c.id_categoria");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}
	public function detallesProductosModel($idProd){

		$stmt = Conexion::conectar()->prepare(
			"SELECT p.id_producto as id,
			       p.codigo_producto as codigo,
			       p.nombre_producto as nombre,
			       date(p.data_added) as fecha,
			       p.precio_producto as precio,
			       p.stock as stock,
			       c.nombre_categoria as categoria       
			FROM products as p INNER JOIN categorias as c on p.id_categoria = c.id_categoria WHERE id_producto = :id");
		$stmt->bindParam(':id',$idProd,PDO::PARAM_INT);	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	public function getCategoriasModel(){
		$stmt = Conexion::conectar()->prepare("SELECT nombre_categoria FROM categorias");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	public function borrarProductoModel($id){
		$stmt = Conexion::conectar()->prepare("DELETE FROM products WHERE id_producto = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	#ACTUALIZAR RODUCTO
	#-------------------------------------

	public function actualizarProductoModel($datos){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria FROM categorias WHERE nombre_categoria = :nombre");
		$stmt->bindParam(':nombre', $datos['categoria'], PDO::PARAM_STR);
		$stmt->execute();
		$id_categoria = $stmt->fetchColumn();

		$stmt = Conexion::conectar()->prepare("UPDATE products SET codigo_producto = :codigo, nombre_producto = :nombre, data_added = :fecha, precio_producto = :precio, stock = :stock, id_categoria = :categoria WHERE id_producto = :id");


		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":categoria", $id_categoria, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, password = :password, email = :email WHERE id = :id");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}

?>