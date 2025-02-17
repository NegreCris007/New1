<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Organizacion{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$descripcion){
		date_default_timezone_set('America/Caracas');
	$fechacreada=date('Y-m-d H:i:s');
	$sql="INSERT INTO organizacion (nombre,descripcion,fechacreada) VALUES ('$nombre','$descripcion','$fechacreada')";
	return ejecutarConsulta($sql);
}

public function editar($idorganizacion,$nombre,$descripcion){
	$sql="UPDATE organizacion SET nombre='$nombre',descripcion='$descripcion' 
	WHERE idorganizacion='$idorganizacion'";
	return ejecutarConsulta($sql);
}
public function desactivar($idorganizacion){
	$sql="UPDATE organizacion SET fechacreada='0' WHERE idorganizacion='$idorganizacion'";
	return ejecutarConsulta($sql);
}
public function activar($idorganizacion){
	$sql="UPDATE organizacion SET fechacreada='1' WHERE idorganizacion='$idorganizacion'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idorganizacion){
	$sql="SELECT * FROM organizacion WHERE idorganizacion='$idorganizacion'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM organizacion";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM organizacion";
	return ejecutarConsulta($sql);
}

public function regresaRolDepartamento($organizacion){
	$sql="SELECT nombre FROM organizacion where idcategoria='$organizacion'";		
	return ejecutarConsulta($sql);
}

public function eliminar($idorganizacion)
{
    $sql="DELETE FROM organizacion WHERE idorganizacion='$idorganizacion'";
    return ejecutarConsulta($sql);
}



}

 ?>
