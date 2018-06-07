<div class="login">
  <br><br><br>
  <div class="card card-info">
    <div class="card-header">
      <h1 class="card-title" align="center">Control de Inventarios</h1>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form class="form-horizontal" method="post">
      <br><br>
      <div class="card-body">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer" align="center">
        <button type="submit" class="btn btn-success">Ingresar</button>
      </div>
      <br>
      <!-- /.card-footer -->
    </form>
  </div>
</div>

<?php

$ingreso = new MvcController();
$ingreso -> ingresaUsuarioController();

if(isset($_GET["action"])){
	if($_GET["action"] == "fallo"){
		echo "Fallo al ingresar";
	}
}
//include_once('links/link2.php');

?>