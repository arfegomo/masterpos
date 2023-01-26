<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/recetas.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Recetas = new recetas();
$recetas = $Recetas->listar_recetas();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('receta/list_receta.twig.php');
	echo $template->render(array('tablas' => $tablas,'recetas' => $recetas,'rol' => $_SESSION["rol"]));
?>
