<?php 
require_once "../modelos/Articulo.php";
if (strlen(session_id()) < 1) 
    session_start();

$articulo = new Articulo();

$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$marca = isset($_POST["marca"]) ? limpiarCadena($_POST["marca"]) : "";
$modelo = isset($_POST["modelo"]) ? limpiarCadena($_POST["modelo"]) : "";
$puerto = isset($_POST["puerto"]) ? limpiarCadena($_POST["puerto"]) : "";
$generacion = isset($_POST["generacion"]) ? limpiarCadena($_POST["generacion"]) : "";
$ram = isset($_POST["ram"]) ? limpiarCadena($_POST["ram"]) : "";
$rom = isset($_POST["rom"]) ? limpiarCadena($_POST["rom"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$idusuario = $_SESSION["idusuario"];

switch ($_GET["op"]) {

    case 'guardaryeditar':
        if (empty($idarticulo)) {
            $rspta = $articulo->insertar($nombre, $codigo, $descripcion, $marca, $modelo, $puerto, $generacion, $ram, $rom, $idcategoria, $idusuario);
            echo $rspta ? "Artículo registrado correctamente" : "No se pudo registrar el artículo";
        } else {
            $rspta = $articulo->editar($idarticulo, $nombre, $codigo, $descripcion, $marca, $modelo, $puerto, $generacion, $ram, $rom, $idcategoria, $idusuario);
            echo $rspta ? "Artículo actualizado correctamente" : "No se pudo actualizar el artículo";
        }
        break;

    case 'desactivar':
        $rspta = $articulo->desactivar($idarticulo);
        echo $rspta ? "Artículo desactivado correctamente" : "No se pudo desactivar el artículo";
        break;

    case 'activar':
        $rspta = $articulo->activar($idarticulo);
        echo $rspta ? "Artículo activado correctamente" : "No se pudo activar el artículo";
        break;

    case 'eliminar':
        $rspta = $articulo->eliminar($idarticulo);
        echo $rspta ? "Artículo eliminado correctamente" : "No se pudo eliminar el artículo";
        break;

    case 'mostrar':
        $rspta = $articulo->mostrar($idarticulo);
        echo json_encode($rspta);
        break;

 
        case 'listar':
            $rspta = $articulo->listar();
            $data = Array();
        
            while ($reg = $rspta->fetch_object()) {
                $data[] = array(
                    "0" => ($reg->estado) 
                        ? '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarticulo.')"><i class="fa fa-pencil"></i></button> 
                           <button class="btn btn-danger btn-xs" onclick="eliminar('.$reg->idarticulo.')"><i class="fa fa-trash"></i></button> 
                           <button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idarticulo.')"><i class="fa fa-close"></i></button>'
                        : '<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarticulo.')"><i class="fa fa-pencil"></i></button> 
                          
                           <button class="btn btn-primary btn-xs" onclick="activar('.$reg->idarticulo.')"><i class="fa fa-check"></i></button>',
                    "1" => $reg->nombre,
                    "2" => $reg->codigo,
                    "3" => $reg->descripcion,
                    "4" => $reg->marca,
                    "5" => $reg->modelo,
                    "6" => $reg->puerto,
                    "7" => $reg->generacion,
                    "8" => $reg->ram,
                    "9" => $reg->rom,
                    "10" => $reg->categoria,  
                    "11" => $reg->fechacreada,
                    "12"=>($reg->estado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
                );
            }
        
            $results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
        
            echo json_encode($results);
            break;




    case 'selectCategoria':
        $rspta = $articulo->selectCategoria();
        echo '<option value="0">Seleccione...</option>';
        while ($reg = $rspta->fetch_object()) {
            echo '<option value="' . $reg->idcategoria . '">' . $reg->nombre . '</option>';
        }
        break;
}
?>