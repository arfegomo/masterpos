<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tipodocumento.class.php");


$Tipodocumento = new tipodocumento();
$Tipodocumento->set_nombretipodocumento($_POST["nombretipodocumento"]);
$msg = $Tipodocumento->store();

header("Location: index.php?msg=$msg");

?>
