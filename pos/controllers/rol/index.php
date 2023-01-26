<?php
require_once '../Twig/Autoloader.php';

include("../session.php"); 
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/roles.class.php");


$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Roles = new roles();
$roles = $Roles->listado_roles();



    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('rol/list_rol.twig.php');
	echo $template->render(array('tablas' => $tablas,'roles' => $roles,'rol' => $_SESSION["rol"]));
?>