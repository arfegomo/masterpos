<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/conceptosfacturacion.class.php");

	$Conceptosfacturacion = new conceptosfacturacion();
	$Conceptosfacturacion->set_nombreconceptofacturacion($_POST["nombreconceptofacturacion"]);
	$Conceptosfacturacion->set_idconsecutivo($_POST["idconsecutivo"]);
	$Conceptosfacturacion->set_idtipotransaccion($_POST["idtipotransaccion"]);
	$Conceptosfacturacion->set_acumulador($_POST["acumulador"]);
	$Conceptosfacturacion->set_operacionacumulador($_POST["operacionacumulador"]);
	$Conceptosfacturacion->set_operacioninventario($_POST["operacioninventario"]);
	$Conceptosfacturacion->set_afectacostoinventario($_POST["afectacostoinventario"]);
	$Conceptosfacturacion->set_afectacaja($_POST["afectacaja"]);

	$msg = $Conceptosfacturacion->store();
	
	header("Location: index.php?msg=$msg");		
	
?>