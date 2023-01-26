<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/departamentos.class.php");


$Departamentos = new departamentos();
$Departamentos->set_nombredepartamento($_POST["nombredepartamento"]);
$msg = $Departamentos->store();

header("Location: index.php?msg=$msg");

?>
