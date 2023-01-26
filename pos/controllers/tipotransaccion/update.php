<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tipostransacciones.class.php");


$Tipostransacciones = new tipostransacciones();
$Tipostransacciones->set_idtipotransaccion($_POST["idtipotransaccion"]);
$Tipostransacciones->set_nombretipotransaccion($_POST["nombretipotransaccion"]);
$Tipostransacciones->set_updated_at(date("Y-m-d"));
$msg = $Tipostransacciones->update();

header("Location: index.php?msg=$msg");

?>