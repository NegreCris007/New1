<?php 
require_once "../modelos/Almacen.php";
if (strlen(session_id()) < 1) session_start();

$almacen = new Almacen();

$idalmacen = isset($_POST["idalmacen"]) ? limpiarCadena($_POST["idalmacen"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$idtienda = isset($_POST["idtienda"]) ? limpiarCadena($_POST["idtienda"]) : null;
//$idusuario = $_SESSION["idusuario"];

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idalmacen)) {
            $rspta = $almacen->insertar($nombre, $descripcion, $idtienda);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            $rspta = $almacen->editar($idalmacen, $nombre, $descripcion, $idtienda);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    case 'desactivar':
        echo $almacen->desactivar($idalmacen) ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;

    case 'activar':
        echo $almacen->activar($idalmacen) ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;

    case 'eliminar':
        echo $almacen->eliminar($idalmacen) ? "Almacén eliminado correctamente" : "No se pudo eliminar";
        break;

    case 'mostrar':
        echo json_encode($almacen->mostrar($idalmacen));
        break;

    case 'listar':
        $rspta = $almacen->listar();
        $data = [];
        while ($reg = $rspta->fetch_object()) {
            $data[] = [
                "0" => '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idalmacen.')"><i class="fa fa-pencil"></i></button>' .
                          ' <button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->idalmacen.')"><i class="fa fa-trash"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->descripcion,
                "3" => $reg->tienda
                
            ];
        }
        echo json_encode(["sEcho" => 1, "iTotalRecords" => count($data), "iTotalDisplayRecords" => count($data), "aaData" => $data]);
        break;

        case 'selectTienda':
            $rspta = $almacen->selectTienda();
            echo '<option value="0">Seleccione...</option>';
            while ($reg = $rspta->fetch_object()) {
                echo '<option value=' . $reg->idtienda . '>' . $reg->nombre . '</option>';
            }
            break;



}
?>
