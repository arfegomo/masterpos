<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/clasificacion1.class.php");


$Clasificacion1 = new clasificacion1();
$Clasificacion1->set_nombreclasificacion1($_POST["nombreclasificacion1"]);
$msg = $Clasificacion1->store();

header("Location: index.php?msg=$msg");

?>
