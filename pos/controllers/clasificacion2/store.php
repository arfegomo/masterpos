<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/clasificacion2.class.php");


$Clasificacion2 = new clasificacion2();
$Clasificacion2->set_nombreclasificacion2($_POST["nombreclasificacion2"]);
$msg = $Clasificacion2->store();

header("Location: index.php?msg=$msg");

?>
