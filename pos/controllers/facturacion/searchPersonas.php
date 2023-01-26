<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/personas.class.php");

$q = $_GET["term"];

if (!$q) return;

$Personas = new personas();
$rs = $Personas->autocompletar($q);

	$data=array();

	while (!$rs->EOF){
		
$nombres = $rs->fields["nombres"]." ".$rs->fields["apellidos"];
$documento = $rs->fields["documento"];

$data[] = array("nombres" => $nombres, "id" => $documento);

		$rs->MoveNext();
	}



//convierto a json y luego envio 

echo json_encode($data);

?>