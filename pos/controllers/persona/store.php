<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/personas.class.php");

$Personas = new personas();
$Personas->set_nombres($_POST["nombres"]);
$Personas->set_email($_POST["email"]);
$Personas->set_created_at(date("Y-m-d"));
$Personas->set_updated_at(date("Y-m-d"));
$Personas->set_idgenero($_POST["idgenero"]);
$Personas->set_documento($_POST["documento"]);
$Personas->set_apellidos($_POST["apellidos"]);
$Personas->set_direccion($_POST["direccion"]);
$Personas->set_telefono($_POST["telefono"]);
$Personas->set_celular($_POST["celular"]);
$msg = $Personas->store();	

header("Location: index.php?msg=$msg");		
	
?>