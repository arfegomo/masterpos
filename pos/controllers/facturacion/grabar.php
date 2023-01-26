<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");

$Temporal = new temporal();
$Temporal->set_idcaja($_SESSION["idcaja"]);
$Temporal->set_idsucursal($_SESSION["idsucursal"]);
$Temporal->set_id($_SESSION["id"]);
$Temporal->set_consecutivo($_POST["idCons"]);
$Temporal->set_idconceptofacturacion($_POST["idCon"]);
$valores = $Temporal->pagarTransaccion();

	Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));	

	$template = $twig->loadTemplate('facturacion/grabar.twig.php');

	echo $template->render(array('valores' => $valores, 'idCon' => $_POST["idCon"], 'idCons' => $_POST["idCons"], 'idDoc' => $_POST["idDoc"],'rol' => $_SESSION["rol"],'docRef' => $_POST["docRef"], 'obs' => $_POST["observacion"] ));

?>