<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/genero.class.php");
include("../../../includes/roles.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Genero = new genero();
$generos = $Genero->listado_genero();

$Roles = new roles();
$roles = $Roles->listado_Roles();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
				
	$template = $twig->loadTemplate('usuario/create_user.twig.php');
	
	echo $template->render(array('tablas' => $tablas,'generos' => $generos, 'roles' => $roles,'rol' => $_SESSION["rol"]));

?>