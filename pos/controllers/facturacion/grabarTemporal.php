<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/articulos.class.php");
include("../../../includes/conceptosfacturacion.class.php");
include("../../../includes/consecutivos.class.php");
include("../../../includes/mesas.class.php");
include("../../../includes/temporal2.class.php");


$Articulos = new articulos();
$Articulos->set_idarticulo($_POST["articulo"]);
$Articulos->loadArticulo();

$Temporal2 = new temporal2();

$Temporal = new temporal();
$Temporal->set_idarticulo($_POST["articulo"]);
$Temporal->set_cantidad($_POST["cantidad"]);
$Temporal->set_created_at(date("Y-m-d"));
$Temporal->set_updated_at(date("Y-m-d"));
$Temporal->set_descuento($_POST["descuento"]);
$Temporal->set_preciounitario($_POST["precio"]);
$Temporal->set_consecutivo($_POST["consecutivo"]);
$Temporal->set_impuestoiva($_POST["iva"]);
$Temporal->set_impuestoconsumo($_POST["impoconsumo"]);
$Temporal->set_idconceptofacturacion($_POST["concepto"]);
$Temporal->set_idcaja($_SESSION["idcaja"]);
$Temporal->set_idmesa($_POST["mesa"]);
$Temporal->set_idsucursal($_SESSION["idsucursal"]);
$Temporal->set_id($_SESSION["id"]);
$Temporal->set_idtipoimpuesto($Articulos->get_idtipoimpuesto());
$Temporal->set_documento($_POST["documento"]);
$Temporal->set_documentoreferencia($_POST["documentoreferencia"]);

if($_POST["tipotransaccion"] == 1){

			/*$Temporal2->set_idarticulo($_POST["articulo"]);
			$Temporal2->set_costoventa($Articulos->get_costoactual());
			$Temporal2->set_costopromedio($Articulos->get_costoactual());
			$Temporal2->set_existenciactual($Articulos->get_existenciactual());
			$Temporal2->set_existenciatemporal($Articulos->get_existenciatemporal());
			$Temporal2->store();*/

			$Temporal->set_costoventa($Articulos->get_costoactual());
			$Temporal->set_costopromedio($Articulos->get_costoactual());

	$Temporal->set_existenciactual($_POST["existenciactual"] - ($_POST["existenciatemporal"] + $_POST["cantidad"]));

			$Articulos->set_idarticulo($_POST["articulo"]);
			$Articulos->set_existenciactual($_POST["existenciactual"] - ($_POST["existenciatemporal"] + $_POST["cantidad"]));
			//$Articulos->set_existenciatemporal($_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->updateExistencia();

}elseif($_POST["tipotransaccion"] == 2){

			
			$Temporal->set_costoventa((($_POST["precio"]*$_POST["cantidad"])-(($_POST["precio"]*$_POST["cantidad"])*($_POST["descuento"]/100))) / $_POST["cantidad"]);

			$Temporal->set_existenciactual($_POST["existenciactual"] + $_POST["cantidad"]);

			$inventarioActual = ($Articulos->get_existenciactual()*$Articulos->get_costoactual());

			$Articulos->set_idarticulo($_POST["articulo"]);
			$Articulos->set_existenciactual($Articulos->get_existenciactual() + $_POST["cantidad"]);
			$Articulos->updateExistencia();

			$nuevaexistencia = $Articulos->get_existenciactual();

			$nuevoInventario = ((($_POST["precio"]*$_POST["cantidad"])-(($_POST["precio"]*$_POST["cantidad"])*($_POST["descuento"]/100))));
			
			$Articulos->set_idarticulo($_POST["articulo"]);
			
			$Articulos->set_costoactual(round((($inventarioActual + $nuevoInventario)/$nuevaexistencia),1));
			
			$Articulos->updateCostoActual();
			
			$Temporal->set_costopromedio(round((($inventarioActual + $nuevoInventario)/$nuevaexistencia),1));




}elseif($_POST["tipotransaccion"] == 3){

			$Temporal->set_costoventa($Articulos->get_costoactual());
			$Temporal->set_costopromedio($Articulos->get_costoactual());

	$Temporal->set_existenciactual($_POST["existenciactual"] + $_POST["existenciatemporal"] + $_POST["cantidad"]);

			$Articulos->set_idarticulo($_POST["articulo"]);
			//$Articulos->set_existenciatemporal($_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->set_existenciactual($_POST["existenciactual"] + $_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->updateExistencia();

}elseif($_POST["tipotransaccion"] == 4){

			$Temporal->set_costoventa($Articulos->get_costoactual());
			$Temporal->set_costopromedio($Articulos->get_costoactual());

	$Temporal->set_existenciactual($_POST["existenciactual"] - ($_POST["existenciatemporal"] + $_POST["cantidad"]));

			$Articulos->set_idarticulo($_POST["articulo"]);
			//$Articulos->set_existenciatemporal($_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->set_existenciactual($_POST["existenciactual"] - ($_POST["existenciatemporal"] + $_POST["cantidad"]));
			$Articulos->updateExistencia();

}elseif($_POST["tipotransaccion"] == 5){

			$Temporal->set_costoventa($Articulos->get_costoactual());
			$Temporal->set_costopromedio($Articulos->get_costoactual());

	$Temporal->set_existenciactual($_POST["existenciactual"] + $_POST["existenciatemporal"] + $_POST["cantidad"]);

			$Articulos->set_idarticulo($_POST["articulo"]);
			//$Articulos->set_existenciatemporal($_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->set_existenciactual($_POST["existenciactual"] + $_POST["existenciatemporal"] + $_POST["cantidad"]);
			$Articulos->updateExistencia();

}elseif($_POST["tipotransaccion"] == 6){
			
			$Temporal->set_costoventa((($_POST["precio"]*$_POST["cantidad"])-(($_POST["precio"]*$_POST["cantidad"])*($_POST["descuento"]/100))) / $_POST["cantidad"]);

			$Temporal->set_existenciactual($_POST["existenciactual"] - $_POST["cantidad"]);

			$inventarioActual = ($Articulos->get_existenciactual()*$Articulos->get_costoactual());

			$Articulos->set_idarticulo($_POST["articulo"]);
			$Articulos->set_existenciactual($Articulos->get_existenciactual() - $_POST["cantidad"]);
			$Articulos->updateExistencia();

			$nuevaexistencia = $Articulos->get_existenciactual();

			$nuevoInventario = ((($_POST["precio"]*$_POST["cantidad"])-(($_POST["precio"]*$_POST["cantidad"])*($_POST["descuento"]/100))));
			
			$Articulos->set_idarticulo($_POST["articulo"]);
			
			$Articulos->set_costoactual(round((($inventarioActual - $nuevoInventario)/$nuevaexistencia),1));

			$Articulos->updateCostoActual();
						
			$Temporal->set_costopromedio(round((($inventarioActual - $nuevoInventario)/$nuevaexistencia),1));

		}else
				{
			$Temporal->set_costoventa($Articulos->get_costoactual());
			$Temporal->set_costopromedio($Articulos->get_costoactual());
					}


	if($_POST["iva"] > 0){
		$Temporal->set_baseunitario($_POST["precio"]/(($_POST["iva"]/100)+1));
	}
	elseif($_POST["impoconsumo"] > 0){
		$Temporal->set_baseunitario($_POST["precio"]/(($_POST["impoconsumo"]/100)+1));
	}
	else{
		$Temporal->set_baseunitario($_POST["precio"]);
	}
	$msg = $Temporal->store();
	$Mesas = new mesas();
	$Mesas->set_idmesa($_POST["mesa"]);
	$Mesas->set_estado(1);
	$Mesas->estadoAbierta();

	$Temporal->set_consecutivo($_POST["consecutivo"]);
	$articulos = $Temporal->listarArticulosMesa();
	
	Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates/facturacion');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('temporal.twig.php');

	echo $template->render(array('articulos' => $articulos,'idCons' => $_POST["consecutivo"],'idCon' => $_POST["concepto"], 'idDoc' => $_POST["documento"], 'mesa' => $_POST["mesa"],'rol' => $_SESSION["rol"]));
?>