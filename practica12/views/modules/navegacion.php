<!--nav>
	<ul>
		<!-- Pra navegar al URL podemos hacerlo mediante la variable GET, la cual la toma del URL, se representa por el simbolo "?">
		<li><a href="index.php?action=ingresar">Ingreso</a></li>
		<li><a href="index.php?action=inventario">Inventarios</a></li>
		<li><a href="index.php?action=categorias">Categorias</a></li>
		<li><a href="index.php?action=usuarios">Usuarios</a></li>
		<li><a href="index.php?action=salir">Salir</a></li>
	</ul>
</nav-->
<?php

	session_start();

	$_SESSION['fecha'] = date('Y-m-d');


?>


<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
<!-- Left navbar links -->
	<ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Perfil</a>
      </li>
    </ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
	  <!-- Messages Dropdown Menu -->
	  <li class="nav-item d-none d-sm-inline-block">
	    <a href="" class="nav-link">Fecha de Hoy: <?php echo $_SESSION['fecha']; ?></a>
	  </li>
	  <li class="nav-item d-none d-sm-inline-block">
	    <a href="index.php?action=salir" class="nav-link">Cerrar Sesion</a>
	  </li>
	</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
	<a href="index.php?action=dashboard" class="brand-link" style="text-align: center;">
	  <span class="brand-text font-weight-light">SISTEMA INVENTARIO</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <!-- Sidebar user panel (optional) -->
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
	    <div class="image">
	      
	    </div>
	    <div class="info" style="text-align: center;">
	      <a href="" class="d-block"><?php echo $_SESSION['user']; ?></a>
	    </div>
	  </div>

	  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Inventario
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?action=productos" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?action=agregar_producto" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Agregar Producto</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Categorias
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?action=categorias" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?action=agregar_categoria" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Nueva Categoria</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Usuarios
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?action=categorias" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Usuarios Registrados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?action=agregar_categoria" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Agregar Nuevo</p>
                </a>
              </li>
            </ul>
          </li>
		 


        </ul>
      </nav>
	  <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>