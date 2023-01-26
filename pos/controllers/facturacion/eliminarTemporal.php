<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/articulos.class.php");

$Temporal = new temporal();
$Temporal->set_idtemporal($_POST["idTem"]);
$Temporal->set_idcaja($_SESSION["idcaja"]);
$Temporal->set_idsucursal($_SESSION["idsucursal"]);
$Temporal->set_id($_SESSION["id"]);
$Temporal->set_consecutivo($_POST["idCons"]);
$Temporal->set_idconceptofacturacion($_POST["idCon"]);

$Temporal->loadTemporal();

$Articulos = new articulos();
$Articulos->set_idarticulo($_POST["idarticulo"]);
$Articulos->loadArticulo();

$costotemporal = 0;
if($_POST["idCon"] == 1){
	$cantidad = $Articulos->get_existenciactual() + $Temporal->get_cantidad();
}elseif ($_POST["idCon"] == 2) {
	$cantidad = $Articulos->get_existenciactual() - $Temporal->get_cantidad();
	$costotemporal = $Articulos->get_costotemporal();
}elseif ($_POST["idCon"] == 3) {
	$cantidad = $Articulos->get_existenciactual() - $Temporal->get_cantidad();
}elseif ($_POST["idCon"] == 4) {
	$cantidad = $Articulos->get_existenciactual() + $Temporal->get_cantidad();
}elseif ($_POST["idCon"] == 5) {
	$cantidad = $Articulos->get_existenciactual() - $Temporal->get_cantidad();
}elseif ($_POST["idCon"] == 6) {
	$cantidad = $Articulos->get_existenciactual() + $Temporal->get_cantidad();
	$costotemporal = $Articulos->get_costotemporal();
}


$Temporal->delete($_POST["idarticulo"],$cantidad,$_POST["idCon"]);


$Temporal->set_idmesa($_POST["idmesa"]);
$articulos = $Temporal->listarArticulosMesa();

	Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));

	$template = $twig->loadTemplate('facturacion/temporal.twig.php');

	echo $template->render(array('articulos' => $articulos, 'idCons' => $_POST["idCons"], 'idCon' => $_POST["idCon"], 'idDoc' => $_POST["idDoc"],'mesa' => $_POST["idmesa"],'rol' => $_SESSION["rol"]));

?>