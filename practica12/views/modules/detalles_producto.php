 <?php 

 	if(!isset($_SESSION['validar'])){

		echo '<script> alert("No haz iniciado sesion") </script>';
		echo '<script> window.location = "index.php"; </script>';
 		//header('Location:dashboard.php');
 	}



  ?>

  <section class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-12">
			  	<div class="card card-info">	
		          <div class="card-header">
		            <h3 class="card-title">Detalles de Producto</h3>
		          </div>
		          <div class="row">
		          	  <div class="col-sm-4" align="center">
			      			          
				            <div class="card-body">
				              <a href="index.php?action=agregar_stock&id=<?php echo $_GET['id']; ?>"><button class="btn btn-success">Agregar a Stock</button></a>
				              <a href="index.php?action=eliminar_stock&id=<?php echo $_GET['id']; ?>"><button class="btn btn-danger">Eliminar de Stock</button></a>
				            </div>		
				            <br><br>		        
				            <img src="package.jpg" width="150">  
				        
					  </div>
			          <div class="col-sm-8">
				          <!-- /.card-header -->
				          <!-- form start -->
				          <form class="form-horizontal" style="text-align: center;" method="post">
				            <?php 

				            	$mvc = new MvcController();
				            	$mvc -> detallesProductosController();
				            	

				             ?>
				            <!-- /.card-footer -->
				          </form>
				      </div>

					</div>
			    </div>
		    </div>
		</div>
	  <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>