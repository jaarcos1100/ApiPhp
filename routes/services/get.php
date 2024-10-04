<?php
require_once "controllers/get.controller.php";
require_once "models/get.model.php";

$select = $_GET["select"] ?? "*";
$orderBy = $_GET["orderBy"] ?? null;
$orderMode = $_GET["orderMode"] ?? null;
$startAt = $_GET["startAt"] ?? null;
$endAt = $_GET["endAt"] ?? null;
$filterTo = $_GET["filterTo"] ?? null;
$inTo = $_GET["inTo"] ?? null;

//var_dump("esta entrado al get");

$response=new GetController(); 

/*Peticiones GET con filtro*/
if(isset($_GET["linkTo"]) && isset($_GET["equalTo"]) && !isset($_GET["rel"]) && !isset($_GET["type"]) ){
	$response -> getDataFilter($table, $select,$_GET["linkTo"],$_GET["equalTo"],$orderBy,$orderMode,$startAt,$endAt);

/* Peticiones GET sin filtro entre tablas relacionadas*/
}else if(isset($_GET["rel"]) && isset($_GET["type"]) && $table == "relations" && !isset($_GET["linkTo"]) && !isset($_GET["equalTo"])){
	$response -> getRelData($_GET["rel"],$_GET["type"],$select,$orderBy,$orderMode,$startAt,$endAt);

/* Peticiones GET con filtro entre tablas relacionadas*/
}else if(isset($_GET["rel"]) && isset($_GET["type"]) && $table == "relations" && isset($_GET["linkTo"]) && isset($_GET["equalTo"])){
	$response -> getRelDataFilter($_GET["rel"],$_GET["type"],$select,$_GET["linkTo"],$_GET["equalTo"],$orderBy,$orderMode,$startAt,$endAt);
	
/* Peticiones GET para el buscador sin relaciones*/
}else if(!isset($_GET["rel"]) && !isset($_GET["type"]) && isset($_GET["linkTo"]) && isset($_GET["search"])){
	$response -> getDataSearch($table, $select,$_GET["linkTo"],$_GET["search"],$orderBy,$orderMode,$startAt,$endAt);
/* Peticiones GET para el buscador con relaciones*/

/* Peticiones GET para selección de rangos */

/* Peticiones GET para selección de rangos con relaciones */

}else{
/* Peticiones GET sin filtro */

	$response -> getData($table, $select,$orderBy,$orderMode,$startAt,$endAt);
	//var_dump($response -> getData($table, $select,$orderBy,$orderMode,$startAt,$endAt));
}

?>