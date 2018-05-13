<?php 
	
	include_once('gestion.php');

	$id = isset( $_GET['id'] ) ? $_GET['id'] : '';
	if($_POST){
		//header('Location: ejercicio2.php');
		$nombre = $_POST['nombre'];
		$posicion = $_POST['posicion'];
		$dorsal = $_POST['dorsal'];
		$carrera = $_POST['carrera'];
		$email = $_POST['email'];
    //se ejecuta la funcion de actualizar
		Update('futbolistas',$id, $nombre, $posicion, $dorsal, $carrera, $email);
    //se confirma el agregado y se redirecciona la pagina
		echo '<script> window.location = "ejercicio2.php"; </script>';
		die();
		
	}

	$player = getPlayer('futbolistas', $id);

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 6</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h1>Ejercicio 2</h1>
        <h3>Actualizar registro de Futbolista</h3>
        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                Id: <input type="text" name="id" value="<?php echo $player[0]['id']; ?>" disabled>
                <br>
                Nombre: <input type="text" name="nombre" value="<?php echo $player[0]['nombre']; ?>">
                <br>
                Posicion: <input type="text" name="posicion" value="<?php echo $player[0]['posicion']; ?>">
                <br>
                Dorsal: <input type="number" name="dorsal" value="<?php echo $player[0]['dorsal']; ?>">
                <br>
                Carrera: <input type="text" name="carrera" value="<?php echo $player[0]['carrera']; ?>">
                <br>
                Email: <input type="text" name="email" value="<?php echo $player[0]['email']; ?>">
                <br>
                <input type="submit" name="submit" value="Guardar">
            </form>
              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>