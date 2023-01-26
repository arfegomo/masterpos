<?php

class detallestransacciones extends base{
//PROPIEDADES BASE DE DATOS
  private $idtemporal;
  private $idarticulo;
  private $cantidad;
  private $created_at;
  private $updated_at; 
  private $consecutivodian; 
  private $preciounitario;  
  private $impuestoiva;
  private $impuestoconsumo;
  private $baseunitario;
  private $idcaja;
  private $idsucursal;
  private $id;
  private $idconceptofacturacion;
  private $documentoreferencia;

//PROPIEDADES MODELO
  private $table;
  private $Rows;	

//PROPIEDADES DISEÑO
  private $num_error;
  private $evento;	
  private $msg; 

public function __construct(){
	$this->base();
	$this->temporal = 0;
	$this->idcaja = 0;
	$this->idsucursal = 0;	
	$this->idarticulo = 0;
	$this->id = 0;
	$this->idconceptofacturacion = 0;
	$this->descuento = 0;
	$this->cantidad = 0;
	$this->created_at = "";
	$this->updated_at = "";
	$this->consecutivodian = "";
	$this->preciounitario = 0;
	$this->impuestoiva = 0;
	$this->impuestoconsumo = 0;
	$this->baseunitario = 0;
	$this->documentoreferencia = "";
	$this->table = "detallestransacciones";
	$this->Rows = 0;
	$this->msg = "";

	date_default_timezone_set("America/Bogota");
	}

//SETTERS 
public function set_idtemporal($idtemporal){
	$this->idtemporal = $idtemporal;
	return true;
	}
public function set_id($id){
	$this->id = $id;
	return true;
	}
public function set_idcaja($idcaja){
	$this->idcaja = $idcaja;
	return true;
	}
public function set_idsucursal($idsucursal){
	$this->idsucursal = $idsucursal;
	return true;
	}
public function set_idarticulo($idarticulo){
	$this->idarticulo = $idarticulo;
	return true;
	}
public function set_idconceptofacturacion($idconceptofacturacion){
	$this->idconceptofacturacion = $idconceptofacturacion;
	return true;
	}	
public function set_descuento($descuento){
	$this->descuento = $descuento;
	return true;
	}	
public function set_cantidad($cantidad){
	$this->cantidad = $cantidad;
	return true;
	}	
public function set_created_at($created_at){
	$this->created_at = $created_at;
	return true;
	}	
public function set_updated_at($updated_at){
	$this->updated_at = $updated_at;
	return true;
	}
public function set_consecutivodian($consecutivodian){
	$this->consecutivodian = $consecutivodian;
	return true;
	}
public function set_preciounitario($preciounitario){
	$this->preciounitario = $preciounitario;
	return true;
	}
public function set_impuestoiva($impuestoiva){
	$this->impuestoiva = $impuestoiva;
	return true;
	}
public function set_impuestoconsumo($impuestoconsumo){
	$this->impuestoconsumo = $impuestoconsumo;
	return true;
	}
public function set_baseunitario($baseunitario){
	$this->baseunitario = $baseunitario;
	return true;
	}
public function set_documentoreferencia($documentoreferencia){
	$this->documentoreferencia = $documentoreferencia;
	return true;
	}
//FIN SETTERS 

//GETTERS
public function get_consecutivodian(){
	return $this->consecutivodian;
	}
public function get_id(){
	return $this->id;
	}
public function get_idcaja(){
	return $this->idcaja;
	}
public function get_idsucursal(){
	return $this->idsucursal;
	}
public function get_idarticulo(){
	return $this->idarticulo;
	}
public function get_idconceptofacturacion(){
	return $this->idconceptofacturacion;
	}  
public function get_descuento(){
	return $this->descuento;
	}	
public function get_cantidad(){
	return $this->cantidad;
	}
public function get_created_at(){
	return $this->created_at;
	}		
public function get_updated_at(){
	return $this->updated_at;
	}	
public function get_Rows(){
	return $this->Rows;
	}
public function get_msg(){
	return $this->msg;
	}
public function get_preciounitario(){
	return $this->preciounitario;
	}
public function get_impuestoiva(){
	return $this->impuestoiva;
	}
public function get_impuestoconsumo(){
	return $this->impuestoconsumo;
	}
public function get_baseunitario(){
	return $this->baseunitario;
	}	
public function get_documentoreferencia(){
	return $this->documentoreferencia;
	}
//FIN GETTERS	

public function listarArticulos(){

	$sql = "SELECT tem.cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario,tem.consecutivodian ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE consecutivodian = '{$this->consecutivodian}' ";
	$sql.="AND idconceptofacturacion = {$this->idconceptofacturacion} AND idsucursal = {$this->idsucursal}";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$descuento = $rs->fields["descuento"];
		$preciounitario = $rs->fields["preciounitario"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$baseunitario = $rs->fields["baseunitario"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario, 'consecutivodian' => $consecutivodian);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}		

public function listarArticulosFiscal($fecha,$horainicio,$horafin){

	$sql = "SELECT sum(tem.cantidad) AS cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN transacciones AS tra ON tem.idsucursal = tra.idsucursal AND tem.idconceptofacturacion = tra.idconceptofacturacion AND tem.consecutivodian = tra.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE tra.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafin} ";
	$sql.="AND tip.idtipotransaccion = 1 ";
	$sql.="GROUP BY art.idarticulo,tem.descuento";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$descuento = $rs->fields["descuento"];
		$preciounitario = $rs->fields["preciounitario"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$baseunitario = $rs->fields["baseunitario"];
		$arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}

public function listarArticulosFiscaldV($fecha,$horainicio,$horafin){

	$sql = "SELECT sum(tem.cantidad) AS cantidad,art.nombrearticulo,art.idarticulo,tem.descuento,tem.preciounitario,tem.impuestoiva,tem.impuestoconsumo,tem.baseunitario ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="INNER JOIN transacciones AS tra ON tem.idsucursal = tra.idsucursal AND tem.idconceptofacturacion = tra.idconceptofacturacion AND tem.consecutivodian = tra.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="INNER JOIN articulos AS art ON tem.idarticulo = art.idarticulo ";
	$sql.="WHERE tra.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafin} ";
	$sql.="AND tip.idtipotransaccion = 5 ";
	$sql.="GROUP BY art.idarticulo,tem.descuento";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$descuento = $rs->fields["descuento"];
		$preciounitario = $rs->fields["preciounitario"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$baseunitario = $rs->fields["baseunitario"];
		$arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}


public function Tickets($fecha,$horainicio,$horafin){

	$sql = "SELECT Min(consecutivodian) AS inicial, Max(consecutivodian) AS final, COUNT(consecutivodian) AS total ";
	$sql.="FROM transacciones AS tra ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN tipostransacciones AS tip ON con.idtipotransaccion = tip.idtipotransaccion ";
	$sql.="WHERE tra.idsucursal = {$this->idsucursal} AND tra.fechacreacion = '{$fecha}' ";
	$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafin} ";
	$sql.="AND (tip.idtipotransaccion = 1 OR tip.idtipotransaccion = 5)";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$inicial = $rs->fields["inicial"];
		$final = $rs->fields["final"];
		$total = $rs->fields["total"];
		$arreglo[] = array('inicial' => $inicial, 'final' => $final, 'total' => $total);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}		


public function pagarTransaccion(){

	$sql ="SELECT ROUND(SUM(((tem.baseunitario * tem.cantidad) - ((tem.cantidad * tem.baseunitario)*(tem.descuento/100))))) AS subtotal, ";
	$sql.="ROUND(SUM((((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoconsumo/100)) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoiva/100)))) AS impuestos, ";
	$sql.="ROUND(SUM(((tem.baseunitario * tem.cantidad) - ((tem.cantidad * tem.baseunitario)*(tem.descuento/100))) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoconsumo/100)) + (((tem.baseunitario * tem.cantidad)- ((tem.baseunitario * tem.cantidad)*(tem.descuento/100))) * (tem.impuestoiva/100)))) AS total ";
	$sql.="FROM {$this->table} AS tem ";
	$sql.="WHERE consecutivo = '{$this->consecutivo}' AND idconceptofacturacion = {$this->idconceptofacturacion} ";
	$sql.="AND idsucursal = {$this->idsucursal}";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();
	$subtotal = $rs->fields["subtotal"];
	$impuestos = $rs->fields["impuestos"];
	$total = $rs->fields["total"];

	$arreglo[] = array("subtotal" => $subtotal, "impuestos" => $impuestos, "total" => $total);

	return $arreglo;	
}

public function store(){
	
	$flag = false;
	$params = array();
	$id = 0;

	$params[] = $this->idarticulo;
	$params[] = $this->descuento;
	$params[] = $this->cantidad;
	$params[] = $this->consecutivo;
	$params[] = $this->preciounitario;
	$params[] = $this->impuestoiva;
	$params[] = $this->impuestoconsumo;
	$params[] = $this->baseunitario;
	$params[] = $this->idcaja;
	$params[] = $this->idsucursal;
	$params[] = $this->id;
	$params[] = $this->idconceptofacturacion;	

	

    $sql ="INSERT INTO {$this->table} (idarticulo,descuento, ";
    $sql.="cantidad,consecutivo,preciounitario,impuestoiva,impuestoconsumo,baseunitario,idcaja,idsucursal,id,idconceptofacturacion)";	
    $sql.="VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql,$params);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){
		
		return 1;
	}
	return 2;
}

//inicio
public function delete(){

	$flag = false;
	
	$sql ="DELETE FROM {$this->table} WHERE idtemporal = {$this->idtemporal}";
	$this->conexion->StartTrans();
	$this->conexion->execute($sql);
	$flag = $this->conexion->CompleteTrans();

	if ($flag){

		return 1;
	}
	return 2;
  }  	
 //fin

//inicio
 public function tiraFiscal($fecha,$horainicio,$horafin){

	$sql = "SELECT det.cantidad,art.nombrearticulo,art.idarticulo,det.descuento,det.preciounitario,det.impuestoiva,det.impuestoconsumo,det.baseunitario,det.consecutivodian ";
	$sql.="FROM transacciones AS tra ";
	$sql.="INNER JOIN {$this->table} AS det ON tra.idsucursal = det.idsucursal ";
	$sql.="AND tra.idconceptofacturacion = det.idconceptofacturacion AND tra.consecutivodian = det.consecutivodian ";
	$sql.="INNER JOIN conceptosfacturacion AS con ON tra.idsucursal = con.idsucursal AND con.idconceptofacturacion = tra.idconceptofacturacion ";
	$sql.="INNER JOIN articulos AS art ON det.idarticulo = art.idarticulo ";
	$sql.="WHERE con.idtipotransaccion = 1 AND tra.idsucursal = ".$_SESSION["idsucursal"]." ";
	$sql.="AND tra.fechacreacion = '$fecha' ";
	$sql.="AND tra.horacreacion BETWEEN {$horainicio} AND {$horafin}";
	$rs = $this->conexion->execute($sql);

	$arreglo = array();

	while(!$rs->EOF){
		$idarticulo = $rs->fields["idarticulo"];
		$cantidad = $rs->fields["cantidad"];
		$nombrearticulo = $rs->fields["nombrearticulo"];
		$descuento = $rs->fields["descuento"];
		$preciounitario = $rs->fields["preciounitario"];
		$impuestoiva = $rs->fields["impuestoiva"];
		$impuestoconsumo = $rs->fields["impuestoconsumo"];
		$baseunitario = $rs->fields["baseunitario"];
		$consecutivodian = $rs->fields["consecutivodian"];
		$arreglo[] = array('idarticulo' => $idarticulo, 'cantidad' => $cantidad, 'nombrearticulo' => $nombrearticulo, 'descuento' => $descuento, 'preciounitario' => $preciounitario, 'impuestoiva' => $impuestoiva, 'impuestoconsumo' => $impuestoconsumo, 'baseunitario' => $baseunitario, 'consecutivodian' => $consecutivodian);
		$rs->MoveNext();

		} 

	 return $arreglo;	
}
}//FIN CLASE

?>