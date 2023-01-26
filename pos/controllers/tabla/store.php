<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");


$Tablas = new tablas();
$Tablas->set_nombretabla($_POST["nombretabla"]);
$Tablas->set_tabla($_POST["tabla"]);
$msg = $Tablas->store();

header("Location: index.php?msg=$msg");

?>