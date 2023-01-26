<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/clasificacion1.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Clasificacion1 = new clasificacion1();
$clasificacion1 = $Clasificacion1->listado_clasificacion1();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('clasificacion1/list_clasificacion1.twig.php');

	echo $template->render(array('tablas' => $tablas,'clasificacion1' => $clasificacion1,'msg' => $msg,'rol' => $_SESSION["rol"]));
?>
