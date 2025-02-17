
<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Usuario{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$clavehash,$usuariocreado){
	date_default_timezone_set('America/Caracas');
	$fechacreado=date('Y-m-d H:i:s');
	$sql="INSERT INTO usuarios (nombre,apellidos,login,iddepartamento,idtipousuario,password,estado,fechacreado,usuariocreado) VALUES ('$nombre','$apellidos','$login','$iddepartamento','$idtipousuario','$clavehash','1','$fechacreado','$usuariocreado')";
	return ejecutarConsulta($sql);

}

public function editar($idusuario,$nombre,$apellidos,$login,$iddepartamento,$idtipousuario,$usuariocreado){
	$sql="UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',login='$login',iddepartamento='$iddepartamento',idtipousuario='$idtipousuario' ,usuariocreado='$usuariocreado'  
	WHERE idusuario='$idusuario'";
	 return ejecutarConsulta($sql);

}
public function editar_clave($idusuario,$clavehash){
	$sql="UPDATE usuarios SET password='$clavehash' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}
public function mostrar_clave($idusuario){
	$sql="SELECT idusuario, password FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}
public function desactivar($idusuario){
	$sql="UPDATE usuarios SET estado='0' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}
public function activar($idusuario){
	$sql="UPDATE usuarios SET estado='1' WHERE idusuario='$idusuario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idusuario){
	$sql="SELECT * FROM usuarios WHERE idusuario='$idusuario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM usuarios";
	return ejecutarConsulta($sql);
}

public function cantidad_usuario(){
	$sql="SELECT count(*) nombre FROM usuarios";
	return ejecutarConsulta($sql);
}

public function verificarLogin($login) {
    $sql = "SELECT COUNT(*) FROM usuarios WHERE login = '$login'";
    $rspta = ejecutarConsultaSimpleFila($sql);
    return $rspta['COUNT(*)'];
}


//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT u.idusuario,u.nombre,u.apellidos,u.login,u.idtipousuario,u.iddepartamento, tu.nombre as tipousuario FROM usuarios u INNER JOIN tipousuario tu ON u.idtipousuario=tu.idtipousuario WHERE login='$login' AND password='$clave' AND estado='1'"; 
    	return ejecutarConsulta($sql);  
    }
}

 ?>