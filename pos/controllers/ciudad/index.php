<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/ciudades.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();



$Ciudades = new ciudades();
$ciudades = $Ciudades->listado_ciudades();





    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('ciudad/list_ciudad.twig.php');
	echo $template->render(array('tablas' => $tablas,'ciudades' => $ciudades,'msg' => $msg,'rol' => $_SESSION["rol"]));
?>