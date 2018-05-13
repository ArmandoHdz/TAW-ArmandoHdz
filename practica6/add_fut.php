<?php 
	//se llama al archivo de funciones de gestion
	include_once('gestion.php');

  //comprueba si se llamo al metodo post
	if($_POST){
    //se obtienen los datos del formulario
		$nombre = $_POST['nombre'];
		$posicion = $_POST['posicion'];
		$dorsal = $_POST['dorsal'];
		$carrera = $_POST['carrera'];
		$email = $_POST['email'];
    //se ejecuta la funcionn de agregar
		Add('futbolistas',$nombre, $posicion, $dorsal, $carrera, $email);
    //se confirma el agregado y se redirecciona la pagina
		echo '<script> window.location = "futbol.php"; </script>';
		die();
		
	}
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
        <h3>Agregar registro de Futbolista</h3>
        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                Nombre: <input type="text" name="nombre" value="">
                <br>
                Posicion: <input type="text" name="posicion" value="">
                <br>
                Dorsal: <input type="number" name="dorsal" value="">
                <br>
                Carrera: <input type="text" name="carrera" value="">
                <br>
                Email: <input type="text" name="email" value="">
                <br>
                <input type="submit" name="submit" value="Agregar">
            </form>
              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>