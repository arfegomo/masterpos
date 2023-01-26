<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/clasificacion2.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Clasificacion2 = new clasificacion2();
$clasificacion2 = $Clasificacion2->listado_clasificacion2();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('clasificacion2/list_clasificacion2.twig.php');

	echo $template->render(array('tablas' => $tablas,'clasificacion2' => $clasificacion2,'msg' => $msg,'rol' => $_SESSION["rol"]));
?>