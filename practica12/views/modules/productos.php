 <?php 

 	if(!isset($_SESSION['validar'])){

		echo '<script> alert("No haz iniciado sesion") </script>';
		echo '<script> window.location = "index.php"; </script>';
 		//header('Location:dashboard.php');
 	}



  ?>

  <section class="content">
    <div class="container-fluid">
	    <div class="card">
	      <div class="card-header">
	        <h3 class="card-title">Productos en Stock</h3>
	      </div>
	      <!-- /.card-header -->
	      <div class="card-body">
	        <table id="example1" class="table table-bordered table-striped">
	          <thead>
	          <tr>
	          	<th>Id</th>
	          	<th>Codigo</th>
	            <th>Nombre</th>
	            <th>Precio</th>
	            <th></th>
	          </tr>
	          </thead>
	          <tbody>
	          <?php 

	          $mvc = new MvcController();
	          $mvc -> vistaProductosController(); 

	         ?> 
	          
	          </tbody>
	          
	        </table>
	      </div>
	      <!-- /.card-body -->
	    </div>
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>