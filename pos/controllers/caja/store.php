<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/cajas.class.php");


$Cajas = new cajas();
$Cajas->set_idcaja($_POST["idcaja"]);
$msg = $Cajas->store();

header("Location: index.php?msg=$msg");

?>
