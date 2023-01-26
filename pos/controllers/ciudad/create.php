<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/departamentos.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Departamentos = new departamentos();
$departamentos = $Departamentos->listado_departamentos();



    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
				
	$template = $twig->loadTemplate('ciudad/create_ciudad.twig.php');
	
	echo $template->render(array('tablas' => $tablas,'departamentos' => $departamentos,'rol' => $_SESSION["rol"]));

?>
