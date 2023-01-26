<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/articulos.class.php");

$q = $_GET["term"];
if (!$q) return;

$Articulos = new articulos();
$rs = $Articulos->autocompletar($q);

	$data=array();
	
	while (!$rs->EOF){

$nombrearticulo = $rs->fields["nombrearticulo"];
$precioventa1 = $rs->fields["precioventa1"];
$idarticulo = $rs->fields["idarticulo"];
$costoactual = $rs->fields["costoactual"];
$impuestoconsumo = $rs->fields["impuestoconsumo"];
$impuestoiva = $rs->fields["impuestoiva"];
$existenciactual = $rs->fields["existenciactual"];
$existenciatemporal = $rs->fields["existenciatemporal"];
$costotemporal = $rs->fields["costotemporal"];


$data[] = array("articulo" => strtoupper($nombrearticulo)."\t", "precio" => $precioventa1, "id" => $idarticulo,"costoactual" => $costoactual, "impuestoiva" => $impuestoiva, "impuestoconsumo" => $impuestoconsumo,"existenciactual" => $existenciactual, "existenciatemporal" => $existenciatemporal,"costotemporal" => $costotemporal);

		$rs->MoveNext();
	}

//convierto a json y luego envio 

echo json_encode($data);

?>