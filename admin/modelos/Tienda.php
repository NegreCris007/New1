<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Tienda{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($nombre,$descripcion,$idorganizacion,$idusuario){
		date_default_timezone_set('America/Caracas');
	$fechacreada=date('Y-m-d H:i:s');
	$sql="INSERT INTO tienda (nombre,descripcion,idorganizacion,fechacreada,idusuario) VALUES ('$nombre','$descripcion','$idorganizacion','$fechacreada','$idusuario')";
	return ejecutarConsulta($sql);
}

public function editar($idtienda,$nombre,$descripcion,$idusuario){
	$sql="UPDATE tienda SET nombre='$nombre',descripcion='$descripcion',idusuario='$idusuario'
	WHERE idtienda='$idtienda'";
	return ejecutarConsulta($sql);
}
public function desactivar($idtienda){
	$sql="UPDATE tienda SET fechacreada='0' WHERE idtienda='$idtienda'";
	return ejecutarConsulta($sql);
}
public function activar($idtienda){
	$sql="UPDATE tienda SET fechacreada='1' WHERE idtienda='$idtienda'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idtienda){
	$sql="SELECT * FROM tienda WHERE idtienda='$idtienda'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM tienda";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM tienda";
	return ejecutarConsulta($sql);
}

public function regresaRolDepartamento($tienda){
	$sql="SELECT nombre FROM tienda where idtienda='$tienda'";		
	return ejecutarConsulta($sql);
}

public function eliminar($idtienda){
    $sql="DELETE FROM tienda WHERE idtienda='$idtienda'";
    return ejecutarConsulta($sql);
}

 // Método para listar Organizacion en un select (dropdown)
 public function selectOrganizacion() {
    $sql = "SELECT * FROM organizacion";
    return ejecutarConsulta($sql);
}

}

 ?>
