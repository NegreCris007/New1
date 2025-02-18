<?php 
// Incluir la conexión de base de datos
require "../config/Conexion.php";

class Almacen {
    // Implementamos nuestro constructor
    public function __construct() {}

    // Método insertar registro
    public function insertar($nombre, $descripcion, $idtienda ) {
       
        $sql = "INSERT INTO almacen (nombre, descripcion, idtienda) 
                VALUES ('$nombre','$descripcion','$idtienda')";
        return ejecutarConsulta($sql);
    }

    public function editar($idalmacen, $nombre, $descripcion) {
        $sql = "UPDATE almacen SET nombre='$nombre', descripcion='$descripcion'
                WHERE idalmacen='$idalmacen'";
        return ejecutarConsulta($sql);
    }

    public function desactivar($idalmacen) {
        $sql = "UPDATE almacen SET fechacreada='0' WHERE idalmacen='$idalmacen'";
        return ejecutarConsulta($sql);
    }

    public function activar($idalmacen) {
        $sql = "UPDATE almacen SET fechacreada='1' WHERE idalmacen='$idalmacen'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar registros
    public function mostrar($idalmacen) {
        $sql = "SELECT * FROM almacen WHERE idalmacen='$idalmacen'";
        return ejecutarConsultaSimpleFila($sql);
    }

   


       // Método para listar todos los artículos
       public function listar() {
        // $sql = "SELECT a.nombre as nombre, a.codigo as codigo, a.descripcion as descripcion, a.marca as marca, a.modelo as modelo, a.puerto as puerto, a.generacion as generacion, a.ram as ram, a.rom as rom, c.nombre as idcategoria, a.fechacreada as fechacreada FROM articulo as a INNER JOIN categoria as c ON a.idcategoria  = c.idcategoria";
          $sql = "SELECT a.idalmacen, a.nombre, a.descripcion, c.nombre AS tienda
                        
                  FROM almacen AS a 
                  INNER JOIN tienda AS c ON a.idtienda = c.idtienda";
          return ejecutarConsulta($sql);
      }
  

    // Listar y mostrar en select
    public function select() {
        $sql = "SELECT * FROM almacen";
        return ejecutarConsulta($sql);
    }

    public function regresaRolDepartamento($idalmacen) {
        $sql = "SELECT nombre FROM almacen WHERE idalmacen='$idalmacen'";
        return ejecutarConsulta($sql);
    }

    public function eliminar($idalmacen) {
        $sql = "DELETE FROM almacen WHERE idalmacen='$idalmacen'";
        return ejecutarConsulta($sql);
    }

    // Método para listar Organización en un select (dropdown)
    public function selectTienda() {
        $sql = "SELECT * FROM tienda";
        return ejecutarConsulta($sql);
    }
}
?>
