<?php
require_once '../Twig/Autoloader.php';
include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/regimentributario.class.php");

$msg = "";

if (isset($_GET["msg"])){
 	$msg = $_GET["msg"];
}

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Regimentributario = new regimentributario();
$regimentributario = $Regimentributario->listado_regimentributario();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('regimentributario/list_regimentributario.twig.php');
	
	echo $template->render(array('tablas' => $tablas,'regimentributario' => $regimentributario,'msg' => $msg,'rol' => $_SESSION["rol"]));
?>
