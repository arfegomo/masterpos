<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/clasificacion1.class.php");
include("../../../includes/clasificacion2.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Clasificacion1 = new clasificacion1();
$clasificacion1 = $Clasificacion1->listado_clasificacion1();

$Clasificacion2 = new clasificacion2();
$clasificacion2 = $Clasificacion2->listado_clasificacion2();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
				
	$template = $twig->loadTemplate('articulo/create_articulo.twig.php');
	
	echo $template->render(array('tablas' => $tablas, 'clasificacion1' => $clasificacion1, 'clasificacion2' => $clasificacion2,'rol' => $_SESSION["rol"]));

?>
