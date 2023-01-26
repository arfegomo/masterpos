<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/transacciones.class.php");
include("../../../includes/articulos.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Articulos = new articulos();
$articulos = $Articulos->listado_articulos();
$articulosArray = $Articulos->articulos();

$Transacciones = new transacciones();
foreach ($articulosArray as $articuloArray) {

$kardexs = $Transacciones->kardex($articuloArray["idarticulo"]);
$saldo = 0;
foreach ($kardexs as $kardex ) {
	
	switch ($kardex["idtipotransaccion"])
	{
		case 1:
		$saldo = $saldo - $kardex["cantidad"];
		break;

		case 2:
		$saldo = $saldo + $kardex["cantidad"];
		break;

		case 3:
		$saldo = $saldo + $kardex["cantidad"];
		break;

		case 4:
		$saldo = $saldo - $kardex["cantidad"];
		break;

		case 5:
		$saldo = $saldo + $kardex["cantidad"];
		break;

		case 6:
		$saldo = $saldo - $kardex["cantidad"];
		break;

	}

	$Articulos->set_idarticulo($articuloArray["idarticulo"]);
	$Articulos->set_existenciactual($saldo);
	$Articulos->actualizarExistencia();
}
}



    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('facturacion/existencias_bodega.twig.php');
	echo $template->render(array('tablas' => $tablas,'articulos' => $articulos,'rol' => $_SESSION["rol"]));
?>
