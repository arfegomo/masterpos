<?php
require_once '../Twig/autoloader.php';

use Twig\TwigFunction;

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/articulos.class.php");
include("../../../includes/transacciones.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Articulos = new articulos();
$articulos = $Articulos->listado_articulos();
$Articulos->set_idarticulo($_GET["idarticulo"]);
$Articulos->loadArticulo();
$articulo = $Articulos->get_nombrearticulo();
$costoactual = $Articulos->get_costoactual();
$existenciactual = $Articulos->get_existenciactual();

$Transacciones = new transacciones();
$kardexs = $Transacciones->kardex($_GET["idarticulo"]);

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

	$Articulos->set_idarticulo($_GET["idarticulo"]);
	$Articulos->set_existenciactual($saldo);
	$Articulos->actualizarExistencia();
}

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));

    $funcion = new TwigFunction("actualizar-existencia", function(){
    
   
});
    
	//$twig->addFunction($funcion);
			
	$template = $twig->loadTemplate('articulo/verkardex.twig.php');
	echo $template->render(array('tablas' => $tablas,'articulos' => $articulos,'rol' => $_SESSION["rol"],'kardexs' => $kardexs, 'articulo' => $articulo, 'costoactual' => $costoactual, 'existenciactual' => $existenciactual));
?>
