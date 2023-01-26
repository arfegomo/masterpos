<?php

include("../session.php");

require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/users.class.php");
include("../../../includes/mesas.class.php");
include("../../../includes/temporal.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Mesas = new mesas();
$mesas = $Mesas->listado_mesas();

$Temporal = new Temporal();

foreach ($mesas as $mesa) {
        $Temporal->set_idmesa($mesa["idmesa"]);
        $totalItems = $Temporal->itemMesa();
        if($totalItems == 0){
            $Mesas->set_idmesa($mesa["idmesa"]);
            $Mesas->set_estado(0);
            $Mesas->estadoAbierta();
        }
}


$mesas = $Mesas->listado_mesas();

$Users = new users();
$Users->set_id($_SESSION["id"]);
$user = $Users->load();

$msg = "";
$cambio = 0;

  if (isset($_GET["msg"])){
  $msg = $_GET["msg"];
  }

  if (isset($_GET["cambio"])){
  $cambio = $_GET["cambio"];
  }

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
			'cache' => '../cache',
			'debug' => 'true'));

	$template = $twig->loadTemplate('facturacion/modulo_mesas.twig.php');

	echo $template->render(array('tablas' => $tablas,'mesas' => $mesas,'user' => $user, 'msg' => $msg, 'caja' => $_SESSION["id"],'rol' => $_SESSION["rol"], 'cambio' => $cambio));

?>