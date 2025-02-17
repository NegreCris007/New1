<?php 
require_once "../modelos/Tienda.php";
if (strlen(session_id())<1) 
	session_start();

$tienda=new Tienda();

$idtienda=isset($_POST["idtienda"])? limpiarCadena($_POST["idtienda"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$idorganizacion = isset($_POST["idorganizacion"]) ? limpiarCadena($_POST["idorganizacion"]) : null;

$idusuario = $_SESSION["idusuario"];

switch ($_GET["op"]) {


	case 'guardaryeditar':
	if (empty($idtienda)) {
		$rspta=$tienda->insertar($nombre,$descripcion,$idorganizacion,$idusuario);
		// Depuración
if(empty($_POST["idorganizacion"])){
    die("Error: idorganizacion está vacío.");
}

		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos 1";
	}else{
         $rspta=$tienda->editar($idtienda,$nombre,$descripcion,$idorganizacion,$idusuario);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$tienda->desactivar($idtienda);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;


	case 'activar':
		$rspta=$tienda->activar($idtienda);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;

		case 'eliminar':
			$rspta=$tienda->eliminar($idtienda);
			echo $rspta ? "Tienda eliminada correctamente" : "No se pudo eliminar";
			break;
		
	
	case 'mostrar':
		$rspta=$tienda->mostrar($idtienda);
		echo json_encode($rspta);
		break;


    case 'listar':
		$rspta=$tienda->listar();
		
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
           // "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->iddepartamento.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->iddepartamento.')"><i class="fa fa-close"></i></button>',
           "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idtienda.')"><i class="fa fa-pencil"></i></button>'.
     ' '.'<button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->idtienda.')"><i class="fa fa-trash"></i></button>',

		   "1"=>$reg->nombre,
            "2"=>$reg->descripcion,
            "3"=>$reg->fechacreada,
			
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);   
		break;



		case 'selectOrganizacion':
			$rspta=$tienda-> selectOrganizacion();
			echo '<option value="0">seleccione...</option>';
			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idorganizacion.'>'.$reg->nombre.'</option>';
			}
			break;
}
 ?>