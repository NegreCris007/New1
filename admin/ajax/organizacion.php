<?php 
require_once "../modelos/Organizacion.php";
if (strlen(session_id())<1) 
	session_start();

$organizacion=new Organizacion();

$idorganizacion=isset($_POST["idorganizacion"])? limpiarCadena($_POST["idorganizacion"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
//$idusuario=$_SESSION["idusuario"];

switch ($_GET["op"]) {

	case 'guardaryeditar':
	if (empty($idorganizacion)) {
		$rspta=$organizacion->insertar($nombre,$descripcion,$idorganizacion);
		echo $rspta ? "Datos registrados correctamente " : "No se pudo registrar los datos ";
	}else{
         $rspta=$organizacion->editar($idorganizacion,$nombre,$descripcion);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$organizacion->desactivar($idorganizacion);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$organizacion->activar($idorganizacion);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;

		case 'eliminar':
			$rspta=$organizacion->eliminar($idorganizacion);
			echo $rspta ? "Organización eliminada correctamente" : "No se pudo eliminar";
			break;
		
	
	case 'mostrar':
		$rspta= $organizacion->mostrar($idorganizacion);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$organizacion->listar();
		
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
           // "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->iddepartamento.')"><i class="fa fa-pencil"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->iddepartamento.')"><i class="fa fa-close"></i></button>',
           "0"=>'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idorganizacion.')"><i class="fa fa-pencil"></i></button>'.
     ' '.'<button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->idorganizacion.')"><i class="fa fa-trash"></i></button>',

		   "1"=>$reg->nombre,
            "2"=>$reg->descripcion,
            "3"=>$reg->fechacreada
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
			$rspta=$organizacion->select();
			echo '<option value="0">seleccione...</option>';
			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idorganizacion.'>'.$reg->nombre.'</option>';
			}
			break;
}
 ?>