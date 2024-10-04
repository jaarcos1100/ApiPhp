<?php 
require_once "models/connection.php";   
require_once "controllers/delete.controller.php";

if( isset ($_GET["id"]) && isset ($_GET ["nameId"])){
    
 /* validamos la tabla y al columna a actualizar*/
if(empty(Connection::getColumnsData($table, $columns))){

    $json= array(
        'status'=>400,
        ' resulta'=>"datos no coniciden"
    );
    echo json_encode($json, http_response_code($json["status"]));
}

/* tarea recuerden que cuando se elimina un registro debe validar el token si conicide 
o no con el alamacenado en la base de datos*/

}

?>