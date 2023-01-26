<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/ciudades.class.php");


$Ciudades = new ciudades();
$Ciudades->set_iddepartamento($_POST["iddepartamento"]);
$Ciudades->set_nombreciudad($_POST["nombreciudad"]);
$msg = $Ciudades->store();

header("Location: index.php?msg=$msg");

?>