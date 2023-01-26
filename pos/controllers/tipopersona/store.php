<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tipospersonas.class.php");


$Tipospersonas = new tipospersonas();
$Tipospersonas->set_nombretipopersona($_POST["nombretipopersona"]);
$msg = $Tipospersonas->store();

header("Location: index.php?msg=$msg");

?>