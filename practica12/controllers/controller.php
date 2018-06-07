<?php

class MvcController{

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

	public function ingresaUsuarioController(){

		if(isset($_POST['username'])){
			
			$datos = array('username' => $_POST['username'],
						   'password' => $_POST['password']);

			$respuesta = Datos::ingresoUsuarioModel($datos);

			if($respuesta['user_name'] == $_POST['username'] && $respuesta["user_password_hash"] == $_POST["password"]){
				session_start();
				$_SESSION['validar'] = true;
				$_SESSION['user'] = $respuesta['firstname'].' '.$respuesta['lastname'];
				$_SESSION['password'] = $respuesta['user_password_hash'];
				header('Location: index.php?action=dashboard');
				echo "<script>alert('entro');</script>";
			}
			else{
				header('Location: index.php?action=fallo');
			}
		}

	}

	public function agregarProductosController(){
		$categorias = Datos::getCategoriasModel();

		echo '  <div class="card-body">
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" name="codigo" placeholder="Codigo Producto">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" name="nombre" placeholder="Nombre">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="date" class="form-control" name="fecha" placeholder="Fecha">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="number" class="form-control" name="precio" placeholder="Precio">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="number" class="form-control" name="stock" placeholder="Stock Disponible">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <select type="text" class="form-control" name="categoria">';
	            foreach ($categorias as $key => $item) {
	            	echo '<option>'.$item['nombre_categoria'].'</option>';
	            }
	            echo '</select>
	            	</div>
	              </div>
	            </div>
	            <!-- /.card-body -->
	            <div class="card-footer">
	              <button type="submit" class="btn btn-success">Agregar</button></a>
	            </div>';
	}
	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroProductosController(){
		if(isset($_POST["codigo"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):

			$datosController = array( "codigo"=>$_POST["codigo"], 
								      "nombre"=>strtoupper($_POST["nombre"]),
								      "fecha"=>strtoupper($_POST["fecha"]),
								  	  "precio"=>strtoupper($_POST["precio"]),
								  	  "stock"=>strtoupper($_POST["stock"]),
								  	  "categoria"=>strtoupper($_POST["categoria"]));

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroProductosModel($datosController);

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){
				echo '<script> alert("Se Agregó correctamente") </script>';
			}

			else if($respuesta == "error"){

				echo '<script> alert("Error") </script>';
			}

			echo '<script> window.location = "index.php?action=productos"; </script>';

		}

	}

	public function borrarProductoController(){

		if(isset($_GET['id'])){
			//echo '<script> alert("'.$_POST['password'].'") </script>';
			//if($_POST['password'] == $_SESSION['password']){
			$respuesta = Datos::borrarProductoModel($_GET['id']);

			if($respuesta == 'success'){
				echo '<script> alert("Se borro el producto") </script>';
				
			}
			else{
				echo '<script> alert("Contraseña incorrecta") </script>';
			}
			echo '<script> window.location = "index.php?productos"; </script>';
			//}
		}
	}
	public function vistaProductosController(){
		$datos = Datos::vistaProductosModel();

		foreach($datos as $row => $item){ 
			echo'<tr>
					<td>'.$item["id"].'</td>					
					<td>'.$item["codigo"].'</td>
					<td><img src="package.jpg" width="30">  '.$item["nombre"].'</td>
					<td>'.$item["precio"].'</td>
					<td style="text-align: center;"><a href="index.php?action=detalles_producto&id='.$item["id"].'"><button class="btn btn-warning">Ver Detalles</button></a></td>';/*
					<td style="text-align: center;"><a href="index.php?action=borrar_producto&id='.$item["id"].'"><button class="btn btn-danger">Eliminar</button></a></td>'
					<td style="text-align: center;"><a href="index.php?action=detalles_producto&id='.$item["id"].'"><button class="btn btn-success">Agregar Stock</button></a></td>
					<td style="text-align: center;"><a href="index.php?action=detalles_producto&id='.$item["id"].'"><button class="btn btn-danger">Eliminar Stock</button></a></td>';
			echo '</tr>';*/

		}
	}
	public function detallesProductosController(){
		
		$respuesta = Datos::detallesProductosModel($_GET['id']);
		$categorias = Datos::getCategoriasModel();

		if(isset($_POST['editar'])){
			echo '<script> window.location = "index.php?action=editar_producto&id='.$_GET['id'].'"; </script>';
		}

		echo '  <div class="card-body">
	              <div class="form-group row">	              	
              		<div class="col-sm-2" align="right">
	                  <label class="control-label">ID:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control" disabled name="id" placeholder="Id" value = "'.$respuesta[0]['id'].'">
	                </div>		            
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">CODIGO:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control" name="codigo" disabled placeholder="Codigo Producto" value = "'.$respuesta[0]['codigo'].'">
	                </div>
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">NOMBRE:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control" name="nombre" disabled placeholder="Nombre" value = "'.$respuesta[0]['nombre'].'">
	                </div>
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">FECHA:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="date" class="form-control" name="fecha" disabled placeholder="Fecha" value = "'.$respuesta[0]['fecha'].'">
	                </div>
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">PRECIO:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="number" class="form-control" name="precio" disabled placeholder="Precio" value = "'.$respuesta[0]['precio'].'">
	                </div>
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">STOCK DISP.:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="number" class="form-control" name="stock" disabled placeholder="Stock Disponible" value = "'.$respuesta[0]['stock'].'">
	                </div>
	              </div>
	              <div class="form-group row">
	              	<div class="col-sm-2" align="right">
	                  <label class="control-label">CATEGORIA:</label>
	                </div>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control" name="categoria" disabled placeholder="Categoria" value = "'.$respuesta[0]['categoria'].'">
	                </div>
	              </div>
	            </div>
	            <!-- /.card-body -->
	            <div class="card-footer">
	            		<button type="submit" name="editar" class="btn btn-warning">Editar</button></a>
	              		<button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button></a>
	            </div>';
	        	
	}

	public function editarProductosController(){
		$respuesta = Datos::detallesProductosModel($_GET['id']);
		$categorias = Datos::getCategoriasModel();
		echo '  <div class="card-body">
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" disabled name="id" placeholder="Id" value = "'.$respuesta[0]['id'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" name="codigo" placeholder="Codigo Producto" value = "'.$respuesta[0]['codigo'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="text" class="form-control" name="nombre" placeholder="Nombre" value = "'.$respuesta[0]['nombre'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="date" class="form-control" name="fecha" placeholder="Fecha" value = "'.$respuesta[0]['fecha'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="number" class="form-control" name="precio" placeholder="Precio" value = "'.$respuesta[0]['precio'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <input type="number" class="form-control" name="stock" placeholder="Stock Disponible" value = "'.$respuesta[0]['stock'].'">
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="col-sm-12">
	                  <select type="text" class="form-control" name="categoria">';
	            foreach ($categorias as $key => $item) {
	            	echo '<option>'.$item['nombre_categoria'].'</option>';
	            }
	            echo '</select>
	                </div>
	              </div>
	            </div>
	            <!-- /.card-body -->
	            <div class="card-footer">';
	            //if(!$_POST){
	    		  echo '<button name="guardar" class="btn btn-success">Guardar Cambios</button></a>
	    		  		<button name="cancelar" class="btn btn-info">Cancelar</button></a>
	            </div>';
	}

	public function actualizarProductoController(){

		if(isset($_POST['cancelar'])){
			echo '<script> window.location = "index.php?action=detalles_producto&id='.$_GET['id'].'"; </script>';
		}
		else if(isset($_POST['codigo'])){
			
			$datosProd = array( "id"=>$_GET['id'],
								"codigo"=>$_POST["codigo"], 
						        "nombre"=>strtoupper($_POST["nombre"]),
						        "fecha"=>strtoupper($_POST["fecha"]),
						  	    "precio"=>strtoupper($_POST["precio"]),
						  	    "stock"=>strtoupper($_POST["stock"]),
						  	    "categoria"=>strtoupper($_POST["categoria"]));

			$respuesta = Datos::actualizarProductoModel($datosProd);

			if($respuesta == "success"){
				echo '<script>alert("Se modifico el Producto");</script>';

			}
			else{
				echo '<script>alert("Hubo un error en la ejecucion");</script>';
			}
			echo '<script> window.location = "index.php?action=detalles_producto&id='.$_GET['id'].'"; </script>';
			//Datos::
		}
	}
}
////
?>