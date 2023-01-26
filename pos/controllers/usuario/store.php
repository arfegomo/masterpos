<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/users.class.php");

$Users = new users();
$Users->set_nombres($_POST["nombres"]);
$Users->set_email($_POST["email"]);
$Users->set_password($_POST["password"]);
$Users->set_created_at(date("Y-m-d"));
$Users->set_updated_at(date("Y-m-d"));
$Users->set_idgenero($_POST["idgenero"]);
$Users->set_usuario($_POST["usuario"]);
$Users->set_documento($_POST["documento"]);
$Users->set_apellidos($_POST["apellidos"]);
$Users->set_fechanacimiento($_POST["fechanacimiento"]);
$Users->set_direccion($_POST["direccion"]);
$Users->set_telefonofijo($_POST["telefonofijo"]);
$Users->set_celular($_POST["celular"]);
$Users->set_active($_POST["active"]);
$msg = $Users->store();
	
header("Location: index.php?msg=$msg");		
	
?>