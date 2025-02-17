<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();


// Manejo de la opción salir
if (isset($_GET['op']) && $_GET['op'] == 'salir') {
  // Destruir todas las variables de sesión
  $_SESSION = array();

  // Si se desea destruir la sesión completamente, también hay que borrar la cookie de sesión.
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

  // Destruir la sesión
  session_destroy();

  // Redirigir a la página de login
  header("Location: login.php");
  exit();
}


if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{

require 'header.php';
 ?>
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-12">
      <div class="box">
<div class="box-header with-border">
  <h1 class="box-title">Usuarios <button class="btn btn-success" onclick="mostrarform(true)" id="btnagregar"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Login</th>
      <th>Fecha/Registro</th>
      <th>Estado</th>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <th>Opciones</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Login</th>
      <th>Fecha/Registro</th>
      <th>Estado</th>
    </tfoot>   
  </table>
</div>
<div class="panel-body" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Tipo usuario:</label>
     <select name="idtipousuario" id="idtipousuario" class="form-control select-picker" required>

     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Departamento:</label>
     <select name="iddepartamento" id="iddepartamento" class="form-control select-picker" required>
      
     </select>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Nombre:</label>
      <input class="form-control" type="hidden" name="idusuario" id="idusuario">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Apellidos:</label>
      <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
    </div>
    
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Login:</label>
      <input class="form-control" type="text" name="login" id="login" maxlength="20" placeholder="nombre de usuario" required>
    </div>
    <div class="form-group col-lg-6 col-md-6 col-xs-12" id="claves">
      <label for="">Contraseña:</label>
      <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
    </div>
    
   
    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
</div>



<!--modal para ver la venta-->
 <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 20% !important;">
     <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Cambio de contraseña</h4>
        </div>
        <div class="modal-body">
  <form action="" name="formularioc" id="formularioc" method="POST">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input class="form-control" type="hidden" name="idusuarioc" id="idusuarioc">
            <input class="form-control" type="password" name="clavec" id="clavec" maxlength="64" placeholder="Clave" required>
          </div>
          <button class="btn btn-primary" type="submit" id="btnGuardar_clave"><i class="fa fa-save"></i>  Guardar</button>
      <button class="btn btn-danger"  type="button"  data-dismiss="modal" ><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </form>

        <div class="modal-footer">
          <button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>
        </div>
</div>
</div>
</div>
<!--inicio de modal editar contraseña--->
<!--fin de modal editar contraseña--->
<!--fin centro-->
      </div>

      </div>
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
<?php 

require 'footer.php';
 ?>
 <script src="scripts/usuario.js"></script>
 <?php 
}

ob_end_flush();
  ?>