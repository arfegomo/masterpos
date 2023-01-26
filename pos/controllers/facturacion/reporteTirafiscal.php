<?php
include("../session.php");
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/detallestransacciones.class.php");

$Detallestransacciones = new detallestransacciones();
$articulos = $Detallestransacciones->tiraFiscal($_POST["fecha"],$_POST["horainicio"],$_POST["horafin"]);

Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates/facturacion');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('reporteFiscal.twig.php');

	echo $template->render(array('articulos' => $articulos, 'fecha' => $_POST["fecha"],'rol' => $_SESSION["rol"],'horainicio' => $_POST["horainicio"], 'horafin' => $_POST["horafin"]));

?>
