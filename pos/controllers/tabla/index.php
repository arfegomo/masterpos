<?php
require_once '../Twig/Autoloader.php';
include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();


    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('tabla/list_tabla.twig.php');
	echo $template->render(array('tablas' => $tablas,'msg' => $msg,'rol' => $_SESSION["rol"]));
?>