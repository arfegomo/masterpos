<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tipostransacciones.class.php");


$Tipostransacciones = new tipostransacciones();
$Tipostransacciones->set_nombretipotransaccion($_POST["nombretipotransaccion"]);
$msg = $Tipostransacciones->store();

header("Location: index.php?msg=$msg");

?>
