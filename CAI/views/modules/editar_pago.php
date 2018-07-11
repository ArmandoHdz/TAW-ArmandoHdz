<section class="content">
    <div class="container-fluid">
    	<?php 

    	if(isset($_GET['status'])){
    		if($_GET['status'] == 'editado'){
    			echo '	<div class="alert alert-success alert-dismissible">
		                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                  <h5><i class="icon fa fa-check"></i>Correcto !</h5>
		                  Se registró un nuevo pago
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
		            <h3 class="">MODIFICAR PAGO</h3>
		          </div>

		          
		          <form class="form-horizontal" style="text-align: center;" method="post" enctype="multipart/form-data">
		          	<?php 

		          	
		          	#se crea una instancia de la clase controlador
		          	$mvc = new Mvc();
		          	$mvc -> editarPagoController();
		          	$mvc -> actualizarPagoController();

		          	?>
		            
		          </form>
		        </div>
		    </div>
		</div>
    </div><!-- /.container-fluid -->
  </section>