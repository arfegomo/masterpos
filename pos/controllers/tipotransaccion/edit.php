<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/genero.class.php");
include("../../../includes/roles.class.php");
include("../../../includes/tipostransacciones.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Genero = new genero();
$generos = $Genero->listado_Genero();

$Roles = new roles();
$roles = $Roles->listado_Roles();

$Tipostransacciones = new tipostransacciones();
$Tipostransacciones->set_idtipotransaccion($_GET["id"]);
$tipostransacciones = $Tipostransacciones->load();

//var_dump($tipostransacciones);
	
 Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));

	$template = $twig->loadTemplate('tipotransaccion/edit_tipostransaccion.twig.php');

	echo $template->render(array('tablas' => $tablas, 'roles' => $roles, 'tipostransacciones' => $tipostransacciones,'rol' => $_SESSION["rol"]));

?>