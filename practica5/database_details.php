<?php 
    
    include_once('conexion.php');

    $conexion = mysqli_connect($servidor, $username, $password, $database) or die ('No se conecto');

    $cantidad = 0;

    function getDatos(){

        global $conexion, $cantidad;

        $datos = mysqli_query($conexion, "SELECT * FROM Persona");  

        $cantidad = mysqli_num_rows($datos);

        return $datos;
    }
    function getCantidad(){
        global $cantidad;
        return $cantidad;

    }
    ?>

    <script>
        function update(){
            alert('entra');

            <?php 
                $nombre = $_GET['nombre'];
                $correo = $_GET['correo'];
                $id = $_GET['id'];

                $actualizar = mysqli_query($conexion, "UPDATE Persona set nombre = '".$nombre."', correo = '".$correo."' WHERE id = ". $id);

            ?>
        }
    </script>

    <?php

    function upd(){
        //global $conexion;

        //echo "<script> alert('holas'); </script>";
        

        /*if($actualizar){
            ?><script> alert('Se actualizo'); </script><?php
        }
        else{
            ?> <script> alert('No actualizo'); </script> <?php
        }*/
        
        //header('Location: index.php');

    }
 ?>