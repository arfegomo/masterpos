<?php
include("../session.php");
require_once '../Twig/Autoloader.php';
include("../../../includes/config.php");
include("../../../includes/base.class.php");
include("../../../includes/transacciones.class.php");
include("../../../includes/detallestransacciones.class.php");
include("../../../includes/detallepago.class.php");

$Detallestransacciones = new detallestransacciones();
$Detallestransacciones->set_idsucursal($_SESSION["idsucursal"]);
$detallesFactura = $Detallestransacciones->listarArticulosFiscal($_POST["fecha"],$_POST["horainicio"],$_POST["horafin"]);
$detallesFacturadV = $Detallestransacciones->listarArticulosFiscaldV($_POST["fecha"],$_POST["horainicio"],$_POST["horafin"]);
$tickets = $Detallestransacciones->Tickets($_POST["fecha"],$_POST["horainicio"],$_POST["horafin"]);

$host = '\\\\192.168.1.90\\';
$print = 'POS-80';
$arch=fopen('impresion.prnt',"w");//se usa w para lectura y escritura y a para solo lectura
fputs($arch,str_pad("Regimen Común",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Grupo Avance Empresarial SAS",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Nit. 900989784-5",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("El Desvare de Medellin",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Cra. 68A # 42A - 45",40," ",STR_PAD_BOTH)."\n");

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
fputs($arch,str_pad("Total a recaudar",20," ",STR_PAD_RIGHT).str_pad(number_format($total),20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("Forma de Pago",40," ",STR_PAD_BOTH)."\n"); 
$Detallepago = new detallepago();
$Detallepago->set_idsucursal($_SESSION["idsucursal"]);
$detallepagos = $Detallepago->detallePagoFiscal($_POST["fecha"]);
$efectivoV = 0;
$tarjetaDebitoV = 0;
$tarjetaCreditoV = 0;
$bonosV = 0;
$creditoV = 0;
foreach ($detallepagos as $detallepago) {
	switch ($detallepago["iddetallepago"]) {
		case 1:
			$efectivoV = $efectivoV + $detallepago["valor"];
			break;
		case 2:
			$tarjetaDebitoV = $tarjetaDebitoV + $detallepago["valor"];
			break;
		case 3:
			$tarjetaCreditoV = $tarjetaCreditoV + $detallepago["valor"];
			break;
		case 4:
			$bonosV = $bonosV + $detallepago["valor"];
			break;
		case 6:
			$creditoV = $creditoV + $detallepago["valor"];
			break;

		default:
			# code...
			break;
	}
	fputs($arch,str_pad($detallepago["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($detallepago["valor"])),20," ",STR_PAD_LEFT)."\n");
}
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");

fputs($arch,str_pad("EGRESOS POR DEVOLUCIONES",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,"|".str_pad("Articulo",16," ",STR_PAD_BOTH)."|".str_pad("Medida",10," ",STR_PAD_BOTH)."|".str_pad("Total",10," ",STR_PAD_BOTH)."|\n"); 
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
//detalle transacción
$subtotaldV = 0;
$impoconsumodV = 0;
$descuentosdV = 0;
$totaldV = 0;
foreach ($detallesFacturadV as $detalleFacturadV) {
	# code...
$linea=str_pad(strtoupper(substr($detalleFacturadV["nombrearticulo"],0,20)),20," ",STR_PAD_RIGHT).str_pad("",10," ",STR_PAD_BOTH).str_pad(number_format(($detalleFacturadV["preciounitario"]*$detalleFacturadV["cantidad"])-(($detalleFacturadV["preciounitario"]*$detalleFacturadV["cantidad"])*($detalleFacturadV["descuento"]/100))),10," ",STR_PAD_LEFT);
$linea1=str_pad("",10," ",STR_PAD_RIGHT).str_pad("Cant. -> [".number_format($detalleFacturadV["cantidad"])."*".number_format($detalleFacturadV["preciounitario"])."]",20," ",STR_PAD_BOTH).str_pad("",10," ",STR_PAD_LEFT);
$subtotaldV = round($subtotaldV + ($detalleFacturadV["baseunitario"]*$detalleFacturadV["cantidad"]));
$impoconsumodV = round($impoconsumodV + ((($detalleFacturadV["baseunitario"]*$detalleFacturadV["cantidad"])-(($detalleFacturadV["baseunitario"]*$detalleFacturadV["cantidad"])*($detalleFacturadV["descuento"]/100)))*($detalleFactura["impuestoconsumo"]/100)));
$descuentosdV = round($descuentodVs + (($detalleFacturadV["baseunitario"]*$detalleFacturadV["cantidad"])*($detalleFacturadV["descuento"]/100)));
fputs($arch,$linea."\n".$linea1."\n");

}
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("SubTotal",20," ",STR_PAD_RIGHT).str_pad((number_format($subtotaldV)),20," ",STR_PAD_LEFT)."\n");
if($descuentosdV > 0){
fputs($arch,str_pad("- Descuentos",20," ",STR_PAD_RIGHT).str_pad(number_format($descuentosdV),20," ",STR_PAD_LEFT)."\n");
}
if($impoconsumodV > 0){
fputs($arch,str_pad("+ Imp. Consumo(8%)",20," ",STR_PAD_RIGHT).str_pad(number_format($impoconsumodV),20," ",STR_PAD_LEFT)."\n");
}
//impresion de ivas
$impuestoiva_5 = 0;
$impuestoiva_10 = 0;
$impuestoiva_19 = 0;
foreach ($detallesFacturadV as $detalleFacturaivasdV) {
switch($detalleFacturaivasdV["impuestoiva"]){
		case 5:
		$impuestoiva_5 = round($impuestoiva_5 + ((($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])-(($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])*($detalleFacturaivasdV["descuento"]/100)))*($detalleFacturaivasdV["impuestoiva"]/100)));
        break;
        case 10:
		$impuestoiva_10 = round($impuestoiva_10 + ((($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])-(($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])*($detalleFacturaivasdV["descuento"]/100)))*($detalleFacturaivasdV["impuestoiva"]/100)));
        break;
        case 19:
		$impuestoiva_19 = round($impuestoiva_19 + ((($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])-(($detalleFacturaivasdV["baseunitario"]*$detalleFacturaivasdV["cantidad"])*($detalleFacturaivasdV["descuento"]/100)))*($detalleFacturaivasdV["impuestoiva"]/100)));
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
$totaldV = round(($subtotaldV-$descuentosdV)+($impoconsumdV+$impuestoiva_5+$impuestoiva_10+$impuestoiva_19));
fputs($arch,str_pad("Total devoluciones",20," ",STR_PAD_RIGHT).str_pad(number_format($totaldV),20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");

fputs($arch,str_pad("Forma de Pago",40," ",STR_PAD_BOTH)."\n"); 
//$Detallepago = new detallepago();
$Detallepago->set_idsucursal($_SESSION["idsucursal"]);
$detallepagosdV = $Detallepago->detallePagoFiscaldV($_POST["fecha"]);
$efectivodV = 0;
$tarjetaDebitodV = 0;
$tarjetaCreditodV = 0;
$bonosdV = 0;
$creditodV = 0;
foreach ($detallepagosdV as $detallepagodV) {
	switch ($detallepagodV["iddetallepago"]) {
		case 1:
			$efectivodV = $efectivodV + $detallepagodV["valor"];
			break;
		case 2:
			$tarjetaDebitodV = $tarjetaDebitodV + $detallepagodV["valor"];
			break;
		case 3:
			$tarjetaCreditodV = $tarjetaCreditodV + $detallepagodV["valor"];
			break;
		case 4:
			$bonosdV = $bonosdV + $detallepagodV["valor"];
			break;
		case 6:
			$creditodV = $creditodV + $detallepagodV["valor"];
			break;

		default:
			# code...
			break;
	}
	fputs($arch,str_pad($detallepagodV["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($detallepagodV["valor"])),20," ",STR_PAD_LEFT)."\n");
}

fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");

fputs($arch,str_pad("VENTAS - DEVOLUCIONES",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Total:",20," ",STR_PAD_RIGHT).str_pad((number_format($total-$totaldV)),20," ",STR_PAD_LEFT)."\n");


fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("RESUMEN EN CAJA",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
$detallepagosR = $Detallepago->detallePagoFiscalResumen($_POST["fecha"]);
$efectivo = 0;
$tarjetaDebito = 0;
$tarjetaCredito = 0;
$bonos = 0;
$credito = 0;
foreach ($detallepagosR as $detallepagoR) {
	

		switch ($detallepagoR["iddetallepago"]) {
		case 1:
			$efectivo = $efectivoV - $efectivodV;
			fputs($arch,str_pad($detallepagoR["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($efectivo)),20," ",STR_PAD_LEFT)."\n");
			break;
		case 2:
			$tarjetaDebito = $tarjetaDebitoV - $tarjetaDebitodV;
			fputs($arch,str_pad($detallepagoR["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($tarjetaDebito)),20," ",STR_PAD_LEFT)."\n");
			break;
		case 3:
			$tarjetaCredito = $tarjetaCreditoV - $tarjetaCreditodV;
			fputs($arch,str_pad($detallepagoR["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($tarjetaCredito)),20," ",STR_PAD_LEFT)."\n");
			break;
		case 4:
			$bonos = $bonosV - $bonosdV;
			fputs($arch,str_pad($detallepagoR["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($bonos)),20," ",STR_PAD_LEFT)."\n");
			break;
		case 6:
			$credito = $creditoV - $creditodV;
			fputs($arch,str_pad($detallepagoR["formapago"],20," ",STR_PAD_RIGHT).str_pad((number_format($credito)),20," ",STR_PAD_LEFT)."\n");
			break;
		default:
			# code...
			break;
	}
	
	}

fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("Fecha: ",20," ",STR_PAD_RIGHT).str_pad($_POST["fecha"],20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("Hora Inicio: ",20," ",STR_PAD_RIGHT).str_pad($_POST["horainicio"].":00",20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("Hora Final: ",20," ",STR_PAD_RIGHT).str_pad($_POST["horafin"].":00",20," ",STR_PAD_LEFT)."\n");
fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");

foreach ($tickets as $ticket) {
	//fputs($arch,str_pad("Ticket Inicial: ",20," ",STR_PAD_RIGHT).str_pad($ticket["inicial"],20," ",STR_PAD_LEFT)."\n");
	//fputs($arch,str_pad("Ticket Final: ",20," ",STR_PAD_RIGHT).str_pad($ticket["final"],20," ",STR_PAD_LEFT)."\n");
	fputs($arch,str_pad("Total Tickets: ",20," ",STR_PAD_RIGHT).str_pad($ticket["total"],20," ",STR_PAD_LEFT)."\n");
}

fputs($arch,str_pad("-",40,"-",STR_PAD_RIGHT)."\n");
fputs($arch,str_pad("AG System",40," ",STR_PAD_BOTH)."\n");
fputs($arch,str_pad("Cel./Whatsapp 3175050200",40," ",STR_PAD_BOTH)."\n\n\n\n\n\n\n");
fclose($arch);
$archivo = 'impresion.prnt';
shell_exec("print /D:$host$print $archivo");

//


?>
