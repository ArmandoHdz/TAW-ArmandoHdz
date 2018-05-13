<?php
	// se hace referencia al archivo de conexion a las base de datos
	include_once('conexion.php'); 
	//se crea una nueva conexion a una tabla
	$connection = BDConnection('practica6_1');

	$parametros = array(0,0,0,0,0);

	//se hace la consulta a la base de datos para cada campo
	$parametros[0] = $connection->prepare('SELECT count(*) From user');
	$parametros[1] = $connection->prepare('SELECT count(*) From user_type');
	$parametros[2] = $connection->prepare('SELECT count(*) From status');
	$parametros[3] = $connection->prepare('SELECT count(*) From user_log');
	$parametros[4] = $connection->prepare('SELECT count(*) From user Where status_id = 1');

	//se ejecutan las consultas y se obtienen los resultados para cada una
	for($i=0; $i < count($parametros); $i++){
		$parametros[$i]->execute();
		$parametros[$i] = $parametros[$i]->fetchColumn();
	}

	//se obtienen las filas de la tabla de usuarios
	$user = $connection->prepare('SELECT * from user');
	$user->execute();

	$user_type = $connection->prepare('SELECT * from user_type');
	$user_type->execute();

	$user_log = $connection->prepare('SELECT user_log.id as id, user_log.date_logged as date_log, user.email as name from user_log INNER JOIN user ON user_log.user_id = user.id');
	$user_log->execute();

	$status = $connection->prepare('SELECT * from status');
	$status->execute();

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
      	<h1>Ejercicio 1</h1>
        <h3>Datos Contenidos</h3>

        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <table>
                <thead>
		            <tr>
		              <th width="200">Usuarios</th>
		              <th width="250">Tipos</th>
		              <th width="250">Status</th>
		              <th width="250">Accesos</th>
		              <th width="250">Activos</th>
		              <th width="250">Inactivos</th>
		            </tr>
                </thead>
                <tbody>
                	<tr>
                		<?php //se despliegan los resultados de cada una de las consultas ?>
                		<td><?php echo $parametros[0]; ?></td>
                		<td><?php echo $parametros[1]; ?></td>
                		<td><?php echo $parametros[2]; ?></td>
                		<td><?php echo $parametros[3]; ?></td>
                		<td><?php echo $parametros[4]; ?></td>
                		<td><?php echo $parametros[0]-$parametros[4]; ?></td>
                	</tr>
                </tbody>
              </table>
              <?php 
	              $statuss = '';
	              $tipo = ''; 
	          ?>
	          <h3>Users</h3>
              <table>
              	<thead>
              		<tr>
	          			<th width="200">Id</th>
			            <th width="250">Email</th>
			            <th width="250">Password</th>
			            <th width="250">Status</th>
			            <th width="250">Tipo de Usuario</th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php 
              		while($usuarios = $user->fetch(PDO::FETCH_ASSOC)){
              		 	echo "<tr><td>".$usuarios['id']."</td>";
              		 	echo "<td>".$usuarios['email']."</td>";
              		 	echo "<td>".$usuarios['password']."</td>";
              		 	if($usuarios['status_id']==1){$statuss = 'Activo';} else{$statuss = 'Inactivo';}
              		 	echo "<td>".$statuss."</td>";
              		 	if($usuarios['user_type_id']==1){$tipo = 'Final';} else{$tipo = 'Administrador';}
              		 	echo "<td>".$tipo."</td></tr>";
              		 } ?>
              	</tbody>
              </table>
              <h3>User_type</h3>
              <table>
              	<thead>
              		<tr>
	          			<th width="200">Id</th>
			            <th width="250">Nombre</th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php 
              		while($tipos = $user_type->fetch(PDO::FETCH_ASSOC)){
              		 	echo "<tr><td>".$tipos['id']."</td>";
              		 	echo "<td>".$tipos['name']."</td></tr>";
              		 } ?>
              	</tbody>
              </table>
              <h3>User_log</h3>
              <table>
              	<thead>
              		<tr>
	          			<th width="200">Id</th>
			            <th width="250">Fecha de ingreso</th>
			            <th width="250">Usuario</th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php 
              		while($log = $user_log->fetch(PDO::FETCH_ASSOC)){
              		 	echo "<tr><td>".$log['id']."</td>";
              		 	echo "<td>".$log['date_log']."</td>";
              		 	echo "<td>".$log['name']."</td></tr>";
              		 } ?>
              	</tbody>
              </table>
              <h3>Status</h3>
              <table>
              	<thead>
              		<tr>
	          			<th width="200">Id</th>
			            <th width="250">Nombre</th>
              		</tr>
              	</thead>
              	<tbody>
              		<?php 
              		while($st = $status->fetch(PDO::FETCH_ASSOC)){
              		 	echo "<tr><td>".$st['id']."</td>";
              		 	echo "<td>".$st['name']."</td></tr>";
              		 } ?>
              	</tbody>
              </table>

            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>