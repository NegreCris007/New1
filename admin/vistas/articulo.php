<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
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
  <h1 class="box-title">Articulos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
  <div class="box-tools pull-right">
    
  </div>
</div>
<!--box-header-->
<!--centro-->
<!-- Tabla actualizada -->
<div class="panel-body table-responsive" id="listadoregistros">
  <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
    <thead>
      <tr>
        <th>Acciones</th>
        <th>Nombre</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Puerto</th>
        <th>Generación</th>
        <th>RAM</th>
        <th>ROM</th>
        <th>Categoría</th>
        <th>Fecha de creación</th>
        <th>Estado</th>
      </tr>
    </thead>
    <tbody> 
      <!-- Aquí irán los registros dinámicos -->
    </tbody>
    <tfoot>
      <tr>
      <th>Acciones</th>
        <th>Nombre</th>
        <th>Código</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Puerto</th>
        <th>Generación</th>
        <th>RAM</th>
        <th>ROM</th>
        <th>Categoría</th>
        <th>Fecha de creación</th>
        <th>Estado</th>
      </tr>
    </tfoot>   
  </table>
</div>

<!-- Formulario actualizado -->
<div class="panel-body" style="height: auto;" id="formularioregistros">
  <form action="" name="formulario" id="formulario" method="POST">
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="nombre">Nombre</label>
      <input class="form-control" type="hidden" name="idarticulo" id="idarticulo">
      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="codigo">Código</label>
      <input class="form-control" type="text" name="codigo" id="codigo" maxlength="50" placeholder="Código" required>
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="descripcion">Descripción</label>
      <input class="form-control" type="text" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="marca">Marca</label>
      <input class="form-control" type="text" name="marca" id="marca" maxlength="50" placeholder="Marca">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="modelo">Modelo</label>
      <input class="form-control" type="text" name="modelo" id="modelo" maxlength="50" placeholder="Modelo">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="puerto">Puerto</label>
      <input class="form-control" type="text" name="puerto" id="puerto" maxlength="50" placeholder="Puerto">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="generacion">Generación</label>
      <input class="form-control" type="text" name="generacion" id="generacion" maxlength="50" placeholder="Generación">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="ram">RAM</label>
      <input class="form-control" type="text" name="ram" id="ram" maxlength="50" placeholder="RAM">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="rom">ROM</label>
      <input class="form-control" type="text" name="rom" id="rom" maxlength="50" placeholder="ROM">
    </div>

    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="rom">ROM</label>
      <input class="form-control" type="text" name="rom" id="rom" maxlength="50" placeholder="ROM">
    </div>

   <!-- <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="rom">Categoria</label>
      <input class="form-control" type="text" name="categoria" id="categoria" maxlength="50" placeholder="categoria">
    </div>-->
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="">Categoria</label>
     <select name="idcategoria" id="idcategoria" class="form-control select-picker" required>     
     </select>
    </div>
    
    <div class="form-group col-lg-6 col-md-6 col-xs-12">
      <label for="rom">Serial</label>
      <input class="form-control" type="text" name="serial" id="serial" maxlength="50" placeholder="serial">
    </div>

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
      <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
    </div>
  </form>
</div>




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
 <script src="scripts/articulo.js"></script>
 <?php 
}

ob_end_flush();
  ?>