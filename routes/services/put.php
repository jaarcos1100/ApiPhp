<?php 
require_once "models/connection.php";   
require_once "controllers/put.controller.php";

if( isset ($_GET["id"]) && isset ($_GET ["nameId"])){
    $data=array();
parse_str(file_get_contents('php://input'),$data);
    

$columns= array();
foreach(array_keys($data) as $key =>$values){
    array_push($columns, $values);
}
array_push($columns, $_GET["nameId"]);
 $columns= array_unique($columns);

 /* validamos la tabla y al columna a actualizar*/
if(empty(Connection::getColumnsData($table, $columns))){

    $json= array(
        'status'=>400,
        ' resulta'=>"datos no coniciden"
    );
    echo json_encode($json, http_response_code($json["status"]));
}

/* tarea recuerden que cuando se actualiza un registro debe validar el token si conicide 
o no con el alamacenado en la base de datos, */

}

?>