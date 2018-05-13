<?php
	// se hace referencia al archivo de conexion a las base de datos
	include_once('gestion.php'); 
	//se crea una nueva conexion a una tabla
	$connection = BDConnection('practica6_2');
  //se obtienen los datos de la tabla de futbolistas
  $futbol = getJugadores('futbolistas');
  //se obtienen los datos de la tabla de basquetbolistas
  $basquet = getJugadores('basquetbolistas');


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
        <div class="section-container tabs" data-section>
          <section class="section">
            <table>
              <tr>
                <th><h3>Futbolistas</h3></th>
                <th><a href="add_fut.php" class="button">Agregar</a></th>
              </tr>
            </table>
            
            <div class="content" data-slug="panel1">
              <table>
                <thead>
  		            <tr>
  		              <th width="200">Id</th>
  		              <th width="250">Nombre</th>
  		              <th width="250">Posicion</th>
                    <th width="250">Dorsal</th>
  		              <th width="250">Carrera</th>
  		              <th width="250">Email</th>
                    <th></th>
                    <th></th>
  		            </tr>
                </thead>
                <tbody>
              		<?php //se despliegan los resultados de cada una de las consultas 
                  while ($fut = $futbol->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr><td>'.$fut['id'].'</td>';
                    echo '<td>'.$fut['nombre'].'</td>';
                    echo '<td>'.$fut['posicion'].'</td>';
                    echo '<td>'.$fut['dorsal'].'</td>';
                    echo '<td>'.$fut['carrera'].'</td>';
                    echo '<td>'.$fut['email'].'</td>';
                    echo '<td><a href = "./detalles_fut.php?id='.$fut['id'].'" class="button tiny secondary"> Detalles </a></td>';
                    echo '<td><a href = "./delete_fut.php?id='.$fut['id'].'" class="button tiny secondary"> Eliminar </a></td></tr>';
                  }?>
                </tbody>
              </table>
            </div>
          </section>
          <section class="section">
            <table>
              <tr>
                <th><h3>Basquetbolistas</h3></th>
                <th><a href="add_basquet.php" class="button">Agregar</a></th>
              </tr>
            </table>
            <div class="content" data-slug="panel1">
              <table>
                <thead>
                  <tr>
                    <th width="200">Id</th>
                    <th width="250">Nombre</th>
                    <th width="250">Posicion</th>
                    <th width="250">Dorsal</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php //se despliegan los resultados de cada una de las consultas 
                    while ($bas = $basquet->fetch(PDO::FETCH_ASSOC)) {
                      echo '<tr><td>'.$bas['id'].'</td>';
                      echo '<td>'.$bas['nombre'].'</td>';
                      echo '<td>'.$bas['posicion'].'</td>';
                      echo '<td>'.$bas['dorsal'].'</td>';
                      echo '<td>'.$bas['carrera'].'</td>';
                      echo '<td>'.$bas['email'].'</td>';
                      echo '<td><a href = "./detalles_basquet.php?id='.$bas['id'].'" class="button tiny secondary"> Detalles </a></td>';
                      echo '<td><a href = "./delete_basquet.php?id='.$bas['id'].'" class="button tiny secondary"> Eliminar </a></td></tr>';
                    }?>
                    
                  </tr>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </div>

    <?php require_once('footer.php'); ?>