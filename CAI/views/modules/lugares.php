  <section class="content">
    <div class="container-fluid">
    	<div class="card">
	      <!-- /.card-header -->
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
    </div><!-- /.container-fluid -->
  </section>