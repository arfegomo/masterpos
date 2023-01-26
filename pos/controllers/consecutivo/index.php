<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/consecutivos.class.php");




$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();


$Consecutivos = new consecutivos();
$consecutivos =$Consecutivos->listado_consecutivos();


    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('consecutivo/list_consecutivo.twig.php');
	echo $template->render(array('tablas' => $tablas,'consecutivos' => $consecutivos,'rol' => $_SESSION["rol"]));
?>
