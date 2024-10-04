<?php
require_once "connection.php";
require_once "get.model.php"; 

class DeleteModel{
    static public function deleteData($table, $id, $nameId){
        $response=GetModel::getDataFilter($table,$nameId, $nameId,$id, null, null, null,null);
        if(empty($resposne)){
            return null;

        }

        /* eliminar registros */
        $sql="DELETE FROM $table WHERE $nameId=:$nameId";

    $link =Connection::connect();
    $stmt=$link->prepare($sql);
    $stmt -> bindParam(":".$nameId, $id, PDO::PARAM_STR);
    
    if($stmt -> execute()){

        $response = array(

            "lastId" => $link->lastInsertId(),
            "comment" => "proceso exitoso"
            
        );

        return $response;
    
    }else{

        return $link->errorInfo();

    }

    }


}


?>