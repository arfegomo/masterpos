<?php
include("../session.php");
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/temporal.class.php");


$Temporal = new temporal();
$Temporal->set_idmesa($_POST["mesa"]);
$datos = $Temporal->dataMesa();

echo json_encode($datos);

?>