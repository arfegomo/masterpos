<?php

include("../session.php");

require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/users.class.php");
include("../../../includes/conceptosfacturacion.class.php");
include("../../../includes/personas.class.php");
include("../../../includes/consecutivos.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/mesas.class.php");

$Tablas = new tablas();
$tablas = $Tablas->listado_tablas();

$Users = new users();
$Users->set_id($_SESSION["id"]);
$user = $Users->load();

$ConceptosFacturacion = new conceptosfacturacion();
$conceptosfacturacion = $ConceptosFacturacion->listado_conceptosfacturacion();

$msg = 0;
$cambio = 0;
$mesa = 0;

  if (isset($_GET["msg"])){
  $msg = $_GET["msg"];
  }

  if (isset($_GET["cambio"])){
  $cambio = $_GET["cambio"];
  }

 if (isset($_GET["idmesa"])){
  $mesa = $_GET["idmesa"];
  }

$Mesas = new mesas();
$estado = $Mesas->queryMesa($mesa);

Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('../templates');
    $twig = new Twig_Environment($loader, array(
      'cache' => '../cache',
      'debug' => 'true'));

if($estado[0] == 1){

  $Temporal = new temporal();
  $Temporal->set_idmesa($mesa);
  $articulos = $Temporal->listarArticulosMesa();

  $template = $twig->loadTemplate('facturacion/facturacion_mesa.twig.php');

    echo $template->render(array('tablas' => $tablas,'user' => $user,'conceptosfacturacion' => $conceptosfacturacion, 'msg' => $msg, 'caja' => $_SESSION["id"], 'mesa' => $mesa,'articulos' =>$articulos,'rol' => $_SESSION["rol"]));

}else{

  if($mesa != 0){
  $template = $twig->loadTemplate('facturacion/nombremesa.twig.php');  
}else{

  $template = $twig->loadTemplate('facturacion/facturacion.twig.php');
}
  
  

	echo $template->render(array('tablas' => $tablas,'user' => $user,'conceptosfacturacion' => $conceptosfacturacion, 'msg' => $msg, 'caja' => $_SESSION["id"], 'mesa' => $mesa,'rol' => $_SESSION["rol"],'cambio' => $cambio));
}

?>