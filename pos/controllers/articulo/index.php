<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/articulos.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Articulos = new articulos();
$articulos = $Articulos->listado_articulos();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('articulo/list_articulo.twig.php');
	echo $template->render(array('tablas' => $tablas,'articulos' => $articulos,'rol' => $_SESSION["rol"]));
?>
