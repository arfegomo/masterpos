<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");

$Temporal = new temporal();

$Temporal->deleteAll();

	
?>