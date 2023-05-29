<?php
header("Content-Type: application/json");

include_once 'database.php';
include_once 'receta.php';

$database = new Database();
$db = $database->getConnection();

$receta = new Receta($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id !== null) {
            $receta->id = $id;
            $result = $receta->readOne();
        } else {
            $result = $receta->readAll();
        }
        echo json_encode($result);
        break;

        case 'POST':
            // Crear una nueva receta
            $data = json_decode(file_get_contents("php://input"));
                
            $receta->nombre = $data->nombre;
            $receta->tipo_pan = $data->tipo_pan;
            $receta->ingredientes = $data->ingredientes;
            $receta->instrucciones = $data->instrucciones;
            $receta->tiempo_preparacion = $data->tiempo_preparacion;
            $receta->dificultad = $data->dificultad;
                
            if ($receta->create()) {
                echo json_encode(array("message" => "Receta creada con éxito."));
            } else {
                echo json_encode(array("message" => "No se pudo crear la receta."));
            }
            break;               

    case 'PUT':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id !== null) {
            $data = json_decode(file_get_contents("php://input"));

            $receta->id = $id;
            $receta->nombre = $data->nombre;
            $receta->tipo_pan = $data->tipo_pan;
            $receta->ingredientes = $data->ingredientes;
            $receta->instrucciones = $data->instrucciones;
            $receta->tiempo_preparacion = $data->tiempo_preparacion;
            $receta->dificultad = $data->dificultad;

            if ($receta->update()) {
                echo json_encode(array("message" => "Receta actualizada con éxito."));
            } else {
                echo json_encode(array("message" => "No se pudo actualizar la receta."));
            }
        } else {
            echo json_encode(array("message" => "ID de receta no especificado."));
        }
        break;

    case 'DELETE':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id !== null) {
            $receta->id = $id;
            if ($receta->delete()) {
                echo json_encode(array("message" => "Receta eliminada con éxito."));
            } else {
                echo json_encode(array("message" => "No se pudo eliminar la receta."));
            }
        } else {
            echo json_encode(array("message" => "ID de receta no especificado."));
        }
        break;

    default:
        echo json_encode(array("message" => "Método no válido."));
        break;
}
?>
