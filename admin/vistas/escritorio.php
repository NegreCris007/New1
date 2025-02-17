<?php
// Activamos almacenamiento en el buffer. Esto permite almacenar el contenido en el buffer de salida antes de enviarlo al navegador.
ob_start();
session_start(); // Inicia la sesión para poder utilizar variables de sesión.

// Verifica si la variable de sesión 'nombre' está establecida. Si no está establecida, redirige al usuario a la página de inicio de sesión (login.php).
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php"); // Redirige al usuario no autenticado a la página de inicio de sesión.
} else {
  // Si la sesión está activa, incluye el archivo 'header.php' que probablemente contiene el encabezado HTML común para la aplicación.
  require 'header.php';
  
  // Incluye el archivo 'Usuario.php', que parece contener la clase Usuario utilizada para interactuar con los datos de usuario.
  require_once('../modelos/Usuario.php');
  
  // Crea una instancia de la clase Usuario.
  $usuario = new Usuario();
  
  // Llama al método cantidad_usuario() de la clase Usuario para obtener el número total de usuarios.
  $rsptan = $usuario->cantidad_usuario();
  
  // Obtiene el primer objeto del resultado devuelto, que debería contener la cantidad de usuarios.
  $reg = $rsptan->fetch_object();
?>

<!-- Inicia el contenedor principal del contenido -->
<div class="content-wrapper">
  <!-- Sección principal del contenido -->
  <section class="content">
    <div class="container-fluid">
   

    <section class="content-header">
          <h1>
            Dashboard
            <small>Panel de control</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Hogar</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Tiendas</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="tienda.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>Artículos<sup style="font-size: 20px"></sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="articulo.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>Usuarios</h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="usuario.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>Categorias</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="categoria.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->



    </div>


    
    <!-- Fin del contenedor fluido -->
  </section>
  <!-- Fin de la sección del contenido -->
</div>

<?php
// Incluye el archivo 'footer.php', que probablemente contiene el pie de página HTML común para la aplicación.
require 'footer.php'; 
}
// Finaliza el almacenamiento en el buffer y envía el contenido al navegador.
ob_end_flush();
?>