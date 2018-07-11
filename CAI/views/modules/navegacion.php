<?php

  session_start();

  $_SESSION['validar'] = true; 
  
  $_SESSION['fecha'] = date('Y-m-d');

  $hora = localtime(time()-(3600*7), true);

  $_SESSION['fecha'] = ($hora['tm_year']+ 1900).'-'.($hora['tm_mon']+1).'-'.$hora['tm_mday'];
  $_SESSION['hora'] = $hora['tm_hour'].':'.$hora['tm_min'].':'.$hora['tm_sec'];

 ?>
<!-- Navbar -->
<nav style="background-color: #175755;" class="navbar navbar-expand navbar-light border-bottom">
<!-- Left navbar links -->
	<ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <h1 style="color: white;">CAI</h1>
    </li>
      
  </ul>

  <?php 

  if(isset($_GET['page'])){ ?>

  <!-- Right navbar links >
  <ul class="navbar-nav ml-auto" >
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?action=pagos&page=admin" class="nav-link" style="color: white;">Pagos</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?action=alumnas&page=admin" class="nav-link" style="color: white;">Alumnas</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?action=grupos&page=admin" class="nav-link" style="color: white;">Grupos</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?action=salir&page=admin" class="nav-link" style="color: white;">Cerrar Sesion</a>
    </li>
  </ul-->
  

  <?php
  }
  else{ ?>

	<!-- Right navbar links >
	<ul class="navbar-nav ml-auto" >
    <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?action=inicio" class="nav-link" style="color: white;">Inicio</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index.php?action=lugares" class="nav-link" style="color: white;">Lugares</a>
    </li>
	  <li class="nav-item d-none d-sm-inline-block">
	    <a href="index.php?action=admin" class="nav-link" style="color: white;">Admin</a>
	  </li>
	</ul-->
<?php } ?>
</nav>
<!-- /.navbar -->
<div class="" align="center">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>