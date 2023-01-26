<?php
include("../session.php");
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/detallestransacciones.class.php");

$Detallestransacciones = new detallestransacciones();
$articulos = $Detallestransacciones->reportePorproducto($_POST["fecha"]);

Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates/facturacion');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('reportePorproducto.twig.php');

	echo $template->render(array('articulos' => $articulos,'rol' => $_SESSION["rol"]));

?>
