<?php

include("../session.php");

require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/users.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Users = new users();
$Users->set_id($_SESSION["id"]);
$user = $Users->load();

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));

	$template = $twig->loadTemplate('facturacion/tira_fiscal.twig.php');

	echo $template->render(array('tablas' => $tablas,'rol' => $_SESSION["rol"],"user" => $user));

?>