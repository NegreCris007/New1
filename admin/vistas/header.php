<?php 
if (strlen(session_id())<1) 
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de Control</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3 -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.css">
  <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="../public/img/favicon.ico">

  <!-- DATATABLES -->
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
  <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
  <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

  <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">


  <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="../public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
  
    <!-- iCheck -->
    <link href="../public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../public/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../public/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../public/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../public/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="escritorio.php" class="logo">
      <span class="logo-mini"><b> Menú</b> </span>
      <span class="logo-lg"><b></b>INVENTARIO</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Navegación</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $_SESSION['nombre'].' '.$_SESSION['departamento']; ?>
                  <small>Desarrollo de sistemas informáticos</small>
                </p>
              </li>
              
              
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" style="width: 50px; height: 50px;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombre']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MENÚ DE NAVEGACIÓN</li>

        <li><a href="escritorio.php"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a></li>
      
        <!--<?php if ($_SESSION['tipousuario']=='Administrador') { ?>-->
          <li class="treeview">
            <a href="#">
              
              <i class="fa fa-folder"></i> <span>Usuario</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="usuario.php"><i class="fa fa-circle-o"></i> <span> Usuarios</span></a></li>
              <li><a href="tipousuario.php"><i class="fa fa-circle-o"></i> Tipo Usuario</a></li>
              <li><a href="departamento.php"><i class="fa fa-circle-o"></i> Departamento</a></li>
            </ul>
          </li>
         

          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Logística</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Articulo</a></li>
              <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categoria</a></li>
              <li><a href="organizacion.php"><i class="fa fa-circle-o"></i> Organización</a></li>
              <li><a href="tienda.php"><i class="fa fa-circle-o"></i> Tienda</a></li>
              <li><a href="almacen.php"><i class="fa fa-circle-o"></i> Almacen</a></li>
              <li><a href="salida.php"><i class="fa fa-circle-o"></i> salida</a></li>
            </ul>
          </li>
         

          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i><span>Entrada</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="tienda.php"><i class="fa fa-circle-o"></i> Tienda</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Reportes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="asistencia.php"><i class="fa fa-circle-o"></i> Registro</a></li>
              <li><a href="rptasistencia.php"><i class="fa fa-circle-o"></i> Reportes</a></li>
            </ul>
          </li>
        <?php } ?>

        <?php if ($_SESSION['tipousuario']!='Administrador') { ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Reportes</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="asistenciau.php"><i class="fa fa-circle-o"></i> Registro</a></li>
              <li><a href="rptasistenciau.php"><i class="fa fa-circle-o"></i> Reportes</a></li>
            </ul>
          </li>
        <?php } ?>

        <!-- Opción para cerrar sesión -->
        <li><a href="usuario.php?op=salir"><i class="fa fa-sign-out"></i> <span>Cerrar Sesión</span></a></li>


      </ul>
    </section>
  </aside>
</div>
</body>
</html>
