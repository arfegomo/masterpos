<?php

require_once '../Twig/Autoloader.php';
include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/tipostransacciones.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Tipostransacciones = new tipostransacciones();
$tipostransacciones = $Tipostransacciones->listado_tipostransacciones();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('tipotransaccion/list_tipostransaccion.twig.php');
	
	echo $template->render(array('tablas' => $tablas,'tipostransacciones' => $tipostransacciones, 'msg' => $msg,'rol' => $_SESSION["rol"]));
?>

