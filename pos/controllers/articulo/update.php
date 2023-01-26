<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/articulos.class.php");

$Articulos = new articulos();
$Articulos->set_idarticulo($_POST["idarticulo"]);
$Articulos->set_nombrearticulo($_POST["nombrearticulo"]);
$Articulos->set_codigoarticulo($_POST["codigoarticulo"]);
$Articulos->set_bloqueanegativos($_POST["bloqueanegativos"]);
$Articulos->set_updated_at(date("Y-m-d"));
$Articulos->set_stockminimo($_POST["stockminimo"]);
$Articulos->set_stockmaximo($_POST["stockmaximo"]);
$Articulos->set_costoinicial($_POST["costoinicial"]);
$Articulos->set_facturable($_POST["facturable"]);
$Articulos->set_habilitar($_POST["habilitar"]);
$Articulos->set_precioventa1($_POST["precioventa1"]);
$Articulos->set_impuestoiva($_POST["impuestoiva"]);
$Articulos->set_impuestoconsumo($_POST["impuestoconsumo"]);
$Articulos->set_idtipoimpuesto($_POST["idtipoimpuesto"]);
$Articulos->set_idclasificacion1($_POST["idclasificacion1"]);
$Articulos->set_idclasificacion2($_POST["idclasificacion2"]);
$Articulos->set_costoactual($_POST["costoactual"]);
$msg = $Articulos->update();

header("Location: index.php?msg=$msg");		

	

?>