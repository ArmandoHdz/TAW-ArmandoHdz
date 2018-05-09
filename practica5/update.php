<?php 

	include_once('conexion.php');

    $conexion = mysqli_connect($servidor, $username, $password, $database) or die ('No se conecto');


    echo 'entro';
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $actualizar = mysqli_query($conexion, "UPDATE Persona set nombre = '$nombre', correo = '$correo' WHERE id = $id");

    if($actualizar){
        ?> <script>alert('Se actualizo'); </script><?php
    }
    else{
        ?> <script>alert('No actualizo'); </script> <?php
    }

 ?>