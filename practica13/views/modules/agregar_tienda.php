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
		            <h3 class="card-title">Agregar Tienda</h3>
		          </div>
		          <!-- /.card-header -->
		          <!-- form start -->
		          <div class="row">
		          	  <div class="col-sm-4">
		    			 <img src="tienda.png" width="300">
		    		  </div>
		    		  <div class="col-sm-8">
		    			 <form class="form-horizontal" style="text-align: center;" method="post">
				            <?php 

				            	$mvc = new MvcController();
				            	$mvc -> agregarTiendaController();
				            	$mvc -> registroTiendaController();
				            	
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