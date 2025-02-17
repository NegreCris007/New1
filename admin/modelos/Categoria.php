<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Categoria{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$descripcion){
		date_default_timezone_set('America/Caracas');
	$fechacreada=date('Y-m-d H:i:s');
	$sql="INSERT INTO categoria (nombre,descripcion,fechacreada) VALUES ('$nombre','$descripcion','$fechacreada')";
	return ejecutarConsulta($sql);
}

public function editar($idcategoria,$nombre,$descripcion){
	$sql="UPDATE categoria SET nombre='$nombre',descripcion='$descripcion' 
	WHERE idcategoria='$idcategoria'";
	return ejecutarConsulta($sql);
}
public function desactivar($idcategoria){
	$sql="UPDATE categoria SET fechacreada='0' WHERE iddepartamento='$idcategoria'";
	return ejecutarConsulta($sql);
}
public function activar($idcategoria){
	$sql="UPDATE categoria SET fechacreada='1' WHERE iddepartamento='$idcategoria'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idcategoria){
	$sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM categoria";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM categoria";
	return ejecutarConsulta($sql);
}

public function regresaRolDepartamento($categoria){
	$sql="SELECT nombre FROM categoria where idcategoria='$categoria'";		
	return ejecutarConsulta($sql);
}

public function eliminar($idcategoria)
{
    $sql="DELETE FROM categoria WHERE idcategoria='$idcategoria'";
    return ejecutarConsulta($sql);
}



}

 ?>
