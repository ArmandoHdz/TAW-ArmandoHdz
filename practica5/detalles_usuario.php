<?php
include_once('database_details.php');
$id = isset( $_GET['Id'] ) ? $_GET['Id'] : '';

$user_access = getDatos();

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-12 columns">

        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                  <div class="row">
 
                  <div class="large-10 columns">
                    <h3>Detalles Alumno</h3>
                    
                    <div class="section-container tabs" data-section>
                      <section class="section">
                        <div class="content" data-slug="panel1">
                          <form>
                            <?php 
                            foreach ($user_access as $key => $user){
                                if($id == $key){ ?>
                                    Id: <input type="text" name="id" value="<?php echo $user['Id'] ?>" disabled>
                                    <br>
                                    Nombre: <input type="text" name="nombre" value="<?php echo $user['nombre'] ?>">
                                    <br>
                                    Correo: <input type="text" name="correo" value="<?php echo $user['correo'] ?>">
                                    <br>
                                    <input type="button" onclick="update();"  value="Guardar">
                            <?php } } ?>
                        </form>       
                        </div>
                      </section>
                    </div>
                  </div>

                </div>
              <div class="row">
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>