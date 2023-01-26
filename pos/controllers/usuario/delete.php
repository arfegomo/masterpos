<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/users.class.php");

$Users = new users();
$Users->set_documento($_GET["id"]);
$msg = $Users->delete();

//var_dump($user);

header("Location: index.php?msg=$msg");		

?>
