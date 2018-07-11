 <?php 

 	if(!isset($_SESSION['validar'])){

		echo '<script> alert("No haz iniciado sesion") </script>';
		echo '<script> window.location = "index.php"; </script>';
 		//header('Location:dashboard.php');
 	}

 	



  ?>

  <section class="content">
    <div class="container-fluid">
    	<?php 

    	if(isset($_GET['status'])){
    		if($_GET['status'] == 'editado'){
    			echo '	<div class="alert alert-success alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fa fa-check"></i>Correcto !</h5>
		                  Se actualizó el pago
		                </div>';
    		}
    		else if($_GET['status'] == 'borrado'){
    			echo '	<div class="alert alert-success alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fa fa-check"></i>Correcto !</h5>
		                  El Pago se eliminó correctamente.
		                </div>';
    		}
    		else if($_GET['status'] == 'error'){
    			echo '	<div class="alert alert-danger alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fa fa-ban"></i> Error!</h5>
		                  Se produjo un error en el registro
		                </div>';
    		}
    		else{
    			echo '	<div class="alert alert-warning alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fa fa-warning"></i> Incorrecto!</h5>
		                  El Folio ingresado ya existe.
		                </div>';
    		}
    	}


    	 ?>
		<div class="row" style="padding-left: 10%; padding-right: 10%;">
    		<div class="col-sm-12">
			  	<div class="card card-info">	

		          <div class="">
		            <br><br>
		            <h3 class="">Formulario de envío de Comprobantes Festival Verano 2018</h3>
		          </div>

		          
		          <div class="card-body">
			        <table id="example1" class="table table-bordered table-striped">
			          <thead>
			          <tr>
			          	<th>ID PAGO</th>
			          	<th>NOMBRE DE LA ALUMNA</th>
			            <th>GRUPO</th>
			            <th>NOMBRE DE LA MAMA</th>
			            <th>FECHA PAGO</th>			            
			            <th>FECHA ENVIO</th>
			            <th>FOLIO</th>
			            <th>COMPROBANTE</th>
			            <th></th>
			            <th></th>
			          </tr>
			          </thead>
			          <tbody>
			          <?php 


				          $mvc = new Mvc();
				          $mvc -> vistaPagosController();

			          ?> 
			          
			          </tbody>
			          
			        </table>
			      </div>
		        </div>
		    </div>
		</div>

	    
      <!-- /.row -->
      <!-- Main row -->
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>