<?php

include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/consecutivos.class.php");
include("../../../includes/tipostransacciones.class.php");
include("../../../includes/roles.class.php");
include("../../../includes/users.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Consecutivos = new consecutivos();
$consecutivos = $Consecutivos->listado_consecutivos();

$Tipostransacciones = new tipostransacciones();
$tipostransacciones = $Tipostransacciones->listado_tipostransacciones();

$Roles = new roles();
$roles = $Roles->listado_Roles();

$Users = new users();
$Users->set_id($_SESSION["id"]);
$user = $Users->load();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));
				
	$template = $twig->loadTemplate('conceptofacturacion/create_conceptofacturacion.twig.php');
	
	echo $template->render(array('tablas' => $tablas, 'roles' => $roles, 'consecutivos' => $consecutivos, 'tipostransacciones' => $tipostransacciones, 'user' => $user,'rol' => $_SESSION["rol"]));

?>
