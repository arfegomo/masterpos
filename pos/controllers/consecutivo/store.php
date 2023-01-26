<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/consecutivos.class.php");

	$Consecutivos = new consecutivos();
	$Consecutivos->set_consecutivodian($_POST["consecutivodian"]);
	$msg = $Consecutivos->store();
	
	header("Location: index.php?msg=$msg");		
	
?>