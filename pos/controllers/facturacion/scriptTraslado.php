<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/mesas.class.php");

$Temporal = new temporal();
$Temporal->set_idcaja($_SESSION["idcaja"]);
$Temporal->set_idsucursal($_SESSION["idsucursal"]);
$Temporal->set_id($_SESSION["id"]);
$articulos = $Temporal->trasladarMesa($_POST["origen"],$_POST["destino"]);

	$Mesas = new mesas();
	$Mesas->set_idmesa($_POST["origen"]);
	$Mesas->set_estado(0);
	$Mesas->estadoAbierta();

	$Mesas->set_idmesa($_POST["destino"]);
	$Mesas->set_estado(1);
	$Mesas->estadoAbierta();

	//exit();

	//header("Location: index.php?msg=1");

?>


<div class="alert alert-success alert-dismissable" id="success-alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Registro exitoso!</strong> La mesa fue trasladada correctamente.
</div>


