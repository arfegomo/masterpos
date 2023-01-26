<?php
include("../session.php"); 
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/temporal.class.php");
include("../../../includes/transacciones.class.php");
include("../../../includes/detallestransacciones.class.php");
include("../../../includes/conceptosfacturacion.class.php");
//include("../../../includes/formasdepago.class.php");
include("../../../includes/users.class.php");
include("../../../includes/tablas.class.php");
include("../../../includes/detallepago.class.php");
include("../../../includes/mesas.class.php");

//Consulto los consecutivos actuales DIAN y TEMPORAL por Sucursal y Concepto de facturación
$ConceptosFacturacion = new conceptosfacturacion();
$ConceptosFacturacion->set_idconceptofacturacion($_POST["idCon"]);
$consecutivoDian = $ConceptosFacturacion->consecutivoDian();

//Grabación del encabezado de la factura

$Transacciones = new transacciones();
$Transacciones->set_idsucursal($_SESSION["idsucursal"]);
$Transacciones->set_idconceptofacturacion($_POST["idCon"]);
date_default_timezone_set("America/Bogota");
$Transacciones->set_fechacreacion(date("Y-m-d"));
$Transacciones->set_horacreacion(date("H"));
$Transacciones->set_minutocreacion(date("i"));
$Transacciones->set_segundocreacion(date("s"));
$Transacciones->set_horalargacreacion(date("Hi"));
$Transacciones->set_estado("N");
$Transacciones->set_consecutivodian($consecutivoDian);
$Transacciones->set_documento($_POST["idDoc"]);
$Transacciones->set_id($_SESSION["id"]);
$Transacciones->set_idcaja($_SESSION["idcaja"]);
$Transacciones->set_observacion($_POST["observacion"]);
//$Transacciones->set_documentoreferencia($_POST["docRef"]);
$storeTransaccion = $Transacciones->store();
//fin

//si el encabezado se grabo
if($storeTransaccion == true){
//Consulto la tabla temporal por el id interno e inserto en detalles transacciones
$Temporal = new temporal();		
$Temporal->set_consecutivo($_POST["idCons"]);
$Temporal->set_idconceptofacturacion($_POST["idCon"]);

$storeDetalle = $Temporal->buscarDetalle($consecutivoDian);

}

//exit();
if($storeDetalle == false)
//5
{
$Transacciones = new transacciones();
$Transacciones->set_idsucursal($_SESSION["idsucursal"]);
$Transacciones->set_idconceptofacturacion($_POST["idCon"]);
$Transacciones->set_consecutivodian($consecutivoDian);
$Transacciones->delete();
header("Location: index.php?idmesa=0&msg=5&cambio=".$_POST["cambiohidden"]."");
}
//5
else
//1
{
//Grabe la forma de pago
$Detallepago = new detallepago();		
$Detallepago->set_idsucursal($_SESSION["idsucursal"]);
$Detallepago->set_consecutivodian($consecutivoDian);
$Detallepago->set_idconceptofacturacion($_POST["idCon"]);

if($_POST["options"] == 5)

//2
{
$multiples_pagos = $_POST["pago"];
foreach ($multiples_pagos as $key => $value) 
//3
{
	$Detallepago->set_iddetallepago($value);
	$Detallepago->set_valor($_POST["valor".$value]);
	$storeDetallepago = $Detallepago->store();
}
//3

}
//2

else
//4
{
$Detallepago->set_iddetallepago($_POST["options"]);
$Detallepago->set_valor($_POST["total"]);
$storeDetallepago = $Detallepago->store();
}
//4

//elimino de la tabla temporal el detalle	
$Temporal = new temporal()	;
$Temporal->set_idsucursal($_SESSION["idsucursal"]);
$Temporal->set_idconceptofacturacion($_POST["idCon"]);
$Temporal->set_idcaja($_SESSION["idcaja"]);
$Temporal->set_id($_SESSION["id"]);
$Temporal->set_consecutivo($_POST["idCons"]);
$Temporal->deleteTemporal();

//1
}



if(($storeTransaccion == 1)&&($storeDetalle == true)&&($storeDetalle == 1)){
//Actualiza los consecutivos DIAN y TEMPORAL por sucursal y concepto de facturación
$consecutivoDianUpdate = $consecutivoDian + 1;
$ConceptosFacturacion->set_idsucursal($_SESSION["idsucursal"]);
$ConceptosFacturacion->set_idconceptofacturacion($_POST["idCon"]);
$update = $ConceptosFacturacion->actualizaConsecutivoDian($consecutivoDianUpdate);
	
	$Mesas = new mesas();
	$Mesas->set_idmesa($_POST["mesa"]);
	$Mesas->set_estado(0);
	$Mesas->estadoAbierta();
	$Mesas->set_persona("");
	$Mesas->limpiarmesa();

//Genero archivo de impresion
//llamo encabezado
$Transacciones->set_idsucursal($_SESSION["idsucursal"]);
$Transacciones->set_idconceptofacturacion($_POST["idCon"]);
$Transacciones->set_consecutivodian($consecutivoDian);
$encabezados = $Transacciones->loadTransaccion();
//llamo el detalle de la transacción
$Detallestransacciones = new detallestransacciones();
$Detallestransacciones->set_consecutivodian($consecutivoDian);
$Detallestransacciones->set_idconceptofacturacion($_POST["idCon"]);
$Detallestransacciones->set_idsucursal($_SESSION["idsucursal"]);
$detallesFactura = $Detallestransacciones->listarArticulos();

//
$host = '\\\\192.168.1.90\\';
$print = 'POS-80';
$arch=fopen('impresion.prnt',"w");//se usa w para lectura y escritura y a para solo lectura
fputs($arch,str_pad("Regimen Común",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Grupo Avance Empresarial SAS",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Nit. 900989784-5",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("El Desvare de Medellin",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Cra. 68A # 42A - 45",40," ",STR_PAD_BOTH)."\n");
//fputs($arch,str_pad("Tel. 3156497175",40," ",STR_PAD_BOTH)."\n");

foreach ($encabezados as $encabezado) {
	# code...
fputs($arch,str_pad($encabezado["nombreconceptofacturacion"]." # ".$encabezado["consecutivodian"],40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Fecha:" .$encabezado["fecha"],40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Sucursal: ".$encabezado["sucursal"],40," ",STR_PAD_BOTH)."\n");
//fputs($arch,str_pad("Caja #: ".$encabezado["caja"],40," ",STR_PAD_BOTH)."\n");
}

fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,"|".str_pad("Articulo",16," ",STR_PAD_BOTH)."|".str_pad("Medida",10," ",STR_PAD_BOTH)."|".str_pad("Total",10," ",STR_PAD_BOTH)."|\n"); 
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");


//detalle transacción
$subtotal = 0;
$impoconsumo = 0;
$descuentos = 0;
$total = 0;
foreach ($detallesFactura as $detalleFactura) {
	# code...
$linea=str_pad(strtoupper(substr($detalleFactura["nombrearticulo"],0,20)),20," ",STR_PAD_RIGHT).str_pad("",10," ",STR_PAD_BOTH).str_pad(number_format(($detalleFactura["preciounitario"]*$detalleFactura["cantidad"])-(($detalleFactura["preciounitario"]*$detalleFactura["cantidad"])*($detalleFactura["descuento"]/100))),10," ",STR_PAD_LEFT);
$linea1=str_pad("",10," ",STR_PAD_RIGHT).str_pad("Cant. -> [".number_format($detalleFactura["cantidad"])."*".number_format($detalleFactura["preciounitario"])."]",20," ",STR_PAD_BOTH).str_pad("",10," ",STR_PAD_LEFT);
$subtotal = round($subtotal + ($detalleFactura["baseunitario"]*$detalleFactura["cantidad"]));
$impoconsumo = round($impoconsumo + ((($detalleFactura["baseunitario"]*$detalleFactura["cantidad"])-(($detalleFactura["baseunitario"]*$detalleFactura["cantidad"])*($detalleFactura["descuento"]/100)))*($detalleFactura["impuestoconsumo"]/100)));
$descuentos = round($descuentos + (($detalleFactura["baseunitario"]*$detalleFactura["cantidad"])*($detalleFactura["descuento"]/100)));
fputs($arch,$linea."\n".$linea1."\n");

}
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("SubTotal",20," ",STR_PAD_RIGHT).str_pad((number_format($subtotal)),20," ",STR_PAD_LEFT)."\n");
if($descuentos > 0){
fputs($arch,str_pad("- Descuentos",20," ",STR_PAD_RIGHT).str_pad(number_format($descuentos),20," ",STR_PAD_LEFT)."\n");
}
if($impoconsumo > 0){
fputs($arch,str_pad("+ Imp. Consumo(8%)",20," ",STR_PAD_RIGHT).str_pad(number_format($impoconsumo),20," ",STR_PAD_LEFT)."\n");
}
//impresion de ivas
$impuestoiva_5 = 0;
$impuestoiva_10 = 0;
$impuestoiva_19 = 0;
foreach ($detallesFactura as $detalleFacturaivas) {
switch($detalleFacturaivas["impuestoiva"]){
		case 5:
		$impuestoiva_5 = round($impuestoiva_5 + ((($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])-(($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])*($detalleFacturaivas["descuento"]/100)))*($detalleFacturaivas["impuestoiva"]/100)));
        break;
        case 10:
		$impuestoiva_10 = round($impuestoiva_10 + ((($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])-(($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])*($detalleFacturaivas["descuento"]/100)))*($detalleFacturaivas["impuestoiva"]/100)));
        break;
        case 19:
		$impuestoiva_19 = round($impuestoiva_19 + ((($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])-(($detalleFacturaivas["baseunitario"]*$detalleFacturaivas["cantidad"])*($detalleFacturaivas["descuento"]/100)))*($detalleFacturaivas["impuestoiva"]/100)));
        break;
}
}
if($impuestoiva_5 > 0){
fputs($arch,str_pad("+ IVA(5%)",20," ",STR_PAD_RIGHT).str_pad(number_format($impuestoiva_5),20," ",STR_PAD_LEFT)."\n");
}
if($impuestoiva_10 > 0){
fputs($arch,str_pad("+ IVA(10%)",20," ",STR_PAD_RIGHT).str_pad(number_format($impuestoiva_10),20," ",STR_PAD_LEFT)."\n");
}
if($impuestoiva_19 > 0){
fputs($arch,str_pad("+ IVA(19%)",20," ",STR_PAD_RIGHT).str_pad(number_format($impuestoiva_19),20," ",STR_PAD_LEFT)."\n");
}
//
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
$total = round(($subtotal-$descuentos)+($impoconsumo+$impuestoiva_5+$impuestoiva_10+$impuestoiva_19));
fputs($arch,str_pad("Total a pagar",20," ",STR_PAD_RIGHT).str_pad(number_format($total),20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("Forma de Pago",40," ",STR_PAD_BOTH)."\n"); 
$Detallepago = new detallepago();
$Detallepago->set_idsucursal($_SESSION["idsucursal"]);
$Detallepago->set_consecutivodian($consecutivoDian);
$Detallepago->set_idconceptofacturacion($_POST["idCon"]);
$detallepagos = $Detallepago->detallePago();
foreach ($detallepagos as $detallepago) {
	fputs($arch,str_pad($detallepago["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($detallepago["valor"])),20," ",STR_PAD_LEFT)."\n");
}
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("AG System",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Cel./Whatsapp 3175050200",40," ",STR_PAD_BOTH)."\n\n\n\n\n\n\n");
fclose($arch);
$archivo = 'impresion.prnt';

if($_POST["optionsIm"] == 1){
shell_exec("print /D:$host$print $archivo");
}
//
header("Location: modulo_mesas.php?msg=1&cambio=".$_POST["cambiohidden"]."");
//header("Location: index.php?idmesa=0&msg=1&cambio=".$_POST["cambiohidden"]."");
}



?>
