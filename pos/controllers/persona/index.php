<?php

require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/personas.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Personas = new personas();
$personas = $Personas->listado_personas();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('persona/list_persona.twig.php');
	
	echo $template->render(array('tablas' => $tablas,'personas' => $personas,'rol' => $_SESSION["rol"]));
?>
