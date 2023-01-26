<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/sucursales.class.php");

$Sucursales = new sucursales();
$Sucursales->set_idciudad($_POST["idciudad"]);
$Sucursales->set_nombresucursal($_POST["nombresucursal"]);
$Sucursales->set_direccion($_POST["direccion"]);
$Sucursales->set_telefono($_POST["telefono"]);
$Sucursales->set_barrio($_POST["barrio"]);
$msg = $Sucursales->store();

header("Location: index.php?msg=$msg");

?>