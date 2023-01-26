<?php
include("../session.php");
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/transacciones.class.php");

$Transacciones = new transacciones();
$ventas = $Transacciones->ventasArticulos($_POST["fechainicial"],$_POST["fechafinal"],$_POST["tipotra"]);

Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates/facturacion');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('reporteVentasArticulostwig.php');

	echo $template->render(array('ventas' => $ventas, 'rol' => $_SESSION["rol"]));

?>
