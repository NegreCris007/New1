<?php 
// Incluir la conexión de base de datos
require "../config/Conexion.php";

class Articulo {

    // Constructor
    public function __construct() {}

    // Método para insertar un nuevo artículo
    public function insertar($nombre, $codigo, $descripcion, $marca, $modelo, $puerto, $generacion, $ram, $rom, $idcategoria, $idusuario) {
        date_default_timezone_set('America/Caracas');
        $fechacreada = date('Y-m-d H:i:s');
        $sql = "INSERT INTO articulo (nombre, codigo, descripcion, marca, modelo, puerto, generacion, ram, rom, idcategoria, fechacreada, idusuario) 
                VALUES ('$nombre', '$codigo', '$descripcion', '$marca', '$modelo', '$puerto', '$generacion', '$ram', '$rom', '$idcategoria', '$fechacreada', '$idusuario')";
        return ejecutarConsulta($sql);
    }

    // Método para editar un artículo existente
    public function editar($idarticulo, $nombre, $codigo, $descripcion, $marca, $modelo, $puerto, $generacion, $ram, $rom, $idcategoria, $idusuario) {
        $sql = "UPDATE articulo 
                SET nombre='$nombre', codigo='$codigo', descripcion='$descripcion', marca='$marca', modelo='$modelo', 
                    puerto='$puerto', generacion='$generacion', ram='$ram', rom='$rom', idcategoria='$idcategoria', idusuario='$idusuario' 
                WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para desactivar un artículo
    public function desactivar($idarticulo) {
        $sql = "UPDATE articulo SET estado='0' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para activar un artículo
    public function activar($idarticulo) {
        $sql = "UPDATE articulo SET estado='1' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    // Método para mostrar un artículo específico
    public function mostrar($idarticulo) {
        $sql = "SELECT *FROM articulo WHERE idarticulo='$idarticulo'";
        return ejecutarConsultaSimpleFila($sql);
    }

    // Método para listar todos los artículos
    public function listar() {
      // $sql = "SELECT a.nombre as nombre, a.codigo as codigo, a.descripcion as descripcion, a.marca as marca, a.modelo as modelo, a.puerto as puerto, a.generacion as generacion, a.ram as ram, a.rom as rom, c.nombre as idcategoria, a.fechacreada as fechacreada FROM articulo as a INNER JOIN categoria as c ON a.idcategoria  = c.idcategoria";
        $sql = "SELECT a.idarticulo, a.nombre, a.codigo, a.descripcion, a.marca, a.modelo, 
                       a.puerto, a.generacion, a.ram, a.rom, c.nombre AS categoria, 
                       a.fechacreada, a.estado 
                FROM articulo AS a 
                INNER JOIN categoria AS c ON a.idcategoria = c.idcategoria";
        return ejecutarConsulta($sql);
    }

    // Método para listar artículos en un select (dropdown)
    public function selectCategoria() {
        $sql = "SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }

    // Método para eliminar un artículo
    public function eliminar($idarticulo) {
        $sql = "DELETE FROM articulo WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }
}
?>