<!--
 * Proyecto    : Sistema de gestión de rutas de la red del transporte público
 * Descripcion : Aplicacion proveedora de servicios web para visualizacion de informacion de rutas.
 * Version     : 1.
 * Autor(es)   : Ana Karen Cordova Moran
 *Editado      : Emmanuel Garcia Cerriteño 
 * Creacion    : 02-07-2015
 * Editado     : 10-08-2015
 * Decripcion
 * de clase    : documento encargado de mostrar la parte de nueva ruta.
 * Copyright © 2015, Laboratorio de CPU
-->
<html>
  <head>
	
		<title>Ejemplo</title>
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="description" content="">
		<meta name="author" content="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		
		<!-- CSS
		================================================== -->
		
		<link rel="stylesheet" href="res/css/style_body.css"/>
		
		<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=drawing"></script>-->
		
		<link rel="stylesheet" href="res/css/skeleton.css"/>
		<link rel="stylesheet" href="res/css/layout.css"/>
		
		<!--<link rel="stylesheet" href="css/comentarios.css"/>-->

    <!-- Bootstrap 3.3.2 -->
    <link href="res/css/bootstrap.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="res/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="res/css/_all-skins.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="res/css/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
		
		<script type="text/javascript" src="res/js/jquery.js"></script>
		<script type="text/javascript" src="sections/Rutas/nueva_ruta/script_nueva_ruta.js"></script>
		<script type="text/javascript" src="sections/Rutas/editar_ruta/script_editar_ruta.js"></script>
		<script type="text/javascript" src="controller/load_content.js"></script>
		<script type="text/javascript" src="sections/Rutas/borrar_ruta/script_borrar_ruta.js"></script>
		
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <!-- Toda la parte de arriba -->
      <header class="main-header">
        <a href="index.php" class="logo"><b>Inicio</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Boton para ocultar-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          </a>
        </nav>
      </header>
      <!-- Fin parte de arriba -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
 <!-- BUSCAR         <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
              <span class="input-group-btn">
   <!--      BUSCAR BOTON       <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>-->
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
						<li class="treeview">
							<a href="#">
								<i class="fa fa-laptop"></i>
								<span>Rutas</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a id="rutas" href="#"><i class="fa fa-circle-o"></i>Rutas Existentes</a></li>
								<li><a id="crear-ruta"  href="#"><i class="fa fa-circle-o"></i>Crear Ruta</a></li>
								<li><a  id="editar-ruta" href="#"><i class="fa fa-circle-o"></i>Editar Ruta</a></li>
								<li><a id="eliminar-ruta" href="#"><i class="fa fa-circle-o"></i>Eliminar Ruta</a></li>
							</ul>
						</li>
						
						
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Prueba<small>Panel de control</small></h1>
          <ol class="breadcrumb">
              <!-- deslogearse -->
            <li><a href="logout.php"><i class="active"></i>Cerrar Sesion<a/></li>
          </ol>
        </section>

        <!-- Inicio de paneles -->
          
        <section class="content"> 
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Panel 1</h3>
                  <div class="box-tools pull-right">
										<!-- minimizar maximisar -->
										<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
										
										<div >
<!--                      <p class="text-center">-->
<!--												<strong>Contenido</strong>-->
<!--                      </p>-->
                      <div id="skill">
												<div id="contenido"></div>
												<!--<div id="contenido" class="container z-index">-->
												<!--	<label>Esta es una prueba</label>-->
													<!--<div class="eight columns" data-scrollreveal="enter bottom and move 150px over 1s"></div>-->
												<!--</div>-->
											</div>
                    </div>
									</div>
                </div>
              </div>
            </div>
          </div> 
        </section>
				
					<!-- JAVASCRIPT
						================================================== -->
				
				<script type="text/javascript" src="res/js/jquery.nicescroll.min.js"></script>
				<script type="text/javascript" src="res/js/jquery.typer.js"></script>
				<script type="text/javascript" src="res/js/jquery.parallax-1.1.3.js"></script>
				<script type="text/javascript" src="res/js/jquery.counterup.min.js"></script>
				
        <!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer"></footer>
    </div><!-- ./wrapper -->
		
    <!-- Bootstrap 3.3.2 JS -->
    <script src="res/js/bootstrap.min.js" type="text/javascript"></script>
		
    <!-- FastClick -->
    <script src='res/js/fastclick.js'></script>
		
    <!-- AdminLTE App -->
    <script src="res/js/app.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="res/js/dashboard.js" type="text/javascript"></script>-->

    <!-- AdminLTE for demo purposes -->
    <script src="res/js/demo.js" type="text/javascript"></script>
  </body>
</html>