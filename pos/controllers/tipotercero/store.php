<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tiposterceros.class.php");


$Tiposterceros = new tiposterceros();
$Tiposterceros->set_nombretipotercero($_POST["nombretipotercero"]);
$msg = $Tiposterceros->store();

header("Location: index.php?msg=$msg");

?>