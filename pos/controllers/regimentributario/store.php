<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/regimentributario.class.php");


$Regimentributario = new regimentributario();
$Regimentributario->set_nombreregimentributario($_POST["nombreregimentributario"]);
$msg = $Regimentributario->store();

header("Location: index.php?msg=$msg");

?>
