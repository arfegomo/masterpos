<?php

include("../session.php");
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/consecutivos.class.php");
include("../../../includes/conceptosfacturacion.class.php");


$Consecutivos = new consecutivos();
$consecutivos = $Consecutivos->findConsecutivo($_POST["id"]);

//var_dump($consecutivos);

foreach ($consecutivos as $consecutivo) {
	//Actualiza consecutivo tabla temporal +1
	$Consecutivos->UpdateConsecutivoTemporal($_POST["id"],($consecutivo["consecutivo"] + 1));
}

//$Consecutivos->UpdateConsecutivoTemporal(7,53);
//exit();
$ConceptosFacturacion = new conceptosfacturacion();
$ConceptosFacturacion->set_idsucursal($_SESSION["idsucursal"]);
$ConceptosFacturacion->set_idconceptofacturacion($_POST["id"]);

//$ConceptosFacturacion->actualizaConsecutivoTemporal($consecutivos + 1);
//var_dump($consecutivos);
//echo $consecutivos;

echo json_encode($consecutivos);

?>