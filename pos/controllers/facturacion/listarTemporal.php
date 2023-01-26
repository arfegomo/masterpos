<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/articulos.class.php");
include("../../../includes/mesas.class.php");

	$Temporal = new Temporal();
	$Temporal->set_idmesa($_POST["mesa"]);
	$articulos = $Temporal->listarArticulosMesa();
	
	Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates/facturacion');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('temporal.twig.php');

	echo $template->render(array('articulos' => $articulos,'idCons' => $_POST["consecutivo"],'idCon' => $_POST["concepto"], 'idDoc' => $_POST["documento"],'mesa' => $_POST["mesa"],'documentoreferencia' => $_POST["documentoreferencia"],'rol' => $_SESSION["rol"]));
?>