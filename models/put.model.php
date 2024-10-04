<?php 
//require_once "connection.php";
//require_once "get.model.php";


class PutModel {
    static public function putData($table, $data, $id, $nameId){
        $response=GetModel::getDataFilter($table,$nameId,$nameId,$id, null, null, null,null);
       if(empty($response)){
        return null;
       }
/* actualizar registros */
    $set="";
    foreach($data as $key =>$value){
        $set .= $key."= :".$key.",";
    }
    $set=substr($set,0,-1);
    $sql="UPDATE $table SET  $set WHERE $nameId=:$nameId";

    $link =Connection::connect();
    $stmt=$link->prepare($sql);
    $stmt -> bindParam(":".$nameId, $id, PDO::PARAM_STR);

    if($stmt -> execute()){

        $response = array(
            
            "comment" => "proceso exitoso"
            
        );

        return $response;
    
    }else{

        return $link->errorInfo();

    }
}
}
?>