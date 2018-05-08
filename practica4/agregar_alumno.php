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
        <h3>Agregar Alumno</h3>
        
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post" action="code_alumno.php">
                Matricula: <input type="text" name="matricula" value="">
                <br>
                Nombre: <input type="text" name="nombre" value="">
                <br>
                Carrera: <input type="text" name="carrera" value="">
                <br>
                Email: <input type="text" name="email" value="">
                <br>
                Telefono: <input type="number" name="telefono" value="">
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
              
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>