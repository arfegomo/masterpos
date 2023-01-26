<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/papelerareciclaje.class.php");
include("../../../includes/articulos.class.php");
include("../../../includes/mesas.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/users.class.php");

	$PapeleraReciclaje = new Papelerareciclaje();
	$articulos = $PapeleraReciclaje->listarArticulosMesaAll();

	$Tablas = new tablas();
	$tablas = $Tablas->listado_tablas();

	$Users = new users();
	$Users->set_id($_SESSION["id"]);
	$user = $Users->load();

	//exit();
	
	Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
			
	$template = $twig->loadTemplate('papelerareciclaje/Papelerareciclaje.twig.php');

	echo $template->render(array('tablas' => $tablas,'user' => $user,'articulos' => $articulos,'rol' => $_SESSION["rol"]));
?>