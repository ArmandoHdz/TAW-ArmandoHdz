<?php
include_once('database_details.php');
//$user_access = [];
$user_access = getDatos();
$total_users = getCantidad();
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
 
      <div class="large-9 columns">
        <h3>Ejemplos de listado en array</h3>
          <p>Listado</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Correo</th>
                    <th width="250">Acción</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $user_access as $id => $user ){ ?>
                  <tr>
                    <td><?php echo $user['Id'] ?></td>
                    <td><?php echo $user['nombre'] ?></td>
                    <td><?php echo $user['correo'] ?></td>
                    <td><a href="./detalles_usuario.php?Id=<?php echo $id; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                    <td><a href="./delete.php?Id=<?php echo $user['Id']; ?>" class="button radius tiny secondary">Eliminar</a></td>
                  </tr>

                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>